<?php 
session_start();
class sendmail extends CI_Controller  {

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
            $this->load->model('admin-planners/contact_model','contact_model');
            $this->load->model('admin-planners/video_model','video_model');
            
        }
        public function index()
	{
            
            $Data["subscribers"]=$this->contact_model->getSubscribers();
            $this->smarty->assign('configs',$configs );
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
            $Data["tab_config"]["tabindex"]="subscribers";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/subscribers/02_send_mail',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        function tokenProduct(){
            $q=$_POST["q"];
            $this->load->model('admin-planners/product_model','product_model');
            $arr= ($this->product_model->getProductToken($q));
            $json_response = json_encode($arr);
            if(isset($_GET["callback"])) {
                $json_response = $_GET["callback"] . "(" . $json_response . ")";
            }
            echo $json_response;
        }
        function getCustomerByGroup(){
            $group=$_POST["Group"];
            $cuslist=$this->customer_model->getByGroup($group);
            $configs["cuslist"]=array();
            foreach ($cuslist as $cus){
                if(isset($cus->Email) && $cus->Email!="" && $cus->Email!=null){
                if((preg_match("/^[0-9a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $cus->Email) === 0)){
                }else{
//                    if(isset($cus->LastSend) && (strtotime(date("Y-m-d"))-strtotime($cus->LastSend))<60*60*24){
//                        $cus->LastSend="Đã Gửi";
//                    }
                    
                    $configs["cuslist"][]=$cus;
                
                    }
                
                }
            }
            $this->smarty->assign('configs',$configs );
            $this->smarty->display('admin-planners/sendmail/02_list');
        }
        function CheckEmailValidate_(){
            $from_name = "Khuong";
            $from_email = "deal@thailongco.com";
            $headers = "From: $from_name <$from_email>";
            $body = "Truong Khuong hello. $from_name <$from_email>.";
            $subject = "co nhận được thư ko";
            $to = "khuongxuantruong@gmail.com";
            if (mail($to, $subject, $body, $headers)) {
                echo "success!";
            } else {
                echo "fail…";
            }
            $this->load->library('KUMail/KUMail','','KUMail');
            //$this->KUMail->CheckEmailValidate();
            //$this->KUMail->smtpmailerOther();
        }
        function TestSendMail(){
            $title=$_POST["title"];
            $email=$_POST["email"];
            $cc="";
            //$cc="khuongxuantruong@gmail.com,khuongxuantruong@zing.vn";
            $products=$_POST["products"];
            $products=$_POST["products"];
            $list="";
            foreach ($products as $pr){
                $list.=$pr["ProductID"].",";
            } 
            $list.=$products[0]["ProductID"];
            $from_name = "Thái Long CO";
            $from_email = "noreply@dealgiadung.com";
            $headers = "From: $from_name <$from_email>\r\n";
            $headers = "Bcc: $cc\r\n";
            $headers.="Content-type: text/html\r\n";
            $body="<html><body>".$this->CreateMailContent($list)."</body></html>";
            $subject = "$title";
            $to = $email;
            
            if (mail($to, $subject, $body, $headers)) {
                $code=1;
                $msg="Thành công.";
            } else {
                $code=-1;
                $msg="Thất bại.";
            }
            $result=array("code"=>$code,"msg"=>$msg);
            echo json_encode($result);
        }
        function ThreadSendMail(){
            $title=$_POST["title"];
            $cc=$_POST["listEmail"];
            //$this->customer_model->updateSendMail($cc);
            $cc="khuongxuantruong@gmail.com,khuongxuantruong@zing.vn";
            $products=$_POST["products"];
            $products=$_POST["products"];
            $from_name = "Retomychild";
            $from_email = "noreply@readtomychild.com.au";
            $headers = "From: $from_name <$from_email>\r\n";
            $headers = "Bcc: $cc\r\n";
            $headers.="Content-type: text/html\r\n";
            $body="<html><body>".$this->CreateMailContent($_POST["ID"])."</body></html>";
            $subject = "$title";
            $to = "";
            
            if (mail($to, $subject, $body, $headers)) {
            //if(true){
                $code=0;
                $msg="Sussess.";
            } else {
                $code=-1;
                $msg="Fails.";
            }
            $result=array("code"=>$code,"msg"=>$msg);
            echo json_encode($result);
        }
        public function checkauthority(){
            if(isset($_SESSION["ADP-USER"]["AUTHORITY"])){
                $myau=-1;
                if(is_array($_SESSION["ADP-USER"]["AUTHORITY"])){
                    foreach ($_SESSION["ADP-USER"]["AUTHORITY"] as $au){
                        if($au["keyword"]=="view" && $myau==-1)$myau=0;
                        if($au["keyword"]=="admin")$myau=1;
                        if($au["keyword"]==$this->_configs["authority"]){
                            if($au["value"]==0 && $myau==-1) $myau=0;
                            if($au["value"]==1) $myau=1;
                        }
                    }
                }
                return $myau>=$this->_configs["MinAuthority"]?$myau:-1;
            }return -1;
        }
        public function CreateMailContent($ID=""){
            $video=$this->video_model->getVideo($ID);
            if(isset($video[0]))$video=$video[0];
            else{return "";}
            $mailcontent="
                <div style=\"background:#eee;\">
                    <div style=\"width:580px; font-family: Arial; font-size:10px; line-height:13px; margin:0 auto; background:#fff; border:solid thin #CCC; \">
                        <div style=\"text-align:center; color:#fff; background:#666; padding:5px 0;\">
                            You're receiving this newsletter because you have subscribed from us.
                        </div>
                        <div style=\"background:url('http://www.readtomychild.com.au/css_video/img/bg.gif') repeat; display:block;\">
                            <div style=\"text-align:center; padding:20px 0;\">
                                <a href=\"www.readtomychild.com.au\">
                                    <img width=\"560px\" src=\"http://www.readtomychild.com.au/css_video/img/ribbon-home-big.png\" />
                                </a>
                            </div>
                        </div>
                        <div style=\"padding:10px 10px;\">
                            <div style=\"font-size:12px;color:#ff6666; line-height:18px; margin-top:10px; font-weight:bold;\">
                                The list below includes our new videos, we hope that you will have a good time with them.
                            </div>
                            <div style=\"font-size:12px; color:#333; line-height:18px; border-top:thin dashed #CCC; margin:10px 0;\">
                                <div style=\"width:290px; height:163px; border:solid 5px #eee; margin:10px 0px; float:left\">
                                    <a href=\"http://www.readtomychild.com.au/stories-detail/who-flung-dung\" target=\"_blank\">
                                        <img width='290' height='163' src=\"$video->Thumbs\" />
                                    </a>
                                </div>
                                <div style=\"width:240px; float:right; margin:10px 10px; color:#555;\">
                                    <div style=\"padding:5px 0; border-bottom:thin dashed #CCC;\">
                                        <a href=\"http://www.readtomychild.com.au/stories-detail/who-flung-dung\" 
                                            style=\"font-size:15px; line-height:23px; font-weight:bold; color:#53bec8; text-transform:uppercase; text-decoration:none;\">
                                            $video->Title
                                        </a>
                                    </div>
                                    <div style=\"padding:5px 0;\"><b>Author:</b>  $video->Author</div>
                                    <div style=\"padding:5px 0;\"><b>Short Description:</b>$video->Description</div>
                                    <div style=\"margin-top:10px;\">
                                        <a href=\"http://readtomychild.com.au/stories-detail/$video->Alias\" 
                                            style=\"padding:5px 20px; text-transform:uppercase; font-weight:bold; background:#ea8254; color:#fff; text-decoration:none;\">Watch it now!</a></div>
                                </div>
                                <div style=\"clear:both\"></div>
                            </div>
                        </div>
                        <div style=\"text-align:center;color:#fff; background:#666; padding:5px 0;\">Copyright © 2012 <a href=\"www.readtomychild.com.au\" style=\"color:#FFF; font-weight:bold;\">Read To My Child</a>. All Rights Reserved.</div>
                    </div>
                </div>
                    ";
            
            return $mailcontent;
        }
        public function getMailcontent(){
            $mailcontent= "Error.";
            if(isset($_POST["ID"])){
                $mailcontent=$this->CreateMailContent($_POST["ID"]);
            }
            $result=array("code"=>1,"htmlcontent"=>$mailcontent);
            echo json_encode($result);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */