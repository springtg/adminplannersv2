<?php 
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
            if(!isset($_SESSION["JQX-DEL-CONTENT"]))$_SESSION["JQX-DEL-CONTENT"]=1;
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
        public function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $obj=$this->content_model->get($_POST["ID"]);
                if(count($obj)>0){
                    $Data["OBJ"]=  objectToArray($obj[0]);
                    $this->smarty->assign('Data', $Data);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/content/02_edit');
        }
        public function ChangeDeleteDisplay(){
            
            if(isset($_POST["showDelete"]) && $_POST["showDelete"]==0){
                $_SESSION["JQX-DEL-CONTENT"]=0;
                $code=1;
                $msg="Deleted record have been hide.";
            }elseif(isset($_POST["showDelete"]) && $_POST["showDelete"]==-1){
                $code=1;
                $msg="Only show deleted record.";
                $_SESSION["JQX-DEL-CONTENT"]=-1;
            }else{
                $code=1;
                $msg="Show all record.";
                $_SESSION["JQX-DEL-CONTENT"]=1;
            }
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
        public function delete(){
            
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
        public function retore(){
            
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
            $_Params=$_POST["Params"];
            $_Params["Content"]=  str_replace($vlows, $vals,$_REQUEST["Params"]["Content"]);
            $msgs=array();
            
            if( (!isset($_Params["Title"])) || $_Params["Title"]==""){
                $msgs[]="Title does not empty.";
            }
            if( (!isset($_Params["Alias"])) || $_Params["Alias"]==""){
                $msgs[]="Alias does not empty.";
            }
            if( (!isset($_Params["Content"])) || $_Params["Content"]==""){
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
                    "Alias"=>  converturl($_Params["Title"]),
                    "Title"=>$_Params["Title"],
                    "Thumb"=>$_Params["Thumb"],
                    "Content"=>$_Params["Content"]
                    
                );
                if(isset($_Params["ID"]) && $_Params["ID"]!=""){
                    if($this->content_model->update($_Params["ID"],$Params)){
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
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */