<?php 
session_start();
class contact extends CI_Controller  {

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
            $this->load->model('video/contact_model','contact_model');
            $this->load->model('video/content_model','content_model');
            
        }
        public function index()
	{
            $getintouch=$this->content_model->get("1");
            $getintouch=  isset($getintouch[0])?objectToArray($getintouch[0]):null;
            $Data["getintouch"]=$getintouch;
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/05_contact");
            
	}
        function contactus(){
            $Params=$_POST["Params"];
            $msgs=array();
            
            if( (!isset($Params["FullName"])) || $Params["FullName"]==""){
                $msgs[]="FullName does not empty.";
            }
//            if (!preg_match('/^[a-zA-Z ]+$/', $Params["FullName"])) {
//                
//                $msgs[] = "Name is not valid. ";
//            }
        
            if( (!isset($Params["Email"])) || $Params["Email"]==""){
                $msgs[]="Email does not empty.";
            }
            if (preg_match("/^[0-9a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $Params["Email"]) === 0) {
                $msgs[] = "Email is not valid.";
            }
            if( (!isset($Params["Subject"])) || $Params["Subject"]==""){
                $msgs[]="Subject does not empty.";
            }
            if( (!isset($Params["Message"])) || $Params["Message"]==""){
                $msgs[]="Message does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $ContactParams=array(
                    "FullName"=>$Params["FullName"],
                    "Email"=>$Params["Email"],
                    "Subject"=>  converturl($Params["Subject"]),
                    "Message"=>$Params["Message"]
                );
                
                if($this->contact_model->insert($ContactParams)){
                    $code=1;
                    $msg="Success. Thank you for contacting us!.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant insert your contact. Please try again.";
                }
                
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        
}
