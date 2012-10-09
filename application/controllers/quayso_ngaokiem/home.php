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
       private $_configs = null;
       function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('javascript');
            $this->load->library('session');
            $this->load->library('smarty3','','smarty');
            $this->load->model('table_model');
            //$this->session->set_userdata('USER', array("name"=>"khuong truong","id"=>01));
        }
        public function index()
	{
            redirect(base_url("quayso_ngaokiem/product"));
            
	}
        function reloadMenu(){
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->display('quayso_ngaokiem/adbi/00_4_menu_content');
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */