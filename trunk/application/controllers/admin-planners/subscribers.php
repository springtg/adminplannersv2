<?php 
session_start();
class subscribers extends CI_Controller  {

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
            $this->load->model('admin-planners/contact_model','contact_model');
            
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "content"   =>array(
                    "display"=>"Content"
                    ,"value"=>"content"   
                    ,"link"=>  base_url("admin-planners/content")
                    ),
                "video"     =>array(
                    "display"=>"Video"        
                    ,"value"=>"video"     
                    ,"link"=>base_url("admin-planners/video")),
                "slider"    =>array(
                    "display"=>"Slider in Home Page" 
                    ,"value"=>"slider"     
                    ,"link"=>base_url("admin-planners/slider")),
                "contact"   =>array(
                    "display"=>"Contact"      
                    ,"value"=>"contact"       
                    ,"link"=>base_url("admin-planners/contact")),
                "request"   =>array(
                    "display"=>"Request"      
                    ,"value"=>"request"       
                    ,"link"=>base_url("admin-planners/request")),
                "subscribers"   =>array(
                    "display"=>"Subscribers"      
                    ,"value"=>"subscribers"       
                    ,"link"=>base_url("admin-planners/subscribers")),
                "sendmail"   =>array(
                    "display"=>"Send Mail"      
                    ,"value"=>"sendmail"       
                    ,"link"=>base_url("admin-planners/sendmail"))
            );
            $Data["tab_config"]["tabindex"]="subscribers";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/subscribers/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        public function deleteSubscribers(){
            
            if(isset($_POST["ID"])){
                if($this->contact_model->deleteSubscribers($_POST["ID"])){
                    $code=1;
                    $msg="Item have been deleted.";
                }else{
                    $code=-1;
                    $msg="Fail. Cant delete this item.";
                }
            }else{  
                $code=-1;
                $msg="Fail.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function jqxgrid(){
            $jqx_data=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->contact_model->jqxgridSubscribers();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $jqx_data[] = array(
                        'Email'         => $row->Email,
                        'Insert'        => $row->Insert,
                        'Subscribers'         => json_encode(array(
                                        "ID"=>$row->ID,
                                        "Delete"=>$row->Delete
                                    ))
                    );
                }
            //}
            $data[] = array(
                'TotalRows' => $result['total_rows'],
                'Rows' => $jqx_data
            );
            echo json_encode($data);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */