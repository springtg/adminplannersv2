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
        public function jqxgrid_authority(){
            $products=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->authority_model->jqxgrid_authority();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $products[] = array(
                            'Name'     => $row->Name,
                            'Value'    => $row->Value,
                            'Note'     => $row->Note,
                            'Insert'   => $row->Insert,
                            'Update'   => $row->Update,
                            'Authority'   => json_encode(array(
                                            "AuthorityID"=>$row->AuthorityID,
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