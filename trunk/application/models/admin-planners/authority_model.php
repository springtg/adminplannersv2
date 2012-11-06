<?php

class authority_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('adp_authority', $where); 
        return $query->result();
    }
    function gets(){
        $query=$this->db->get_where('adp_authority'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->set('Update', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('adp_authority', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('adp_authority'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `adp_authority`.*
            FROM `adp_authority`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        $configs["fields"]=array(
            
            );
        $configs["filterfields"]=array(
            "Name"=>"Value",
            "Keyword"=>"Name",
            "Note"=>"Note"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
