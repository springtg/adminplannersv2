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
            $this->_configs["title"]="Authority Management";
            $this->_configs["authority"]="authority";
            $this->_configs["MinAuthority"]=1;
            $this->load->model('quayso_ngaokiem/authority_model','authority_model');
        }
        public function index()
	{
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('configs', $this->_configs);
            $this->smarty->view('quayso_ngaokiem/adbi/authority/01_authority','contentofview');
            $this->smarty->view('quayso_ngaokiem/adbi/00_1_styles','styles');
            $this->smarty->view('quayso_ngaokiem/adbi/00_2_scripts','scripts');
            $this->smarty->view('quayso_ngaokiem/adbi/00_3_menus','menus');
            $this->smarty->view('quayso_ngaokiem/adbi/10_template','view');
            $this->smarty->display('quayso_ngaokiem/adbi/01_manage');
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
        public function edit($id=null){
            if($id!=null){
                $obj=$this->authority_model->get($id);
                $obj=objectToArray($obj[0]);
                
                $configs["title"]="Edit";
                
            }else{
                $configs["title"]="New";
                $obj=null;
            }
            $configs["obj"]=$obj;
            $this->smarty->assign('configs', $configs);
            $this->smarty->display('quayso_ngaokiem/adbi/authority/02_authority_edit');
        }
        function delete_(){
            if($this->checkauthority()==1){
                $id=$_REQUEST["id"];
                $rok=$this->authority_model->_delete($id);
                if($rok){
                    $result=array(
                    "code"      =>  1,
                    "msg"       => "Sussess."
                    );
                }else{
                    $result=array(
                    "code"      =>  -1,
                    "msg"       => "Error. Can't delete this record."
                    );
                }
            }else{
                $result=array(
                "code"      =>  -1,
                "msg"       => "Cant delete this record.<br/>Please check your authority."
                );
            }
            echo json_encode($result);
            
        }
        function restore_(){
            if($this->checkauthority()==1){
                $id=$_REQUEST["id"];
                $rok=$this->authority_model->_restore($id);
                if($rok){
                    $result=array(
                    "code"      =>  1,
                    "msg"       => "Sussess."
                    );
                }else{
                    $result=array(
                    "code"      =>  -1,
                    "msg"       => "Error. Can't delete this record."
                    );
                }
            }else{
                $result=array(
                "code"      =>  -1,
                "msg"       => "Cant restore this record.<br/>Please check your authority."
                );
            }
            echo json_encode($result);
        }
        function authorityeditor(){
            if($this->checkauthority()==1){
                $params=  isset($_REQUEST["params"])?json_decode($_REQUEST["params"],true):"{}";
                $id=isset($_REQUEST["id"])?$_REQUEST["id"]:"";
                $rok=false;
                if(strpos(strtolower($params["value"]), "admin")===false
                && strpos(strtolower($params["value"]), "view")===false){
                    if($id!=""){
                        $rok=$this->authority_model->_update($id,$params);
                    }else{
                        $rok=$this->authority_model->_insert($params);
                    }
                    if($rok){
                        $msg="Sussess.";
                        $code=1;

                    }else{
                        $msg="Error. Can't ".($id!=""?" update.":"insert.");
                        $code=-1;
                    }
                }else{
                    $msg="Value is required!<br/> Dont use keyword 'admin' and 'view'";
                    $code=-1;
                }

                $result=array(
                "code"      =>  $code,
                "msg"       => $msg
                );
            }else{
                $result=array(
                "code"      =>  -1,
                "msg"       => "Please check your authority."
                );
            }
            echo json_encode($result);
        }
        function jqgrid_data(){
            $authoritys=array();
            $result['total_rows']=0;
            if($this->checkauthority()>=0){
                $result=$this->authority_model->gettotal_rows();
                $rows=$result['rows'];
                // get data and store in a json array
                foreach ($rows as $row) {
                    $authoritys[] = array(
                            //'_id_'       => $row->id,
                            '_name_'     => $row->name,
                            '_value_'    => $row->value,
                            '_note_'     => $row->note,
                            '_insert_'   => $row->insert,
                            '_update_'   => $row->update,
                            '_id_'   => json_encode(array(
                                            "_id_"=>$row->id,
                                            "_delete_"=>$row->delete,
                                            "_lock_"=>$row->lock
                                        ))
                    );
                }
            }
            $data[] = array(
                'TotalRows' => $result['total_rows'],
                'Rows' => $authoritys
            );
            echo json_encode($data);
        }
        
        
        
       
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */