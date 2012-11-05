<?php 
session_start();
class authority extends CI_Controller  {

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
            $this->load->model('admin-planners/authority_model','authority_model');
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "system"   =>array("display"=>"Hệ Thống"          ,"value"=>"system"     ,"link"=>""),
                "authority" =>array("display"=>"Quyền"            ,"value"=>"authority"   ,"link"=>""),
                "account"   =>array("display"=>"Tài Khoản"        ,"value"=>"account"     ,"link"=>""),
                "group"     =>array("display"=>"Nhóm"             ,"value"=>"group"       ,"link"=>"")
            );
            $Data["tab_config"]["tabindex"]="authority";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/authority/01_jqx',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        function FlexiGridData(){
            
            $data=$this->authority_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->ID,
                            'cell'=>array(
                                    'ID'    =>$row->ID,
                                    'Key'   =>$row->Key,
                                    'Value' =>  htmlentities_UTF8($row->Value),
                                    'Name'  =>$row->Name,
                                    'Type'  =>$row->Type
                            ),
                    );
                    $jsonData['rows'][] = $entry;
            }
            echo json_encode($jsonData);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */