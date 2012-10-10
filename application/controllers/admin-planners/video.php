<?php 
session_start();
class video extends CI_Controller  {

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
            $this->load->model('admin-planners/video_model','video_model');
            $this->load->model('admin-planners/youtube','youtube');
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array("display"=>"Nội Dung"     ,"value"=>"content"   ,"link"=>""),
                "video"     =>array("display"=>"Video"        ,"value"=>"video"     ,"link"=>""),
                "contact"   =>array("display"=>"Liên Hệ"      ,"value"=>"contact"       ,"link"=>"")
            );
            $Data["tab_config"]["tabindex"]="video";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/video/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        public function YoutubeInfo(){
            $url=$_POST["url"];
            $video=$this->youtube->getVideo($url);
            if($video!=null){
                $video["alias"]=converturl($video["title"]);
            }
            echo json_encode($video);
        }
        public function EditVideo(){
            $Data["categorys"]=array(
                "Music"=>"Music",
                "Comedy"=>"Comedy",
                "FilmEntertainment"=>"Film & Entertainment",
                "Gamming"=>"Gamming",
                "BeautyFashion"=>"Beauty & Fashion",
                "FromTV"=>"FromTV",
                "Automotive"=>"Automotive",
                "Animation"=>"Animation",
                "Sports"=>"Sports",
                "Blogs"=>"Blogs",
                "CookingHealth"=>"Cooking & Health",
                "Science"=>"Science",
                "News"=>"News",
                "Lifestyle"=>"Lifestyle"
                
                
            );
            if(isset($_POST["VideoID"])){
                $video=$this->video_model->getVideo($_POST["VideoID"]);
                if(count($video)>0){
                    $Data["video"]=  objectToArray($video[0]);
                    $this->smarty->assign('Data', $Data);
                }
            }
            $this->smarty->assign('Data', $Data);
            $this->smarty->display('admin-planners/video/02_edit');
        }
        
        public function savevideo(){
            $Params=$_POST["Params"];
            $msgs=array();
            
            if( (!isset($Params["Source"])) || $Params["Source"]==""){
                $msgs[]="Link does not empty.";
            }
            if( (!isset($Params["VideoKey"])) || $Params["VideoKey"]==""){
                $msgs[]="Key does not empty.";
            }
            if( (!isset($Params["Author"])) || $Params["Author"]==""){
                $msgs[]="Author does not empty.";
            }
            if( (!isset($Params["Title"])) || $Params["Title"]==""){
                $msgs[]="Title does not empty.";
            }
            if( (!isset($Params["Categorys"])) || $Params["Categorys"]==""){
                $msgs[]="Please, choose the Categorys.";
            }
            if( (!isset($Params["Thumbs"])) || $Params["Thumbs"]==""){
                $msgs[]="Thumbs does not empty.";
            }
            if( (!isset($Params["Description"])) || $Params["Description"]==""){
                $msgs[]="Description does not empty.";
            }
            if( (!isset($Params["Tag"])) || $Params["Tag"]==""){
                $msgs[]="Tag does not empty.";
            }
            if( (!isset($Params["Embel"])) || $Params["Embel"]==""){
                $msgs[]="Embel does not empty.";
            }
            //echo"<pre>";print_r($Params);echo"</pre>";return;
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                $VideoParams=array(
                    "VideoKey"=>$Params["VideoKey"],
                    "Author"=>$Params["Author"],
                    "Alias"=>  converturl($Params["Title"]),
                    "Title"=>$Params["Title"],
                    "Category"=>$Params["Categorys"],
                    "Thumbs"=>$Params["Thumbs"],
                    "Description"=>$Params["Description"],
                    "Source"=>$Params["Source"],
                    "Tag"=>$Params["Tag"],
                    "Embel"=>$Params["Embel"],
                );
                if(isset($Params["VideoID"]) && $Params["VideoID"]!=""){
                    if($this->video_model->updateVideo($Params["VideoID"],$VideoParams)){
                        $code=1;
                        $msg="Thành công";
                    }else{
                        $code=-1;
                        $msg="Thất bại. Không cập nhật thông tin video được.";
                    }
                }else{
                    if($this->video_model->insertVideo($VideoParams)){
                        $code=1;
                        $msg="Thành công";
                    }else{
                        $code=-1;
                        $msg="Thất bại. Không thêm video mới được.";
                    }
                }
                //echo"<pre>";print_r($VideoParams);echo"</pre>";return;
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function jqxgrid_video(){
            $products=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->video_model->jqxgrid_video();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $products[] = array(
                            'VideoName'     => $row->VideoName,
                            'Title'     => $row->Title,
                            'Category'    => $row->Category,
                            'Source'     => $row->Source,
                            'Status'   => $row->Status,
                            'Insert'   => $row->Insert,
                            'Update'   => $row->Update,
                            'Video'   => json_encode(array(
                                            "VideoID"=>$row->VideoID,
                                            "Delete"=>$row->Delete
                                        ))
                    );
                }
            //}
            $data[] = array(
                'TotalRows' => $result['total_rows'],
                'Rows' => $products
            );
            echo json_encode($data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */