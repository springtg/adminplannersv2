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
    function gets(){
        $query=$this->db->get_where('adp_settings'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->where('ID', $ID);
        $this->db->update('adp_settings', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Description', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('adp_settings'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
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
