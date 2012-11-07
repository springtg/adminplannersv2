<?php

class product_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("ProductID"=>$ID);
        $query=$this->db->get_where('dtb_product', $where); 
        return $query->result();
    }
    function gets(){
        $query=$this->db->get_where('dtb_product'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->set('Update', "NOW()",false);
        $this->db->where('ProductID', $ID);
        $this->db->update('dtb_product', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', "NOW()",false);
        $this->db->where('ProductID', $ID);
        $this->db->update('dtb_product'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function restore($ID){
        $this->db->set('Delete', "NULL",false);
        $this->db->where('ProductID', $ID);
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
        if(isset($_SESSION["JQX-DEL-PRO"]) && $_SESSION["JQX-DEL-PRO"]==0){
            $configs["strWhere"].=" AND `dtb_product`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-PRO"]) && $_SESSION["JQX-DEL-PRO"]==-1){
            $configs["strWhere"].=" AND `dtb_product`.`Delete` IS NOT NULL";
        }
        $configs["fields"]=array(
            "ID"=>"ProductID",
            );
        $configs["filterfields"]=array(
            "ProductName"=>"ProductName",
            "Supplier"=>"Supplier",
            "ProductTitle"=>"ProductTitle"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
