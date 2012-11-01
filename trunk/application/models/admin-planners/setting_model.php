<?php

class setting_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('adp_settings', $where); 
        return $query->result();
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `adp_settings`.*
            FROM `adp_settings`
            ";
        $configs["strWhere"]="
            WHERE Type<>'system'
            ";
        $configs["fields"]=array(
            
            );
        $configs["filterfields"]=array(
            "Value"=>"Value",
            "Name"=>"Name",
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
