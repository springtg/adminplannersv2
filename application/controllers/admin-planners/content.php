<?php 
ini_set("pcre.backtrack_limit", "300000");
ini_set("pcre.recursion_limit", "300000");
session_start();
class content extends CI_Controller  {

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
            $this->load->model('admin-planners/content_model','content_model');
            $this->load->model('admin-planners/setting_model','setting_model');
            if(!isset($_SESSION["JQX-DEL-CONTENT"]))$_SESSION["JQX-DEL-CONTENT"]=1;
            include APPPATH . 'libraries/defu.php';
            $this->InitSetting();
        }
        function InitSetting(){
            $colModel=array(
                array(  "display"       =>"ID"                  ,"name"=>"ID"               ,"width"=>60        ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Title"               ,"name"=>"Title"            ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Alias"               ,"name"=>"Alias"            ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Thumb"               ,"name"=>"Thumb"            ,"width"=>120       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Status"              ,"name"=>"Status"           ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Insert"              ,"name"=>"Insert"           ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Update"              ,"name"=>"Update"           ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false),
                array(  "display"       =>"Delete"              ,"name"=>"Delete"           ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false)
            );
            if(isset($_SESSION["ADP-USER"])){
                if(!isset($_SESSION["admin-content-setting"])){
                    $data=$this->setting_model->getByKey("admin-content-settings");
                    if(isset($data[0])){
                        $_SESSION["admin-content-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }
                }
                if(isset($_SESSION["admin-content-setting"]["colModel"])){
                    $setting= $_SESSION["admin-content-setting"]["colModel"];
                    for($i=0;$i<count($colModel);$i++){
                        if(isset($setting[$colModel[$i]["name"]])){
                            $colModel[$i]["hide"]=(bool)$setting[$colModel[$i]["name"]];
                        }
                    }
                }
                
            }
            $this->_configs["colModel"]=$colModel;
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array(
                    "display"=>"Content"
                    ,"link"=>  base_url("admin-planners/content")
                    ),
                "video"     =>array(
                    "display"=>"Video"        
                    ,"link"=>base_url("admin-planners/video")),
                "slider"    =>array(
                    "display"=>"Slider in Home Page" 
                    ,"link"=>base_url("admin-planners/slider")),
                "contact"   =>array(
                    "display"=>"Contact"      
                    ,"link"=>base_url("admin-planners/contact")),
                "request"   =>array(
                    "display"=>"Request"      
                    ,"value"=>"request"       
                    ,"link"=>base_url("admin-planners/request")),
                "subscribers"   =>array(
                    "display"=>"Subscribers"      
                    ,"value"=>"subscribers"       
                    ,"link"=>base_url("admin-planners/subscribers")),
                "sendmail"   =>array(
                    "display"=>"Send Mail"      
                    ,"value"=>"sendmail"       
                    ,"link"=>base_url("admin-planners/sendmail"))
            );
            $Data["tab_config"]["tabindex"]="content";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/content/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	
	}
        function page(){
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array(
                    "display"=>"Content"
                    ,"link"=>  base_url("admin-planners/content/page")
                    ),
                "edit"   =>array(
                    "display"=>"Edit"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="content";
            $Data["flexigrid_settings"]["colModel"]=$this->_configs["colModel"];
            foreach ($Data["flexigrid_settings"]["colModel"] as $col){
                $Data["admin-content-settings"]["colModel"][$col["name"]]=$col["hide"];
            }
            $Data["admin-content-settings"]["display"]=1;
            $Params=array(
                "Key"=>"admin-content-settings",
                "Name"=>"admin-content-settings",
                "Type"=>"settings",
                "Value"=>json_encode($Data["admin-content-settings"])
            );
            //$exists = $this->db->select("ID")->where("ID", 10)->get()->row_array();
            $this->setting_model->insert_onduplicate_update("admin-content-settings",$Params);
            //$this->setting_model->insert($Params);
            $Data["flexigrid_settings"]["filterModel"]=filterModel($Data["flexigrid_settings"]["colModel"]);
            
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty->view('admin-planners/content/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
        }
        public function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $obj=$this->content_model->get($_POST["ID"]);
                if(count($obj)>0){
                    $Data["OBJ"]=  $obj[0];
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/content/03_climb_edit');
        }
        public function ChangeColumnDisplay(){
            
            $_SESSION["admin-content-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-content-settings",
                "Name"=>"admin-content-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-content-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-content-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeDeleteDisplay(){
            ChangeDisplay("JQX-DEL-GAL", $_POST["showDelete"]);
            $_SESSION["user-content-setting"]["display"]=$_POST["showDelete"];
            $Params=array(
                "Key"=>"admin-content-settings",
                "Name"=>"admin-content-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-content-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-content-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeStatus(){
            
            if(isset($_POST["Status"]) && isset($_POST["ID"])){
                $Params=array(
                    "Status"=>$_POST["Status"]
                );
                    if($this->content_model->update($_POST["ID"],$Params)){
                        $code=1;
                        $msg="Status' have been changed.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant change Status of this record";
                    }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Delete(){
            
            if(isset($_POST["ID"])){
                if($this->content_model->delete($_POST["ID"])){
                    $code=1;
                    $msg="Record have been deleted.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant delete this Record";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Restore(){
            
            if(isset($_POST["ID"])){
                if($this->content_model->retore($_POST["ID"])){
                    $code=1;
                    $msg="Record have been retored.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant retore this Record";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Save(){
            
            $vlows=array("\\\"","\\'");
            $vals=array("\"","'");
            $msgs=array();
            
            if( (!isset($_POST["Title"])) || $_POST["Title"]==""){
                $msgs[]="Title does not empty.";
            }
            if( (!isset($_REQUEST["Content"])) || $_REQUEST["Content"]==""){
                $msgs[]="Content does not empty.";
            }
            //echo $_Params["Content"];return;
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $Params=array(
                    "Alias"=>  converturl($_POST["Title"]),
                    "Title"=>$_POST["Title"],
                    "Thumb"=>$_POST["Thumb"],
                    "Type"=>"Page",
                    "Content"=>str_replace($vlows, $vals,$_REQUEST["Content"])
                    
                );
                if(isset($_POST["ID"]) && $_POST["ID"]!=""){
                    if($this->content_model->update($_POST["ID"],$Params)){
                        $code=1;
                        $msg="Success. Record have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update this Record.";
                    }
                }else{
                    if($this->content_model->insert($Params)){
                        $code=1;
                        $msg="Success. Record have been added to database.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant insert Record to database.";
                    }
                }
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function jqxgrid(){
            $jqx_data=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->content_model->jqxgrid();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $jqx_data[] = array(
                        'Title'         => $row->Title,
                        'Alias'         => $row->Alias,
                        'Thumb'         => $row->Thumb,
                        'Status'        => json_encode(array(
                                        "ID"=>$row->ID,
                                        "Status"=>$row->Status
                                    )),
                        'Insert'        => $row->Insert,
                        'Update'        => $row->Update,
                        'Delete'        => $row->Delete,
                        'Content'         => json_encode(array(
                                        "ID"=>$row->ID,
                                        "Delete"=>$row->Delete,
                                        "Lock"=>$row->Lock
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
        function FlexiGridData(){
            
            $data=$this->content_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->ID,
                            'cell'=>array(
                                'ID'                =>$row->ID,
                                'Title'             =>  htmlentities_UTF8($row->Title),
                                'Alias'             =>$row->Alias,
                                'Thumb'             =>$row->Thumb,
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