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
            echo "<script>history.back();</script>";
        }
        function login(){
            $this->load->model('admin-planners/account_model','account_model');
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $account=$this->account_model->login($_POST["username"],md5($_POST["password"]));
                if(count($account)>0){
                    $_SESSION["ADP-USER"]=objectToArray($account[0]);
                    $authority=$_SESSION["ADP-USER"]["Authority"].$_SESSION["ADP-USER"]["GroupAuthority"];
                    $authority=  preg_split("~;~", $authority, -1, PREG_SPLIT_NO_EMPTY);
                    $authority=$this->account_model->getAuthoritys($authority);
                    $_SESSION["ADP-USER"]["Au"]=$authority;
                    $result=array(
                    "code"      =>  0,
                    "msg"       => "Login successful."
                    );
                }else{
                    $result=array(
                    "code"      =>  -1,
                    "msg"       => "Login fail.Please, check Username or Password <br/>"
                    );
                }
            }else{
                $result=array(
                    "code"      =>  -1,
                    "msg"       => "Bad request!"
                );
            }
            echo json_encode($result);
        }
        function getAlias(){
            $code=1;
            $msg= converturl($_POST["string"]);
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */