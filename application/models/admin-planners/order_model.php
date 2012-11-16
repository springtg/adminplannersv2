<?php

class order_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("OrderID"=>$ID);
        $query=$this->db->get_where('dtb_orders', $where); 
        return $query->result();
    }
    function gets(){
        $query=$this->db->get_where('dtb_orders'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->set('Update', "NOW()",false)
            ->where('OrderID', $ID)
            ->update('dtb_orders', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function insert($Params){
        $this->db->set('Insert', "NOW()",false)
            ->insert('dtb_orders', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', "NOW()",false);
        $this->db->where('OrderID', $ID);
        $this->db->update('dtb_orders'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function restore($ID){
        $this->db->set('Delete', "NULL",false);
        $this->db->where('OrderID', $ID);
        $this->db->update('dtb_orders'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `dtb_orders`.*,`dtb_customer`.CustomerName
            FROM `dtb_orders`
                LEFT JOIN `dtb_customer` ON ( 
                    `dtb_orders`.`CustomerID`=`dtb_customer`.`CustomerID` 
                    )
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-ORDER"]) && $_SESSION["JQX-DEL-ORDER"]==0){
            $configs["strWhere"].=" AND `dtb_orders`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-ORDER"]) && $_SESSION["JQX-DEL-ORDER"]==-1){
            $configs["strWhere"].=" AND `dtb_orders`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `OrderDate` DESC";
        $configs["fields"]=array(
            "ID"=>"OrderID",
            "CustomerName"=>"`dtb_customer`.`CustomerName`",
            "OrderID"=>"`dtb_orders`.OrderID",
            "Insert"=>"`dtb_orders`.Insert",
            "Update"=>"`dtb_orders`.Update",
            "Delete"=>"`dtb_orders`.Delete",
            "Status"=>"`dtb_orders`.`Status`",
            "CustomerID"=>"`dtb_orders`.CustomerID"
            );
        $configs["filterfields"]=array(
            "CustomerName"=>"`dtb_customer`.CustomerName",
            "OrderID"=>"OrderID",
            "CustomerID"=>"`dtb_orders`.CustomerID"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
