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
            $this->_configs["title"]="Product Management";
            $this->_configs["authority"]="product";
            $this->_configs["MinAuthority"]=0;
            $this->load->model('quayso_ngaokiem/product_model','product_model');
            $this->configs=array(
                'client_id' => 'gosu.865017002bc199d2b2bfe4b3db914213',      //client_id cua ung dung
                'service_id'=>'gosu.paygate.beac84d9bfb72a8c8decc5c98f6b801b',
                'client_secret' => 'UbXk9kmYpqy70qKyOErsm2nst2btNggajTiM248sov3wQL9YwjvqKolUK0H7ICYqiMtBbw',     //client_secret cua ung dung
                'service_key'=>'tMZgMqbUSTrmJpNzn4FwhfPCQNBeqnavqyhuljzNa4sbSwR4iFBtD4KK2XbqU62',
                'startdate'=>"08/01/2012",
                'enddate'=>'08/01/2012',
                'game'=>"NGAOKIEM",
                'skey'=>"NGAOKIEMII-10-2012"
            );
        }
        public function index()
	{
            $configs=$this->_configs;
            $configs["tab"]="product";
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('configs', $configs);
            $this->smarty->view("quayso_ngaokiem/adbi/pr/01_product",'jqxGrid');
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->display("sys/00_demo");
            
	}
        function changeStatusHistory(){
            $id=$_POST["id"];
            $status=$_POST["status"];
            $code=-1;
            $msg="Thất bại, không thể cập nhật trạng thái record, đã có lỗi sảy ra.";
            if($this->product_model->updateHistoryStatus($id,$status)){
                $code=1;
                $msg="Thành công. Đã cập nhật trạng thái record.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function history($id="")
	{
            $configs=$this->_configs;
            $configs["productid"]="$id";
            $pr=$this->product_model->get($this->configs["game"],$this->configs["skey"],$id);
            if(isset($pr[0]))$pr=$pr[0];
            $configs["tab"]="history";
            $configs["product"]=$pr;
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('configs', $configs);
            $this->smarty->view("quayso_ngaokiem/adbi/pr/02_history",'jqxGrid');
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->display("sys/00_demo");
	}
        public function log($id="")
	{
           $configs=$this->_configs;
            $configs["productid"]="$id";
            $pr=$this->product_model->get($this->configs["game"],$this->configs["skey"],$id);
            if(isset($pr[0]))$pr=$pr[0];
            $configs["tab"]="log";
            $configs["product"]=$pr;
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('configs', $configs);
            $this->smarty->view("quayso_ngaokiem/adbi/pr/03_log",'jqxGrid');
            $this->smarty->view("sys/01_notice",'NOTICE');
            $this->smarty->view("sys/02_script",'SCRIPT');
            $this->smarty->display("sys/00_demo");
	}
        public function checkauthority(){
            if(isset($_SESSION["AUTHORITY"])){
                $myau=-1;
                if(is_array($_SESSION["AUTHORITY"])){
                    foreach ($_SESSION["AUTHORITY"] as $au){
                        if($au["keyword"]=="view" && $myau==-1)$myau=0;
                        if($au["keyword"]=="admin")$myau=1;
                        if($au["keyword"]==$this->_configs["authority"]){
                            if($au["value"]==0 && $myau==-1) $myau=0;
                            if($au["value"]==1) $myau=1;
                        }
                    }
                }
                return $myau>=$this->_configs["MinAuthority"]?$myau:-1;
            }return -1;
        }
        
        function jqgrid_data(){
            
            $products=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                
                $result=$this->product_model->gettotal_rows($this->configs["game"],$this->configs["skey"]);
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $products[] = array(
                            //'id'       => $row->id,
                            '_name_'     => $row->name,
                            '_amount_'    => $row->amount,
                            '_active_'     => $row->active,
                            '_pecent_'   => $row->pecent,
                            '_insert_'   => $row->insert,
                            '_update_'   => $row->update,
                            '_id_'   => json_encode(array(
                                            "_id_"=>$row->id,
                                            "_delete_"=>$row->delete
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
        function jqgrid_data_history($id=""){
            
            $products=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->product_model->gettotal_rows_history($this->configs["game"],$this->configs["skey"]);
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $products[] = array(
                            //'id'       => $row->id,
                            '_username_'     => $row->username,
                            '_server_'    => $row->server,
                            '_charactor_'     => $row->charactor,
                            '_productname_'   => $row->productname,
                            '_gifcode_'   => $row->gifcode,
                            '_status_'   => json_encode(array(
                                            "_id_"=>$row->id,
                                            "_status_"=>$row->status
                                        )),
                            '_insert_'   => $row->insert,
                            '_update_'   => $row->update,
                            '_id_'   => json_encode(array(
                                            "_id_"=>$row->id,
                                            "_delete_"=>$row->delete
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
        function jqgrid_data_log_product($id=""){
            
            $products=array();
            $result['total_rows']=0;
            //if($this->checkauthority()>=0){
                $result=$this->product_model->gettotal_rows_log_product($this->configs["game"],$this->configs["skey"],$id);
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $products[] = array(
                            '_productname_'   => $row->productname,
                            '_log_'   => $row->newlog,
                            '_insert_'   => $row->insert
                            
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