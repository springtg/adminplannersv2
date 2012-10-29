<?php 
session_start();
class home extends CI_Controller  {

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
       protected $configs;
       function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('javascript');
            $this->load->library('session');
            $this->load->library('smarty3','','smarty');
            $this->load->model('video/slider_model','slider_model');
            $this->load->model('video/contact_model','contact_model');
        }
        public function index()
	{
            $sliders=$this->slider_model->gets();
            $Data["Sliders"]=  objectToArray($sliders);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/01_home");
            
	}
        function Subscribe(){
            $msgs=array();
            $Subscribers=$_POST["Subscribers"];
            if( (!isset($Subscribers)) || $Subscribers==""){
                $msgs[]="Email does not empty.";
            }
            if (preg_match("/^[0-9a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $Subscribers) === 0) {
                $msgs[] = "Email is not valid.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $Params=array(
                    "Email"=>$Subscribers
                );
                
                if($this->contact_model->insertSubscribe($Params)){
                    $code=1;
                    $msg="Subscribe Success. Congratulations, and thank you. All new video will be sent to your inbox.";
                }else{
                    $code=-1;
                    
                    $msg="Fail. Please try again.";
                }
                
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
            
        }
        
}
