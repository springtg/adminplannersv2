<?php 
session_start();
class gallery extends CI_Controller  {

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
            $this->load->library('smarty3','','smarty');
            $this->load->model('admin-planners/gallery_model','my_model');
            $this->load->model('admin-planners/setting_model','setting_model');
            include APPPATH . 'libraries/defu.php';
            if(!isset($_SESSION["JQX-DEL-GAL"]))$_SESSION["JQX-DEL-GAL"]=0;
            $this->InitSetting();
        }
        
        function InitSetting(){
            $colModel=array(
                array(  "display"       =>"ID"                  ,"name"=>"ID"               ,"width"=>60        ,"sortable"=>true       ,"align"=>"center"      ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Album Name"          ,"name"=>"AlbumName"        ,"width"=>180       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>true ),
                array(  "display"       =>"Amount"              ,"name"=>"Amount"           ,"width"=> 60       ,"sortable"=>true       ,"align"=>"right"       ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Status"              ,"name"=>"Status"           ,"width"=> 100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Insert"              ,"name"=>"Insert"           ,"width"=> 100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>false      ,"filter"=>false),
                array(  "display"       =>"Update"              ,"name"=>"Update"           ,"width"=> 100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false),
                array(  "display"       =>"Delete"              ,"name"=>"Delete"           ,"width"=> 100       ,"sortable"=>true       ,"align"=>"left"        ,"hide"=>true       ,"filter"=>false)
            );
            if(isset($_SESSION["ADP-USER"])){
                if(!isset($_SESSION["admin-gallery-setting"])){
                    $data=$this->setting_model->getByKey("admin-gallery-settings");
                    if(isset($data[0])){
                        $_SESSION["admin-gallery-setting"]   =  objectToArray(@json_decode($data[0]->Value));

                    }
                }
                if(isset($_SESSION["admin-gallery-setting"]["colModel"])){
                    $setting= $_SESSION["admin-gallery-setting"]["colModel"];
                    for($i=0;$i<count($colModel);$i++){
                        if(isset($setting[$colModel[$i]["name"]])){
                            $colModel[$i]["hide"]=(bool)$setting[$colModel[$i]["name"]];
                        }
                    }
                }
                
            }
            $this->_configs["colModel"]=$colModel;
        }
        public function index()
	{
            
            $Data["tab_config"]["tabs"]=array(
                "gallery"   =>array(
                    "display"=>"Gallery"
                    ,"link"=>  base_url("admin-planners/gallery")
                    ),
                "edit"   =>array(
                    "display"=>"Edit"
                    ,"link"=>  "javascript:FlexiGrid.ShowDetail();"
                    )
            );
            $Data["tab_config"]["tabindex"]="gallery";
            $Data["flexigrid_settings"]["colModel"]=$this->_configs["colModel"];
            foreach ($Data["flexigrid_settings"]["colModel"] as $col){
                $Data["admin-gallery-settings"]["colModel"][$col["name"]]=$col["hide"];
            }
            $Data["admin-gallery-settings"]["display"]=1;
            $Params=array(
                "Key"=>"admin-gallery-settings",
                "Name"=>"admin-gallery-settings",
                "Type"=>"settings",
                "Value"=>json_encode($Data["admin-gallery-settings"])
            );
            //$exists = $this->db->select("ID")->where("ID", 10)->get()->row_array();
            $this->setting_model->insert_onduplicate_update("admin-gallery-settings",$Params);
            //$this->setting_model->insert($Params);
            $Data["flexigrid_settings"]["filterModel"]=filterModel($Data["flexigrid_settings"]["colModel"]);
            
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty->view('admin-planners/gallery/01_flexigrid',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
	}
        public function ChangeColumnDisplay(){
            
            $_SESSION["admin-gallery-setting"]["colModel"][$_POST["col"]]=$_POST["hide"]==1?true:false;
            $Params=array(
                "Key"=>"admin-gallery-settings",
                "Name"=>"admin-gallery-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-gallery-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-gallery-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        public function ChangeDeleteDisplay(){
            ChangeDisplay("JQX-DEL-GAL", $_POST["showDelete"]);
            $_SESSION["user-gallery-setting"]["display"]=$_POST["showDelete"];
            $Params=array(
                "Key"=>"admin-gallery-settings",
                "Name"=>"admin-gallery-settings",
                "Type"=>"settings",
                "Value"=>json_encode($_SESSION["admin-gallery-setting"])
            );
            $this->setting_model->insert_onduplicate_update("admin-gallery-settings",$Params);
            $code=1;
            $msg="Data display have been change.";
            echo json_encode(array("code"=>$code,"msg"=>$msg));
        }
        function Edit(){
            $Data=null;
            if(isset($_POST["ID"])){
                $obj=$this->my_model->get($_POST["ID"]);
                if(count($obj)>0)$Data["OBJ"]=$obj[0];
            }
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            $this->smarty->display("admin-planners/gallery/02_gallery_detail");
        }
        function Slider(){
            $Data=null;
            $Data["tab_config"]["tabs"]=array(
                "slider"   =>array(
                    "display"=>"Slider"
                    ,"link"=>  base_url("admin-planners/gallery/slider")
                    )
            );
            $Data["tab_config"]["tabindex"]="slider";
            $obj=$this->my_model->get(1);
            if(count($obj)>0)$Data["OBJ"]=$obj[0];
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('Data', $Data);
            if(isset($_SESSION["ADP-USER"])){
                $this->smarty->view('admin-planners/gallery/03_slider',"JQXGRID");
                $this->smarty->display("admin-planners/00_template");
            }else{
                $this->smarty->display("admin-planners/01_login");
            }
        }
        function Save(){
            $vlows=array("\\\"","\\'");
            $vals=array("\"","'");
            
            $msgs=array();
            if( (!isset($_POST["AlbumName"])) || $_POST["AlbumName"]==""){
                $msgs[]="AlbumName Name does not empty.";
            }
            if( (!isset($_POST["Album"]) || count($_POST["Album"])==0)){
                $msgs[]="Album does not empty.";
            }
            if(count($msgs)>0){
                $code=-44;
                $msg="";
                foreach ($msgs as $m){
                    $msg.="$m<br/>";
                }
            }else{
                
                $Params=array(
                    "AlbumName"         =>$_POST["AlbumName"],
                    "Amount"        =>  count($_POST["Album"]),
                    "Images"        => json_encode($_POST["Album"]),
                    "Alias"         =>  convertUrl($_POST["AlbumName"]),
                );
                $ip = getIP();
                if(isset($_POST["ID"]) && $_POST["ID"]!=""){
                    $ID=$_POST["ID"];
                    //$Params["Log"] = "    IP : $ip \n    Action : Update \n    RowID : $ID";
                    if($this->my_model->update($ID,$Params)){
                        //$this->log_model->insert(array("Table" => "Video","RowID"=>$Params["VideoID"], "Action" => "Update", "Log" => $VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Item have been updated.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant update this Item.";
                    }
                }else{
                    //$Params["Log"]="    IP : $ip \n    Action : Insert ";
                    if($this->my_model->insert($Params)){
                        //$this->log_model->insert(array("Table"=>"Video","Action"=>"Insert","Log"=>$VideoParams["Log"]));
                        $code=1;
                        $msg="Success. Item have been added to database.";
                    }else{
                        $code=-1;
                        $msg="Fail. Cant insert Item to database.";
                    }
                }
            }
            echo json_encode(array("code"=>$code,"msg"=>$msg));
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
        function FlexiGridData(){
            
            $data=$this->my_model->FlexiGridData();
            header("Content-type: application/json");
            $jsonData = array('page'=>$data["page"],'total'=>$data["total_rows"],'rows'=>array());
            foreach($data["rows"] AS $row){
                    //If cell's elements have named keys, they must match column names
                    //Only cell's with named keys and matching columns are order independent.
                    $entry = array('id'=>$row->ID,
                            'cell'=>array(
                                'ID'                =>$row->ID,
                                'AlbumName'         =>  htmlentities_UTF8($row->AlbumName),
                                'Amount'            =>$row->Amount,
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