<?php 
session_start();
class video_climb extends CI_Controller  {

        /**
        * Index Page for this controller.
        *
        * Maps to the following URL
        * 		http://example.com/index.php/welcome
        *	- or -  
        * 		http://example.com/index.php/welcome/index
        *	- or -
        * Since this controller is set as the default controller in 
        * config/routes.php, it's displayed at http://example.com/
        *
        * So any other public methods not prefixed with an underscore will
        * map to /index.php/welcome/<method_name>
        * @see http://codeigniter.com/user_guide/general/urls.html
        */
       private $_configs = null;
       function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('javascript');
            $this->load->library('session');
            $this->load->library('smarty3','','smarty');
            $this->load->model('admin-planners/video_model','video_model');
            $this->load->model('admin-planners/log_model','log_model');
            $this->load->model('admin-planners/youtube','youtube');
            if(!isset($_SESSION["JQX-DEL-VIDEO"]))$_SESSION["JQX-DEL-VIDEO"]=0;
            $this->load->model('admin-planners/setting_model','setting_model');
            include APPPATH . 'libraries/defu.php';
            $this->InitSetting();
        }
        function InitSetting(){
            $colModel=array(
                array(  "display"       =>"Video Key"           ,"name"=>"VideoKey"         ,"width"=> 80        ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Title"               ,"name"=>"Title"            ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Alias"               ,"name"=>"Alias"            ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Source"              ,"name"=>"Source"           ,"width"=>120       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Thumbs"              ,"name"=>"Thumbs"           ,"width"=>120       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Status"              ,"name"=>"Status"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Insert"              ,"name"=>"Insert"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Update"              ,"name"=>"Update"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false),
                array(  "display"       =>"Delete"              ,"name"=>"Delete"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false)
            );
            if(isset($_SESSION["ADP-USER"])){
                if(!isset($_SESSION["admin-video-setting"])){
                    $data=$this->setting_model->getByKey("admin-video-settings");
                    if(isset($data[0])){
                        $_SESSION["admin-video-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }
                }
                $setting= $_SESSION["admin-video-setting"]["colModel"];
                for($i=0;$i<count($colModel);$i++){
                    if(isset($setting[$colModel[$i]["name"]])){
                        $colModel[$i]["hide"]=(bool)$setting[$colModel[$i]["name"]];
                    }
                }
                
            }
            $this->_configs["colModel"]=$colModel;
        }
        public function index(){
            $Data["tab_config"]["tabs"]=array(
                "video"   =>array(
                    "display"=>"Video"
                    ,"link"=>  base_url("admin-planners/video")
                    ),
                "edit"   =>array(
                    "display"=>"Edit"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="video";
            $Data["flexigrid_settings"]["colModel"]=$this->_configs["colModel"];
            foreach ($Data["flexigrid_settings"]["colModel"] as $col){
                $Data["admin-video-settings"]["colModel"][$col["name"]]=$col["hide"];
            }
            $Data["admin-video-settings"]["display"]=1;
            $Params=array(
                "Key"=>"admin-video-settings",
                "Name"=>"admin-video-settings",
                "Type"=>"settings",
                "Value"=>json_encode($Data["admin-video-settings"])
            );
            $this->setting_model->insert_onduplicate_update("admin-video-settings",$Params);
            $Data["flexigrid_settings"]["filterModel"]=filterModel($Data["flexigrid_settings"]["colModel"]);
            
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty->view('admin-planners/video/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
	}
        public function checkVideoExist($ID){
            
        }
        public function YoutubeInfo(){
            $url=$_POST["url"];
            $key=$_POST["key"];
            $video=null;
            if($key!=""){
                $video=$this->youtube->getVideo($key);
            }
            if($video==null){
                $key=$this->youtube->getVideoKey($url);
                if($key!=""){
                    $video=$this->youtube->getVideo($key);
                }
            }
            if($video!=null){
                $video->alias=converturl($video->title);
            }
            echo json_encode($video);
        }
        public function YoutubeVideoInfo(){
            //$url=$_POST["url"];
            $url="http://www.youtube.com/watch?v=NbncKVDgfio&feature=g-all-shu";
            $video=$this->youtube->getVideoInfo($url);
            if($video!=null){
                print_r($video);
                $video->alias=converturl($video->title);
            }
            //echo json_encode($video);
        }
        function tokenProduct(){
            $q=isset($_POST["q"])?$_POST["q"]:"";
            
            $arr= ($this->video_model->getToken($q));
            $json_response = json_encode($arr);
            if(isset($_GET["callback"])) {
                $json_response = $_GET["callback"] . "(" . $json_response . ")";
            }
            echo $json_response;
        }
        public function Edit(){
            $Data["categorys"]=array(
                "Music"=>"Music",
                "Comedy"=>"Comedy",
                "FilmEntertainment"=>"Film & Entertainment",
                "Gamming"=>"Gamming",
                "BeautyFashion"=>"Beauty & Fashion",
                "FromTV"=>"FromTV",
                "Automotive"=>"Automotive",
                "Animation"=>"Animation",
                "Sports"=>"Sports",
                "Blogs"=>"Blogs",
                "CookingHealth"=>"Cooking & Health",
                "Science"=>"Science",
                "News"=>"News",
                "Lifestyle"=>"Lifestyle"
                
                
            );
            if(isset($_POST["ID"])){
                $video=$this->video_model->getVideo($_POST["ID"]);
                if(count($video)>0){
                    $Data["video"]=  objectToArray($video[0]);
                    $this->smarty->assign('Data', $Data);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/video/02_edit_climb');
        }      
        public function Save(){
            $vlows=array("\\\"","\\'");
            $vals=array("\"","'");
            $Params=$_POST["Params"];
            $msgs=array();
            
            if( (!isset($Params["Source"])) || $Params["Source"]==""){
                $msgs[]="Link does not empty.";
            }
            if( (!isset($Params["VideoKey"])) || $Params["VideoKey"]==""){
                $msgs[]="Key does not empty.";
            }
            if( (!isset($Params["Title"])) || $Params["Title"]==""){
                $msgs[]="Title does not empty.";
            }
            if( (!isset($Params["Thumbs"])) || $Params["Thumbs"]==""){
                $msgs[]="Thumbs does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $VideoParams=array(
                    "VideoKey"=>$Params["VideoKey"],
                    "Alias"=>  converturl($Params["Title"]),
                    "Title"=>$Params["Title"],
                    "Thumbs"=>$Params["Thumbs"],
                    "Description"=>$Params["Description"],
                    "Source"=>$Params["Source"],
                    "Tag"=>$Params["Tag"]
                    
                );
                //$VideoParams["Embel"]=  str_replace($vlows, $vals,$_REQUEST["Params"]["Embel"]);
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
                if(isset($Params["VideoID"]) && $Params["VideoID"]!=""){
                    $ip = getIP();
                    $VideoParams["Log"] = "    IP : $ip \n    Action : Update \n    RowID : " . $Params["VideoID"] . "\n    VideoKey : " . $Params["VideoKey"];
                    if($this->video_model->updateVideo($Params["VideoID"],$VideoParams)){
                        //$this->log_model->insert(array("Table" => "Video","RowID"=>$Params["VideoID"], "Action" => "Update", "Log" => $VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Video have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update video information.";
                    }
                }else{
                    $ip=  getIP();
                    $VideoParams["Log"]="    IP : $ip \n    Action : Insert \n    VideoKey : ".$Params["VideoKey"];
                    if($this->video_model->insertVideo($VideoParams)){
                        //$this->log_model->insert(array("Table"=>"Video","Action"=>"Insert","Log"=>$VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Video have been added to database.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant insert video to database.";
                    }
                }
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeStatus(){
            
            if(isset($_POST["Status"]) && isset($_POST["ID"])){
                $ID=$_POST["ID"];
                $Status=$_POST["Status"];
                $Params=array(
                    "Status"=>$Status
                );
                $ip=  getIP();
                $Params["Log"]="    IP : $ip \n    Action : Change Status \n    RowID : $ID\n    New Status : $Status";
                if($this->video_model->update($ID,$Params)){
                    //$this->log_model->insert(array("Table"=>"Video","RowID"=>$ID,"Action"=>"Change Status","Log"=>$Params["Log"]));
                    $code=1;
                    $msg="Status' video have been changed.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant change status of this video";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeColumnDisplay(){
            
            $_SESSION["admin-video-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-video-settings",
                "Name"=>"admin-video-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-video-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-video-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeDeleteDisplay(){
            ChangeDisplay("JQX-DEL-VIDEO", $_POST["showDelete"]);
            $_SESSION["admin-video-setting"]["display"]=$_POST["showDelete"];
            $Params=array(
                "Key"=>"admin-video-settings",
                "Name"=>"admin-video-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-video-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-video-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Delete(){
            
            if(isset($_POST["ID"])){
                $ID=$_POST["ID"];
                $ip=  getIP();
                $Params["Log"]="    IP : $ip \n    Action : Delete \n    RowID : $ID";
                
                if($this->video_model->delete($ID)){
                    //$this->log_model->insert(array("Table"=>"Video","RowID"=>$ID,"Action"=>"Delete","Log"=>$Params["Log"]));
                    $code=1;
                    $msg="Video have been deleted.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant delete this video";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Restore(){
            
            if(isset($_POST["ID"])){
                $ID=$_POST["ID"];
                $ip=  getIP();
                $Params["Log"]="    IP : $ip \n    Action : Restore \n    RowID : $ID";
                if($this->video_model->retore($ID)){
                    //$this->log_model->insert(array("Table"=>"Video","Action"=>"Restore","RowID"=>$ID,"Log"=>$Params["Log"]));
                    $code=1;
                    $msg="Video have been retored.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant retore this video";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function FlexiGridData(){
            
            $data=$this->video_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->VideoID,
                            'cell'=>array(
                                'VideoKey'      => $row->VideoKey,
                                'Title'         => $row->Title,
                                'Alias'         => $row->Alias,
                                'Source'        => $row->Source,
                                'Tag'           => $row->Tag,
                                'Thumbs'        => $row->Thumbs,
                                'Author'        => $row->Author,
                                'Length'        => $row->Length,
                                'Status'            =>$row->Status,
                                'Insert'            =>$row->Insert,
                                'Update'            =>$row->Update,
                                'Delete'            =>$row->Delete
                            ),
                    );
                    $jsonData['rows'][] = $entry;
            }
            echo json_encode($jsonData);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */