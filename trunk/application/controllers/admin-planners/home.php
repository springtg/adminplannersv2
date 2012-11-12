<?php 
session_start();
include APPPATH.'libraries/khlang.php';

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
       private $_configs = null;
       function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('javascript');
            $this->load->library('session');
            $this->load->library('smarty3','','smarty');
            $_SESSION["LANG"]="VI";
            
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
            $Data["tab_config"]["tabindex"]="home";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            
            $this->smarty->display("admin-planners/00_template");
	}
        function login(){
            $this->smarty->display("admin-planners/01_login");
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */