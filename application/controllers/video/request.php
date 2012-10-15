<?php 
session_start();
class request extends CI_Controller  {

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
            $this->load->model('video/content_model','content_model');
            
        }
        public function index()
	{
            $request=$this->content_model->get("6");
            $request=  isset($request[0])?objectToArray($request[0]):null;
            $Data["request"]=$request;
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/06_request");
            
	}
        
        
}
