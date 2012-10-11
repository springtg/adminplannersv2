<?php 
session_start();
class storiesdetail extends CI_Controller  {

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
            
            
	}
        public function detail($alias="")
	{
            $video=$this->video_model->getByAlias($alias);
            if(isset($video[0])){
                $Data["Video"]=  objectToArray($video[0]);
                $cate=$Data["Video"]["Category"];
                $tag=$Data["Video"]["Tag"];
                $related=$this->video_model->getRelated($cate,$tag);
                $Data["Related"]=  objectToArray($related);
            }else{
                show_404();
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/03_stories_detail");
            
	}
        
        
}
