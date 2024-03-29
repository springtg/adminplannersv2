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
            $Error=array(
                "color"=>"",
                "errortype"=>"404",
                "title"=>"Webpage not found.",
                "title"=>"Webpage not found.",
                "message"=>"The 404 or Not Found, the server could not find what was requested",
                "backlink"=>"",
                "homelink"=>  base_url("stories")
            );
            ShowError($Error);
            
	}
        public function detail($alias="")
	{
            $video=$this->video_model->getByAlias($alias);
            if(isset($video[0])){
                $Data["Video"]=  objectToArray($video[0]);
                $videoid=$Data["Video"]["VideoID"];
                $Data["VideoNex"]=objectToArray($this->video_model->getNex($videoid));
                if(isset($Data["VideoNex"][0])){
                    $Data["VideoNex"]=$Data["VideoNex"][0]["Alias"];
                }else{
                    $Data["VideoNex"]="";
                }
                $Data["VideoPre"]=objectToArray($this->video_model->getPre($videoid));
                if(isset($Data["VideoPre"][0])){
                    $Data["VideoPre"]=$Data["VideoPre"][0]["Alias"];
                }else{
                    $Data["VideoPre"]="";
                }
                $cate=$Data["Video"]["Category"];
                $tag=$Data["Video"]["Tag"];
                $related=$this->video_model->getRelated($Data["Video"]);
                $Data["Related"]=  objectToArray($related);
                
            }else{
                redirect(base_url("not-found"));
                //ShowError();
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("video/page/03_stories_detail");
            
	}
        public function notfound($alias="")
	{
            
            $this->smarty->display("video/page/07_not_found");
            
	}
        
}
