<?php 
session_start();
class slider extends CI_Controller  {

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
            $this->load->model('admin-planners/slider_model','slider_model');
        }
        public function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $slider=$this->slider_model->get($_POST["ID"]);
                if(count($slider)>0){
                    $Data["slider"]=  objectToArray($slider[0]);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/slider/02_edit');
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array(
                    "display"=>"Nội Dung"     
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
                    "display"=>"Liên Hệ"      
                    ,"value"=>"contact"       
                    ,"link"=>base_url("admin-planners/contact"))
            );
            $Data["tab_config"]["tabindex"]="slider";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/slider/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        public function Save(){
            $Params=$_POST["Params"];
            $msgs=array();
            
            if( (!isset($Params["VideoID"])) || $Params["VideoID"]==""){
                $msgs[]="Please choose the video.";
            }
            if( (!isset($Params["Position"])) || $Params["Position"]=="" || !is_numeric($Params["Position"])){
                $Params["Position"]=0;
            }
            if( (!isset($Params["Image"])) || $Params["Image"]==""){
                $msgs[]="Image does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $SliderParams=array(
                    "VideoID"=>$Params["VideoID"],
                    "Title"=>$Params["Title"],
                    "Image"=>  $Params["Image"]
                    ,"Position"=>$Params["Position"]
                );
                if(isset($Params["ID"]) && $Params["ID"]!=""){
                    //echo "aaa";return;
                    if($this->slider_model->update($Params["ID"],$SliderParams)){
                        $code=1;
                        $msg="Success. Slider have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update Slider information.";
                    }
                }else{
                    //print_r($SliderParams);return;
                    if($this->slider_model->insert($SliderParams)){
                        $code=1;
                        $msg="Success. Slider have been added to database.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant insert Slider to database.";
                    }
                }
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeStatus(){
            
            if(isset($_POST["Status"]) && isset($_POST["ID"])){
                $Params=array(
                    "Status"=>$_POST["Status"]
                );
                    if($this->slider_model->update($_POST["ID"],$Params)){
                        $code=1;
                        $msg="Status' have been changed.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant change Status of this slider.";
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
                $result=$this->slider_model->jqxgrid();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $jqx_data[] = array(
                            'VideoID'      => $row->VideoID,
                            'Title'         => $row->Title,
                            'Position'      => $row->Position,
                            'Image'        => $row->Image,
                            'Status'        => json_encode(array(
                                            "ID"=>$row->ID,
                                            "Status"=>$row->Status
                                        )),
                            'Insert'        => $row->Insert,
                            'Update'        => $row->Update,
                            'Slider'         => json_encode(array(
                                            "ID"=>$row->ID,
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