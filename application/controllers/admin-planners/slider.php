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
            if( (!isset($Params["Categorys"])) || $Params["Categorys"]==""){
                $msgs[]="Please, choose the Categorys.";
            }
            if( (!isset($Params["Thumbs"])) || $Params["Thumbs"]==""){
                $msgs[]="Thumbs does not empty.";
            }
            if( (!isset($Params["Description"])) || $Params["Description"]==""){
                $msgs[]="Description does not empty.";
            }
            if( (!isset($Params["Tag"])) || $Params["Tag"]==""){
                $msgs[]="Tag does not empty.";
            }
            if( (!isset($Params["Embel"])) || $Params["Embel"]==""){
                $msgs[]="Embel does not empty.";
            }
            //echo"<pre>";print_r($Params);echo"</pre>";return;
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
                if(isset($Params["VideoID"]) && $Params["VideoID"]!=""){
                    if($this->video_model->updateVideo($Params["VideoID"],$VideoParams)){
                        $code=1;
                        $msg="Success. Video have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update video information.";
                    }
                }else{
                    if($this->video_model->insertVideo($VideoParams)){
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
                    if($this->video_model->updateVideo($_POST["VideoID"],$VideoParams)){
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
        public function jqxgrid(){
            $jqx_data=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->video_slider->jqxgrid();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $jqx_data[] = array(
                            'VideoID'      => $row->VideoID,
                            'Title'         => $row->Title,
                            'Position'      => $row->Position,
                            'Image'        => $row->Image,
                            'Status'        => json_encode(array(
                                            "ID"=>$row->VideoID,
                                            "Status"=>$row->Status
                                        )),
                            'Insert'        => $row->Insert,
                            'Update'        => $row->Update,
                            'Slider'         => json_encode(array(
                                            "ID"=>$row->VideoID,
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