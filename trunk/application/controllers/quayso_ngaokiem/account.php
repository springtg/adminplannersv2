<?php
session_start();
class account extends CI_Controller  {

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
            $this->_configs["title"]="Account Management";
            $this->_configs["authority"]="account";
            $this->_configs["MinAuthority"]=1;
            $this->load->model('quayso_ngaokiem/account_model','account_model');
        }
        public function index()
	{
            $this->smarty->assign('_SESSION', $_SESSION);
            $this->smarty->assign('configs', $this->_configs);
//            if($this->checkauthority()>=0){
                $this->smarty->view('quayso_ngaokiem/adbi/account/01_account','contentofview');
//            }else{
//                $this->smarty->assign('contentofview', "Please check your authority.");
//            }
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
        function Group_Authority($name){
            $auth_list=$this->account_model->getgroup_au($name);
            $configs["auth_list"]=$auth_list;
            $this->smarty->assign('configs', $configs);
            $this->smarty->display('quayso_ngaokiem/adbi/account/03_group_auth');
        }
        function edit_account($id=null){
            if($id!=null){
                $accountobj=$this->account_model->get($id);
                $accountobj=objectToArray($accountobj[0]);
                
                $configs["title"]="Edit$id";
                
            }else{
                $configs["title"]="New";
                $accountobj=null;
            }
            $this->load->model('quayso_ngaokiem/authority_model','authority_model');
            $configs["accountobj"]=$accountobj;
            $auth_list=$this->authority_model->gets();
            $group_list=$this->account_model->getgroups();
            $grp_arr[]="None";
            $group_index=0;
            $index=0;
            foreach ($group_list as $gr){
                $index++;
                $grp_arr[]=$gr->name;
                if($accountobj!=null){
                    if($gr->name==$accountobj["group"]){
                        $group_index=$index;
                    }
                }
            }
            $configs["checkauthority"]=$this->checkauthority();
            $configs["auth_list"]=$auth_list;
            $configs["group_list"]=($grp_arr);
            $configs["group_index"]=($group_index);
            $this->smarty->assign('configs', $configs);
            $this->smarty->display('quayso_ngaokiem/adbi/account/02_account_edit');
        }
        function jqgrid_data(){
            $accounts=array();
            $result['total_rows']=0;
            if($this->checkauthority()>=0){
                $result=$this->account_model->gettotal_rows();
                $rows=$result['rows'];
                foreach ($rows as $row) {
                    $au_value="";
                    $au_arr=  explode(";", $row->authority);
                    foreach ($au_arr as $au){
                        if($au!=null && $au!="")
                        $au_value.="<span class=\"autho\">$au</span>";
                    }

                    $accounts[] = array(
                            //'_id'       => $row->id,
                            '_name_'     => $row->name,
                            '_username_' => $row->username,
                            '_authority_'=> $au_value,
                            '_group_'    => $row->group,
                            '_insert_'   => $row->insert,
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
                'Rows' => $accounts
            );
            echo json_encode($data);
        }
        
        function login(){
            $params=  isset($_REQUEST["params"])?json_decode($_REQUEST["params"],true):"{}";
            $account=$this->account_model->login($params["username"],$params["password"]);
            if(count($account)>0){
                $_SESSION["USER"]=objectToArray($account[0]);
                $authority=$_SESSION["USER"]["authority"].$_SESSION["USER"]["groupauthority"];
                $authority_ls=$this->account_model->getAuthoritys($authority);
                $_SESSION["AUTHORITY"]=objectToArray($authority_ls);
                //JO_location();
                $result=array(
                "code"      =>  0,
                "msg"       => "Login successful."
                );
            }else{
                $result=array(
                "code"      =>  -1,
                "msg"       => "Error. Login fail."
                );
            }
            echo json_encode($result);
        }
        function logout(){
            unset($_SESSION["USER"]);
            unset($_SESSION["AUTHORITY"]);
            unset($_SESSION["MYAUTHORITY"]);
            //JO_location();
            //redirect(base_url()."admin-planners/");
            $result=array(
            "code"      =>  0,
            "msg"       => "Logout successful."
            );
            echo json_encode($result);
        }
        function delete_(){
            if($this->checkauthority()==1){
                $id=$_REQUEST["id"];
                $rok=$this->account_model->_delete($id);
                if($rok){
                    $result=array(
                    "code"      =>  1,
                    "msg"       => "Delete successful."
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
                $rok=$this->account_model->_restore($id);
                if($rok){
                    $result=array(
                    "code"      =>  1,
                    "msg"       => "successful."
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
        function accounteditor(){
            if($this->checkauthority()==1){
                $params=  isset($_REQUEST["params"])?json_decode($_REQUEST["params"],true):"{}";
                $id=isset($_REQUEST["id"])?$_REQUEST["id"]:"";
                $rok=false;
                if($id!=""){
                    $rok=$this->account_model->_update($id,$params);
                }else{
                    $rok=$this->account_model->_insert($params);
                }
                if($rok){
                    $result=array(
                    "code"      =>  1,
                    "msg"       => "successful."
                    );
                }else{
                    $result=array(
                    "code"      =>  -1,
                    "msg"       => "Error. Can't ".($id!=""?" update.":"insert.")
                    );
                }
            }else{
                $result=array(
                "code"      =>  -1,
                "msg"       => "Please check your authority."
                );
            }
            echo json_encode($result);
        }
        
       
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */