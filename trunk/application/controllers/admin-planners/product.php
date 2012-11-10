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
            $this->load->model('admin-planners/setting_model','setting_model');
            include APPPATH . 'libraries/defu.php';
            if(!isset($_SESSION["JQX-DEL-PRO"]))$_SESSION["JQX-DEL-PRO"]=0;
            $this->InitSetting();
        }
        function InitSetting(){
            $colModel=array(
                array(  "display"       =>"Product ID"          ,"name"=>"ProductID"        ,"width"=>60        ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Product Name"        ,"name"=>"ProductName"      ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Quantity Per Unit"   ,"name"=>"QuantityPerUnit"  ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Unit Price"          ,"name"=>"UnitPrice"        ,"width"=> 60       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Units In Stock"      ,"name"=>"UnitsInStock"     ,"width"=> 80       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Units On Order"      ,"name"=>"UnitsOnOrder"     ,"width"=> 80       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Product Title"       ,"name"=>"ProductTitle"     ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Start Date"          ,"name"=>"StartDate"        ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"End Date"            ,"name"=>"EndDate"          ,"width"=>100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Amount"              ,"name"=>"Amount"           ,"width"=> 40       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Supplier"            ,"name"=>"Supplier"         ,"width"=>120       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Status"              ,"name"=>"Status"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Insert"              ,"name"=>"Insert"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Update"              ,"name"=>"Update"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false),
                array(  "display"       =>"Delete"              ,"name"=>"Delete"           ,"width"=> 80       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false)
            );
            if(isset($_SESSION["ADP-USER"])){
                if(!isset($_SESSION["user-product-setting"])){
                    $data=$this->setting_model->getByKey("admin-product-settings");
                    if(isset($data[0])){
                        $_SESSION["user-product-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }
                }
                $setting= $_SESSION["user-product-setting"]["colModel"];
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
                "product"   =>array(
                    "display"=>"Product"
                    ,"link"=>  base_url("admin-planners/product")
                    ),
                "edit"   =>array(
                    "display"=>"Edit"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="product";
            $Data["flexigrid_settings"]["colModel"]=$this->_configs["colModel"];
            foreach ($Data["flexigrid_settings"]["colModel"] as $col){
                $Data["admin-product-settings"]["colModel"][$col["name"]]=$col["hide"];
            }
            $Data["admin-product-settings"]["display"]=1;
            $Params=array(
                "Key"=>"admin-product-settings",
                "Name"=>"admin-product-settings",
                "Type"=>"settings",
                "Value"=>json_encode($Data["admin-product-settings"])
            );
            //$exists = $this->db->select("ID")->where("ID", 10)->get()->row_array();
            //$this->setting_model->insert_onduplicate_update("admin-product-settings",$Params);
            //$this->setting_model->insert($Params);
            $Data["flexigrid_settings"]["filterModel"]=filterModel($Data["flexigrid_settings"]["colModel"]);
            
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            if(isset($_SESSION["ADP-USER"]) || true){
                $this->smarty->view('admin-planners/product/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
	}
        public function ChangeColumnDisplay(){
            
            $_SESSION["user-product-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-product-settings",
                "Name"=>"admin-product-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["user-product-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-product-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeDeleteDisplay(){
            ChangeDisplay("JQX-DEL-PRO", $_POST["showDelete"]);
            $_SESSION["user-product-setting"]["display"]=$_POST["showDelete"];
            $Params=array(
                "Key"=>"admin-product-settings",
                "Name"=>"admin-product-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["user-product-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-product-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Edit(){
            $Data=null;
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("admin-planners/product/02_edit");
        }
        public function Delete(){
            if(isset($_POST["ID"])){
                $ip=  getIP();
                if($this->product_model->delete($_POST["ID"])){
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
                if($this->product_model->restore($_POST["ID"])){
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
                if($this->product_model->update($_POST["ID"],$Params)){
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
                                'ProductName'       =>  htmlentities_UTF8($row->ProductName),
                                'QuantityPerUnit'   =>  htmlentities_UTF8($row->QuantityPerUnit),
                                'UnitPrice'         =>$row->UnitPrice,
                                'UnitsInStock'      =>$row->UnitsInStock,
                                'UnitsOnOrder'      =>$row->UnitsOnOrder,
                                'ProductTitle'      =>  htmlentities_UTF8($row->ProductTitle),
                                'StartDate'         =>$row->StartDate,
                                'EndDate'           =>$row->EndDate,
                                'Amount'            =>$row->Amount,
                                'Supplier'          =>htmlentities_UTF8($row->Supplier),
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