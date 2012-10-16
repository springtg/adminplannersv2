<?php 
session_start();
class stories extends CI_Controller  {

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
            $this->load->model('video/video_model','video_model');
            
        }
        public function index()
	{
            $limit=9;
            $begin=0;
            $videos=$this->video_model->gets($limit,$begin);
            $totalrecord=$this->video_model->counts();
            $pages=  intval(($totalrecord+8)/9);
            $pageindex=1;
            $Data["PageIndex"]=$pageindex;
            $Data["Pages"]=$pages;
            $Data["Videos"]=  objectToArray($videos);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/02_stories");
            
	}
        public function page($p=1)
	{
            $limit=9;
            $begin=($p-1)*$limit;
            $videos=$this->video_model->gets($limit,$begin);
            $totalrecord=$this->video_model->counts();
            $pages=  intval(($totalrecord+8)/9);
            $Data["PageIndex"]=$p;
            $Data["Pages"]=$pages;
            $Data["Videos"]=  objectToArray($videos);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/02_stories");
            
	}
        
        
}
