<?php 
session_start();
class orders extends CI_Controller  {

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
            $this->load->model('admin-planners/order_model','my_model');
            $this->load->model('admin-planners/setting_model','setting_model');
            include APPPATH . 'libraries/defu.php';
            if(!isset($_SESSION["JQX-DEL-ORDER"]))$_SESSION["JQX-DEL-ORDER"]=0;
            $this->InitSetting();
        }
        function InitSetting(){
            $colModel=array(
                array(  "display"       =>"Order ID"            ,"name"=>"OrderID"          ,"width"=> 80       ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>true),
                array(  "display"       =>"Type"                ,"name"=>"Paypal"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"      ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Customer ID"         ,"name"=>"CustomerID"       ,"width"=> 80       ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Customer Name"       ,"name"=>"CustomerName"     ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Order Date"          ,"name"=>"OrderDate"        ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship Name"           ,"name"=>"ShipName"         ,"width"=>120       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship Address"        ,"name"=>"ShipAddress"      ,"width"=>120       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship City"           ,"name"=>"ShipCity"         ,"width"=>120       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship Region"         ,"name"=>"ShipRegion"       ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship Postal Code"    ,"name"=>"ShipPostalCode"   ,"width"=> 80       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Ship Country"        ,"name"=>"ShipCountry"      ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false ),
                array(  "display"       =>"Monney"              ,"name"=>"Monney"           ,"width"=> 60       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Status"              ,"name"=>"Status"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Insert"              ,"name"=>"Insert"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Update"              ,"name"=>"Update"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false),
                array(  "display"       =>"Delete"              ,"name"=>"Delete"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false)
            );
            if(isset($_SESSION["ADP-USER"])){
                if(!isset($_SESSION["admin-order-setting"])){
                    $_SESSION["admin-order-setting"]=array();
                    $data=$this->setting_model->getByKey("admin-order-settings");
                    if(isset($data[0])){
                        $_SESSION["admin-order-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }else{
                        $_SESSION["admin-order-setting"]["colModel"]=array();
                    }
                }
                $setting= $_SESSION["admin-order-setting"]["colModel"];
                for($i=0;$i<count($colModel);$i++){
                    if(isset($setting[$colModel[$i]["name"]])){
                        $colModel[$i]["hide"]=(bool)$setting[$colModel[$i]["name"]];
                    }
                }
                
            }
            $this->_configs["colModel"]=$colModel;
        }
        public function index()
	{
            
            $Data["tab_config"]["tabs"]=array(
                "orders"   =>array(
                    "display"=>"Orders"
                    ,"link"=>  base_url("admin-planners/orders")
                    ),
                "edit"   =>array(
                    "display"=>"Order Details"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="orders";
            $Data["flexigrid_settings"]["colModel"]=$this->_configs["colModel"];
            foreach ($Data["flexigrid_settings"]["colModel"] as $col){
                $Data["admin-order-settings"]["colModel"][$col["name"]]=$col["hide"];
            }
            $Data["admin-order-settings"]["display"]=1;
            $Params=array(
                "Key"=>"admin-order-settings",
                "Name"=>"admin-order-settings",
                "Type"=>"settings",
                "Value"=>json_encode($Data["admin-order-settings"])
            );
            $Data["flexigrid_settings"]["filterModel"]=filterModel($Data["flexigrid_settings"]["colModel"]);     
            if(isset($_SESSION["ADP-USER"])){
                //$this->setting_model->insert_onduplicate_update("admin-order-settings",$Params);
                $this->smarty
                        ->assign('_SESSION', $_SESSION)
                        ->assign('Data', $Data)
                        ->view('admin-planners/order/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
	}
        
        public function ChangeColumnDisplay(){
            
            $_SESSION["admin-order-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-order-settings",
                "Name"=>"admin-order-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-order-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-order-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeDeleteDisplay(){
            ChangeDisplay("JQX-DEL-ORDER", $_POST["showDelete"]);
            $_SESSION["admin-order-setting"]["display"]=$_POST["showDelete"];
            $Params=array(
                "Key"=>"admin-order-settings",
                "Name"=>"admin-order-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-order-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-order-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Edit(){
            $Data=null;
            
            if(isset($_POST["ID"])){
                $pr=$this->my_model->get($_POST["ID"]);
                if(count($pr)>0)$Data["OBJ"]=$pr;
            }
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("admin-planners/order/02_edit");
        }
        public function Delete(){
            if(isset($_POST["ID"])){
                $ip=  getIP();
                if($this->my_model->delete($_POST["ID"])){
                    $code=1;
                    $msg="Item đã được xóa.";
                }else{
                    $code=-1;
                    $msg="Lỗi. Chưa xóa được item.";
                }
            }else{  
                $code=-1;
                $msg="Không xác định được dữ liệu cần xóa.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function Restore(){
            if(isset($_POST["ID"])){
                $ip=  getIP();
                if($this->my_model->restore($_POST["ID"])){
                    $code=1;
                    $msg="Item đã được khôi phục.";
                }else{
                    $code=-1;
                    $msg="Lỗi. Chưa khôi phục được item.";
                }
            }else{  
                $code=-1;
                $msg="Không xác định được dữ liệu cần khôi phục.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeStatus(){
            
            if(isset($_POST["Status"]) && isset($_POST["ID"])){
                $Params=array(
                    "Status"=>$_POST["Status"]
                );
                //$ip=  getIP();
                //$VideoParams["Log"]="    IP : $ip \n    Action : Change Status \n    RowID : ".$_POST["VideoID"]."\n    New Status : ".$_POST["Status"];
                if($this->my_model->update($_POST["ID"],$Params)){
                    //$this->log_model->insert(array("Table"=>"Video","RowID"=>$_POST["VideoID"],"Action"=>"Change Status","Log"=>$VideoParams["Log"]));
                    $code=1;
                    $msg="Trạng thái Item đã được thay đổi.";
                }else{
                    $code=-1;
                    $msg="Lỗi. Không thể thay đổi trạng thái Item.";
                }
            }else{  
                $code=-1;
                $msg="Không xác định được dữ liệu.";
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function g(){
            print_r($_SESSION["regquest"]);
        }
        function FlexiGridData(){
            $_SESSION["regquest"]=$_REQUEST;
            $data=$this->my_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->OrderID,
                            'cell'=>array(
                                'OrderID'           =>$row->OrderID,
                                'CustomerID'        =>$row->CustomerID,
                                'CustomerName'      =>  htmlentities_UTF8($row->CustomerName),
                                'OrderDate'         =>$row->OrderDate,
                                'ShipName'          =>$row->ShipName,
                                'ShipAddress'       =>$row->ShipAddress,
                                'ShipCity'          =>$row->ShipCity,
                                'ShipRegion'        =>$row->ShipRegion,
                                'ShipPostalCode'    =>$row->ShipPostalCode,
                                'ShipCountry'       =>$row->ShipCountry,
                                'Monney'            =>$row->Monney,
                                'Status'            =>$row->Status,
                                'Insert'            =>$row->Insert,
                                'Update'            =>$row->Update,
                                'Delete'            =>$row->Delete,
                                'Paypal'            =>$row->Paypal
                            ),
                    );
                    $jsonData['rows'][] = $entry;
            }
            echo json_encode($jsonData);
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */