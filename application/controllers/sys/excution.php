<?php 
session_start();
class excution extends CI_Controller  {

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
       protected $cf;
       function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('javascript');
            $this->load->library('smarty3','','smarty');
            
        }
        
        public function index()
	{
            show_404();
            
	}
        function nothing(){}
        function logout(){
            session_destroy();
            redirect (base_url("quayso_ngaokiem/product"));
        }
        function login(){
            $users=array(
                "admin"=>array("name"=>"Administrator","password"=>"5a029c0258e9a8cebf4d644b74370c0c"),//@a-'
                "guest"=>array("name"=>"Guest","password"=>"2632a9189905c888ead002e11e5c4446")//a-'
            );
            
            $code=-1;
            $msg="Đăng nhập thất bại.";
            if(isset($_POST["username"]) && isset($_POST["password"])){
                if($users[$_POST["username"]]["password"]==md5($_POST["password"])){
                    $code=1;
                    $msg="Đăng nhập thành công";
                    $_SESSION["ADP-USER"]=$users[$_POST["username"]];
                }
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function getAlias(){
            $code=1;
            $msg= converturl($_POST["string"]);
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */