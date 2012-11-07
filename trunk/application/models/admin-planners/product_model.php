<?php

class product_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('dtb_product', $where); 
        return $query->result();
    }
    function gets(){
        $query=$this->db->get_where('dtb_product'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->set('Update', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('dtb_product', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('dtb_product'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `dtb_product`.*
            FROM `dtb_product`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        $configs["fields"]=array(
            
            );
        $configs["filterfields"]=array(
            "ProductName"=>"ProductName",
            "ProductTitle"=>"ProductTitle"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
