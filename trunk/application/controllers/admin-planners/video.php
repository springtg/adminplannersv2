<?php 
session_start();
class video extends CI_Controller  {

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
            if(!isset($_SESSION["JQX-DEL-VIDEO"]))$_SESSION["JQX-DEL-VIDEO"]=1;
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array(
                    "display"=>"Content"
                    ,"value"=>"content"   
                    ,"link"=>  base_url("admin-planners/content")
                    ),
                "video"     =>array(
                    "display"=>"Video"        
                    ,"value"=>"video"     
                    ,"link"=>base_url("admin-planners/video")),
                "slider"    =>array(
                    "display"=>"Slider in Home Page" 
                    ,"value"=>"slider"     
                    ,"link"=>base_url("admin-planners/slider")),
                "contact"   =>array(
                    "display"=>"Contact"      
                    ,"value"=>"contact"       
                    ,"link"=>base_url("admin-planners/contact")),
                "request"   =>array(
                    "display"=>"Request"      
                    ,"value"=>"request"       
                    ,"link"=>base_url("admin-planners/request"))
            );
            $Data["tab_config"]["tabindex"]="video";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/video/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
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
        public function EditVideo(){
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
            if(isset($_POST["VideoID"])){
                $video=$this->video_model->getVideo($_POST["VideoID"]);
                if(count($video)>0){
                    $Data["video"]=  objectToArray($video[0]);
                    $this->smarty->assign('Data', $Data);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/video/02_edit');
        }
        
        public function savevideo(){
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
            if( (!isset($Params["Length"])) || $Params["Length"]=="" || !is_numeric($Params["Length"])){
                $msgs[]="Length does not empty and Length must be numeric.";
            }
            if( (!isset($Params["Author"])) || $Params["Author"]==""){
                $msgs[]="Author does not empty.";
            }
            if( (!isset($Params["Title"])) || $Params["Title"]==""){
                $msgs[]="Title does not empty.";
            }
//            if( (!isset($Params["Categorys"])) || $Params["Categorys"]==""){
//                $msgs[]="Please, choose the Categorys.";
//            }
            if( (!isset($Params["Thumbs"])) || $Params["Thumbs"]==""){
                $msgs[]="Thumbs does not empty.";
            }
//            if( (!isset($Params["Description"])) || $Params["Description"]==""){
//                $msgs[]="Description does not empty.";
//            }
//            if( (!isset($Params["Tag"])) || $Params["Tag"]==""){
//                $msgs[]="Tag does not empty.";
//            }
            if( (!isset($Params["Embel"])) || $Params["Embel"]==""){
                $msgs[]="Embel does not empty.";
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
                    "Author"=>$Params["Author"],
                    "Alias"=>  converturl($Params["Title"]),
                    "Title"=>$Params["Title"],
                    "Category"=>$Params["Categorys"],
                    "Thumbs"=>$Params["Thumbs"],
                    "Description"=>$Params["Description"],
                    "Source"=>$Params["Source"],
                    "Tag"=>$Params["Tag"],
                    "Embel"=>$Params["Embel"],
                    "Length"=>$Params["Length"]
                );
                //$VideoParams["Embel"]=  str_replace($vlows, $vals,$_REQUEST["Params"]["Embel"]);
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
                if(isset($Params["VideoID"]) && $Params["VideoID"]!=""){
                    $ip = getIP();
                    $VideoParams["Log"] = "    IP : $ip \n    Action : Update \n    RowID : " . $Params["VideoID"] . "\n    VideoKey : " . $Params["VideoKey"];
                    if($this->video_model->updateVideo($Params["VideoID"],$VideoParams)){
                        $this->log_model->insert(array("Table" => "Video","RowID"=>$Params["VideoID"], "Action" => "Update", "Log" => $VideoParams["Log"]));
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
                        $this->log_model->insert(array("Table"=>"Video","Action"=>"Insert","Log"=>$VideoParams["Log"]));
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
            
            if(isset($_POST["Status"]) && isset($_POST["VideoID"])){
                $VideoParams=array(
                    "Status"=>$_POST["Status"]
                );
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Change Status \n    RowID : ".$_POST["VideoID"]."\n    New Status : ".$_POST["Status"];
                if($this->video_model->updateVideo($_POST["VideoID"],$VideoParams)){
                    $this->log_model->insert(array("Table"=>"Video","RowID"=>$_POST["VideoID"],"Action"=>"Change Status","Log"=>$VideoParams["Log"]));
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
        public function ChangeDeleteDisplay(){
            
            if(isset($_POST["showDelete"]) && $_POST["showDelete"]==0){
                $_SESSION["JQX-DEL-VIDEO"]=0;
                $code=1;
                $msg="Deleted record have been hide.";
            }elseif(isset($_POST["showDelete"]) && $_POST["showDelete"]==-1){
                $code=1;
                $msg="Only show deleted record.";
                $_SESSION["JQX-DEL-VIDEO"]=-1;
            }else{
                $code=1;
                $msg="Show all record.";
                $_SESSION["JQX-DEL-VIDEO"]=1;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function delete(){
            
            if(isset($_POST["VideoID"])){
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Delete \n    RowID : ".$_POST["VideoID"];
                
                if($this->video_model->delete($_POST["VideoID"])){
                    $this->log_model->insert(array("Table"=>"Video","RowID"=>$_POST["VideoID"],"Action"=>"Delete","Log"=>$VideoParams["Log"]));
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
        public function retore(){
            
            if(isset($_POST["VideoID"])){
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Restore \n    RowID : ".$_POST["VideoID"];
                if($this->video_model->retore($_POST["VideoID"])){
                    $this->log_model->insert(array("Table"=>"Video","Action"=>"Restore","RowID"=>$_POST["VideoID"],"Log"=>$VideoParams["Log"]));
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
        public function jqxgrid_video(){
            $jqx_data=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->video_model->jqxgrid_video();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $ca_value="";
                    $ca_arr=  explode(",,", ",".$row->Category.",");
                    foreach ($ca_arr as $ca){
                        if($ca!=null && $ca!="")
                        $ca_value.="<span class=\"mlr2 bgceb\">$ca</span>";
                    }
                    $jqx_data[] = array(
                        'VideoKey'      => $row->VideoKey,
                        'Title'         => $row->Title,
                        'Category'      => $ca_value,
                        'Alias'         => $row->Alias,
                        'Source'        => $row->Source,
                        'Tag'           => $row->Tag,
                        'Thumbs'        => $row->Thumbs,
                        'Author'        => $row->Author,
                        'Length'        => $row->Length,
                        'Status'        => json_encode(array(
                                        "VideoID"=>$row->VideoID,
                                        "Status"=>$row->Status
                                    )),
                        'Insert'        => $row->Insert,
                        'Update'        => $row->Update,
                        'Delete'        => $row->Delete,
                        'Video'         => json_encode(array(
                                        "VideoID"=>$row->VideoID,
                                        "Delete"=>$row->Delete
                                    ))
                    );
                }
            //}
            $data[] = array(
                'TotalRows' => $result['total_rows'],
                'Rows' => $jqx_data
            );
            echo json_encode($data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */