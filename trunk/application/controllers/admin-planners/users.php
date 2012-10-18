<?php 
session_start();
include APPPATH.'libraries/khlang.php';
class users extends CI_Controller  {

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
            $this->load->model('admin-planners/user_model','user_model');
            ;
            if(!isset($_SESSION["JQX-DEL-USER"]))$_SESSION["JQX-DEL-USER"]=1;
        }
        public function index()
	{
            global $lang;
            $Data["tab_config"]["tabs"]=array(
                "home"   =>array(
                    "display"=>$lang["home"]
                    ,"link"=>  base_url("admin-planners")
                    ),
                "setting"     =>array(
                    "display"=>$lang["settings"]    
                    ,"link"=>base_url("admin-planners/setting")),
                "content"    =>array(
                    "display"=>$lang["content"] 
                    ,"link"=>base_url("admin-planners/content"))
                ,"usermanage"    =>array(
                    "display"=>$lang["usermanage"] 
                    ,"link"=>base_url("admin-planners/usermanage"))
            );
            $Data["tab_config"]["tabindex"]="usermanage";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/user/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        public function checkVideoExist($ID){
            
        }
        
        public function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $video=$this->user_model->get($_POST["ID"]);
                if(count($video)>0){
                    $Data["OBJ"]=  objectToArray($video[0]);
                    $this->smarty->assign('Data', $Data);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/user/02_edit');
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
                if(isset($Params["ID"]) && $Params["ID"]!=""){
                    $ip = getIP();
                    $VideoParams["Log"] = "    IP : $ip \n    Action : Update \n    RowID : " . $Params["ID"] . "\n    VideoKey : " . $Params["VideoKey"];
                    if($this->user_model->updateVideo($Params["ID"],$VideoParams)){
                        $this->log_model->insert(array("Table" => "Video","RowID"=>$Params["ID"], "Action" => "Update", "Log" => $VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Video have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update video information.";
                    }
                }else{
                    $ip=  getIP();
                    $VideoParams["Log"]="    IP : $ip \n    Action : Insert \n    VideoKey : ".$Params["VideoKey"];
                    if($this->user_model->insertVideo($VideoParams)){
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
            
            if(isset($_POST["Status"]) && isset($_POST["ID"])){
                $VideoParams=array(
                    "Status"=>$_POST["Status"]
                );
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Change Status \n    RowID : ".$_POST["ID"]."\n    New Status : ".$_POST["Status"];
                if($this->user_model->updateVideo($_POST["ID"],$VideoParams)){
                    $this->log_model->insert(array("Table"=>"Video","RowID"=>$_POST["ID"],"Action"=>"Change Status","Log"=>$VideoParams["Log"]));
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
                $_SESSION["JQX-DEL-USER"]=0;
                $code=1;
                $msg="Deleted record have been hide.";
            }elseif(isset($_POST["showDelete"]) && $_POST["showDelete"]==-1){
                $code=1;
                $msg="Only show deleted record.";
                $_SESSION["JQX-DEL-USER"]=-1;
            }else{
                $code=1;
                $msg="Show all record.";
                $_SESSION["JQX-DEL-USER"]=1;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function delete(){
            
            if(isset($_POST["ID"])){
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Delete \n    RowID : ".$_POST["ID"];
                
                if($this->user_model->delete($_POST["ID"])){
                    $this->log_model->insert(array("Table"=>"Video","RowID"=>$_POST["ID"],"Action"=>"Delete","Log"=>$VideoParams["Log"]));
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
            
            if(isset($_POST["ID"])){
                $ip=  getIP();
                $VideoParams["Log"]="    IP : $ip \n    Action : Restore \n    RowID : ".$_POST["ID"];
                if($this->user_model->retore($_POST["ID"])){
                    $this->log_model->insert(array("Table"=>"Video","Action"=>"Restore","RowID"=>$_POST["ID"],"Log"=>$VideoParams["Log"]));
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
        public function jqxgrid(){
            $jqx_data=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->user_model->jqxgrid();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $jqx_data[] = array(
                        'UserName'      => $row->UserName,
                        'Name'          => $row->Name,
                        'Authority'     => $row->Authority,
                        'Group'         => $row->Group,
                        'Insert'        => $row->Insert,
                        'Update'        => $row->Update,
                        'Delete'        => $row->Delete,
                        'User'         => json_encode(array(
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
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */