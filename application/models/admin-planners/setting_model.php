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
    function getByKey($Key=""){
        $where=array("Key"=>$Key);
        $query=$this->db->get_where('adp_settings', $where); 
        return $query->result();
    }
    function gets(){
        
        return  $this->db
                ->where(array(
                    "Lock <>"=>"1"
                ))
                ->order_by("CHAR_LENGTH(`Value`)","ASC")
                ->get('adp_settings')
                ->result();
    }
    function insert($Params){
        $this->db->insert('adp_settings', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$Params){
        $this->db->where('ID', $ID);
        $this->db->update('adp_settings', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function insert_onduplicate_update($Name,$Params){
        $exists = $this->db->select("ID")->where("Name", $Name)->get("adp_settings")->row_array();
        if($exists){
            $this->db->where("Name", $Name);
            $this->db->update('adp_settings', $Params);
        }else{
            $this->db->insert('adp_settings', $Params); 
        }
        //$this->db->where('ID', $ID);
        //$this->db->update('adp_settings', $Params); 
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
