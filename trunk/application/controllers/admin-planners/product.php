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
        function category(){
            $Data["tab_config"]["tabs"]=array(
                "product"   =>array(
                    "display"=>"Product"
                    ,"link"=>  base_url("admin-planners/product")
                    ),
                "category"   =>array(
                    "display"=>"Category"
                    ,"link"=>  base_url("admin-planners/product/category")
                    ),
                "edit"   =>array(
                    "display"=>"Edit"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="category";
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty
                    ->assign('_SESSION', $_SESSION)
                    ->assign('Data', $Data)
                    ->view('admin-planners/product/03_category',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
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
                if(!isset($_SESSION["productcategory"])){
                    $data=$this->setting_model->getByKey("productcategory");
                    if(isset($data[0])){
                        $_SESSION["productcategory"]   =  objectToArray(@json_decode($data[0]->Value));
                    }
                }
                if(!isset($_SESSION["admin-product-setting"])){
                    $data=$this->setting_model->getByKey("admin-product-settings");
                    if(isset($data[0])){
                        $_SESSION["admin-product-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }
                }
                $setting= $_SESSION["admin-product-setting"]["colModel"];
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
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty->view('admin-planners/product/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
	}
        function addcategory(){
            $Name=$_POST["Name"];
            $Des=$_POST["Des"];
            $dt=$_SESSION["productcategory"];
            $dt[convertUrl($Name)]=array("Name"=>$Name,"Des"=>$Des);
            $code=1;
            $Params=array(
                "Key"=>"productcategory",
                "Name"=>"Category of Product",
                "Type"=>"settings",
                "Value"=>json_encode($dt)
            );
            if($this->setting_model->insert_onduplicate_update("productcategory",$Params)){
                $_SESSION["productcategory"]=$dt;
            }  
            $msg="Categorys have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function delcategory(){
            $Name=$_POST["Name"];
            $dt=$_SESSION["productcategory"];
            unset($dt[convertUrl($Name)]);
            $code=1;
            $Params=array(
                "Key"=>"productcategory",
                "Name"=>"Category of Product",
                "Type"=>"settings",
                "Value"=>json_encode($dt)
            );
            if($this->setting_model->insert_onduplicate_update("productcategory",$Params)){
                $_SESSION["productcategory"]=$dt;
            }
            $msg="Categorys have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeColumnDisplay(){
            
            $_SESSION["user-product-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-product-settings",
                "Name"=>"admin-product-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-product-setting"])
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
                "Value"=>json_encode($_SESSION["admin-product-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-product-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $pr=$this->product_model->get($_POST["ID"]);
                if(count($pr)>0)$Data["OBJ"]=$pr[0];
            }
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("admin-planners/product/02_edit");
        }
        function Save(){
            $vlows=array("\\\"","\\'");
            $vals=array("\"","'");
            
            $msgs=array();
            if( (!isset($_POST["ProductName"])) || $_POST["ProductName"]==""){
                $msgs[]="Product Name does not empty.";
            }
            if( (!isset($_POST["ProductTitle"])) || $_POST["ProductTitle"]==""){
                $msgs[]="Product Title does not empty.";
            }
            if( (!isset($_POST["Image"])) || $_POST["Image"]==""){
                $msgs[]="Product Image does not empty.";
            }
            if( (!isset($_POST["Category"])) || $_POST["Category"]==""){
                $msgs[]="Category Image does not empty.";
            }
            if( (!isset($_POST["QuantityPerUnit"])) || $_POST["QuantityPerUnit"]==""){
                $msgs[]="QuantityPerUnit Image does not empty.";
            }
            if( (!isset($_POST["Amount"])) || $_POST["Amount"]=="" || !is_numeric($_POST["Amount"])){
                $msgs[]="Amount does not empty and Amount must be numeric.";
            }
            if( (!isset($_POST["UnitPrice"])) || $_POST["UnitPrice"]=="" || !is_numeric($_POST["UnitPrice"])){
                $msgs[]="UnitPrice does not empty and UnitPrice must be numeric.";
            }
            if( (!isset($_POST["UnitOnOrder"])) || $_POST["UnitOnOrder"]=="" || !is_numeric($_POST["UnitOnOrder"])){
                $msgs[]="UnitOnOrder does not empty and UnitOnOrder must be numeric.";
            }
            if( (!isset($_POST["StartDate"])) || $_POST["StartDate"]==""){
                $msgs[]="StartDate does not empty.";
            }
            if( (!isset($_POST["EndDate"])) || $_POST["EndDate"]==""){
                $msgs[]="EndDate does not empty.";
            }
            if( (!isset($_POST["Content"])) || $_POST["Content"]==""){
                $msgs[]="Content does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                
                $Params=array(
                    "ProductName"   =>$_POST["ProductName"],
                    "ProductTitle"  =>$_POST["ProductTitle"],
                    "Image"         =>$_POST["Image"],
                    "Categorys"      =>$_POST["Category"],
                    "Supplier"      =>$_POST["Supplier"],
                    "QuantityPerUnit"=>$_POST["QuantityPerUnit"],
                    "Amount"        =>$_POST["Amount"],
                    "UnitPrice"     =>$_POST["UnitPrice"],
                    "UnitsOnOrder"  =>$_POST["UnitOnOrder"],
                    "StartDate"     =>$_POST["StartDate"],
                    "EndDate"       =>$_POST["EndDate"],
                    "Tag"           =>$_POST["Tag"],
                    "Feature"       =>$_POST["Feature"],
                    "Content"       => str_replace($vlows, $vals,$_REQUEST["Content"]),
                    "Album"         => json_encode($_POST["Album"]),
                    "Alias"         =>  convertUrl($_POST["ProductName"]),
                );
                $ip = getIP();
                if(isset($_POST["ID"]) && $_POST["ID"]!=""){
                    $ID=$_POST["ID"];
                    //$Params["Log"] = "    IP : $ip \n    Action : Update \n    RowID : $ID";
                    if($this->product_model->update($ID,$Params)){
                        //$this->log_model->insert(array("Table" => "Video","RowID"=>$Params["VideoID"], "Action" => "Update", "Log" => $VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Product have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update Product.";
                    }
                }else{
                    //$Params["Log"]="    IP : $ip \n    Action : Insert ";
                    if($this->product_model->insert($Params)){
                        //$this->log_model->insert(array("Table"=>"Video","Action"=>"Insert","Log"=>$VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Video have been added to database.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant insert video to database.";
                    }
                }
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
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
        function GenAlbumVal(){
            include APPPATH.'libraries/HTML_DOM/simple_html_dom.php';
            
            $str="<div>".html_entity_decode($_POST["str"])."</div>";
            
            $html = str_get_html($str);
            // Find all images 
            $albums=array();
            $inputs=$html->find("input[type=text]");
            if(is_array($inputs))
            foreach($inputs as $element){ 
                $albums[]=$element->value;
            }
            echo json_encode($albums);
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