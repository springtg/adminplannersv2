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
            //$this->load->library('session');
            $this->load->library('smarty3','','smarty');
            
            
        }
        public function index()
	{
            //$this->smarty->view("sys/01_notice",'NOTICE');
            //$this->smarty->view("sys/02_script",'SCRIPT');
            //$this->smarty->view("coffee/page/01_home",'PAGE');
            $this->smarty->display("Interdesign/pages/01_template");
            
	}
        function  im(){
            $this->smarty->display("impress/00_template");
        }
        function  ab(){
            $this->smarty->display("impress/02_about");
        }
        
        
}