<?php 
session_start();
class settings extends CI_Controller  {

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
            $this->load->library('smarty3','','smarty');
            $this->load->model('admin-planners/setting_model','setting_model');
            $this->load->model('admin-planners/log_model','log_model');
            include APPPATH . 'libraries/defu.php';
        }
        function Init(){
            $data=$this->setting_model->gets();
            foreach ($data as $v){
                $_SESSION["SETTINGS"][$v->Key]=$v->Value;
            }
        }
        function gs(){
            $a=array("Name"=>"Trường","Company"=>"Sunsoft","obj"=>array("0"=>1,"a"=>3));
            $string=  print_r($a,true);
            //echo "String:$string";
            $arr=print_r_reverse($string);
            print_r($arr);
            
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
            $this->smarty->view('admin-planners/settings/04_settings',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        function Save(){
            $msgs=array();
            if( (!isset($_POST["ID"])) || $_POST["ID"]==""){
                $msgs[]="Bad request.";
            }
            if( (!isset($_POST["Key"])) || $_POST["Key"]==""){
                $msgs[]="Key does not empty.";
            }
            if( (!isset($_POST["Name"])) || $_POST["Name"]==""){
                $msgs[]="Name does not empty.";
            }
            if( (isset($_POST["Value"])) && $_POST["Value"]==""){
                $msgs[]="Value does not empty.";
            }
            if( (isset($_POST["link"])) && $_POST["link"]==""){
                $msgs[]="Link does not empty.";
            }
            if( (isset($_POST["image"])) && $_POST["image"]==""){
                $msgs[]="Image does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                
                $Params=array(
                    "Name"=>$_POST["Name"],
                    "Value"=>isset($_POST["Value"])?$_POST["Value"]:(
                            json_encode(array("link"=>$_POST["link"],"image"=>$_POST["image"]))
                        ),
                    "Log"=>print_r(array(
                        "Action"=>"Update",
                        "IP"=>getIP(),
                        "Time"=>date("Y-m-d h:i:s"),
                        "Params"=>array(
                            "ID"=>$_POST["ID"],
                            "Name"=>$_POST["Name"],
                            "Value"=>isset($_POST["Value"])?$_POST["Value"]:(
                                    json_encode(array("link"=>$_POST["link"],"image"=>$_POST["image"]))
                                ),
                            )
                        ), true)
                );
                //print_r($Params);return;
                if($this->setting_model->update($_POST["ID"],$Params)){
                    //$this->log_model->insert(array("Table" => "settings","RowID"=>$_POST["ID"], "Action" => "Update", "Log" => $Params["Log"]));
                    $code=1;
                    $msg="Success. Item have been updated.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant update this Item . Please check item' information.";
                }
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Delete(){
            $ID=isset($_POST["ID"])?$_POST["ID"]:"";
            $Params=array(
                "Log"=>print_r(array(
                    "Action"=>"Delete",
                    "IP"=>getIP(),
                    "Time"=>date("Y-m-d h:i:s"),
                    "Params"=>array(
                        "ID"=>$_POST["ID"],
                        )
                    ), true)
            );
            if($this->setting_model->delete($_POST["ID"])){
                $this->log_model->insert(array("Table" => "settings","RowID"=>$_POST["ID"], "Action" => "Delete", "Log" => $Params["Log"]));
                $code=1;
                $msg="Success. Item have been deleted.";
            }else{
                $code=-1;
                $msg="Fail. Cant delete this item.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Edit(){
            
            $ID=isset($_POST["ID"])?$_POST["ID"]:"";
            $row=$this->setting_model->get($ID);
            if(isset($row[0])){
                $row=  objectToArray($row[0]);
            }else{
                $row=null;
            }
            $Data["row"]=$row;
            if($Data["row"]["Type"]=="objectClassPartner")
                $Data["row"]["Value"]=  json_decode ($Data["row"]["Value"]);
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("admin-planners/Settings/02_edit");
        }
        function FlexiGridData(){
            
            $data=$this->setting_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->ID,
                            'cell'=>array(
                                    'ID'    =>$row->ID,
                                    'Key'   =>$row->Key,
                                    'Value' =>  htmlentities_UTF8($row->Value),
                                    'Name'  =>$row->Name,
                                    'Type'  =>$row->Type
                            ),
                    );
                    $jsonData['rows'][] = $entry;
            }
            echo json_encode($jsonData);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */