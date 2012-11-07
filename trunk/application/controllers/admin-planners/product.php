<?php 
session_start();
class product extends CI_Controller  {

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
            $this->load->model('admin-planners/product_model','product_model');
            include APPPATH . 'libraries/defu.php';
        }
        public function index()
	{
            $Data["tab_config"]["tabs"]=array(
                "product"   =>array(
                    "display"=>"Product"
                    ,"value"=>"product"   
                    ,"link"=>  base_url("admin-planners/product")
                    )
            );
            $Data["tab_config"]["tabindex"]="product";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->view('admin-planners/tabs/01_tabs',"TABS");
            $this->smarty->view('admin-planners/product/01_flexigrid',"JQXGRID");
            $this->smarty->display("admin-planners/00_template");
	}
        function FlexiGridData(){
            
            $data=$this->product_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->ProductID,
                            'cell'=>array(
                                'ProductID'         =>$row->ProductID,
                                'ProductName'       =>$row->ProductName,
                                'QuantityPerUnit'   =>$row->QuantityPerUnit,
                                'UnitPrice'         =>$row->UnitPrice,
                                'UnitsInStock'      =>$row->UnitsInStock,
                                'UnitsOnOrder'      =>$row->UnitsOnOrder,
                                'ProductTitle'      =>$row->ProductTitle,
                                'StartDate'         =>$row->StartDate,
                                'EndDate'           =>$row->EndDate,
                                'Amount'            =>$row->Amount,
                                'Supplier'          =>$row->Supplier,
                                'Status'            =>$row->Status,
                                'Insert'            =>$row->Insert,
                                'Update'            =>$row->Update,
                                'Delete'            =>$row->Delete
                            ),
                    );
                    $jsonData['rows'][] = $entry;
            }
            echo json_encode($jsonData);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */