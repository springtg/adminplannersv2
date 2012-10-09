<?php

class product_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function updateHistoryStatus($id,$status){
        
        //$Emails = array('Frank', 'Todd', 'James');
        $this->db->where('id', $id);
        $this->db->set('update', 'NOW()', FALSE);
        $this->db->set('status', $status);
        $this->db->update('qsnk_quayso');
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function get($game,$skey,$id){
        $where=array("game"=>$game,"skey"=>$skey,"id"=>$id);
        $this->db->where($where);
        $query=$this->db->get("qsnk_product");
        return $query->result();
    }
    function gettotal_rows($game,$skey){
        $strQuery="
            SELECT SQL_CALC_FOUND_ROWS `qsnk_product`.* FROM `qsnk_product`
            WHERE `game`='$game' AND `skey`='$skey' 
            ";
        $this->__new($strQuery);
        return $this->jqxBinding();
    }
    function gettotal_rows_history($game,$skey,$productid=""){
//        $strQuery="
//            SELECT SQL_CALC_FOUND_ROWS `qsnk_quayso`.*,`qsnk_product`.`name` as productname 
//            FROM `qsnk_quayso`,`qsnk_product`
//            WHERE `game`='$game' AND `skey`='$skey' 
//                AND `qsnk_quayso`.`product`=`qsnk_product`.`id`
//            ";
//        $this->__new($strQuery,"",array("productname"=>"`qsnk_product`.`name`"));
//        
        
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `qsnk_quayso`.*,`qsnk_product`.`name` as productname 
            FROM `qsnk_quayso`,`qsnk_product`
            ";
        $configs["strWhere"]="
            WHERE `qsnk_product`.`game`='$game' AND `qsnk_product`.`skey`='$skey' 
                AND `qsnk_quayso`.`product`=`qsnk_product`.`id`
            ";
        if($productid!=""){
            $configs["strWhere"].="
                AND '$productid'=`qsnk_product`.`id`
                ";
        }
        
        
        $configs["strOrderBy"]=" ORDER BY `qsnk_quayso`.`insert` DESC";
        $configs["fields"]=array(
            "productname"=>"`qsnk_product`.`name`",
            "insert"=>"`qsnk_quayso`.`insert`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    function gettotal_rows_log_product($game,$skey,$productid=""){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `qsnk_log_product`.*,`qsnk_product`.`name` as productname 
            FROM `qsnk_log_product`,`qsnk_product`
            ";
        $configs["strWhere"]="
            WHERE `game`='$game' AND `skey`='$skey' 
                AND `qsnk_log_product`.`product`=`qsnk_product`.`id`
            ";
        if($productid!=""){
            $configs["strWhere"].="
                AND '$productid'=`qsnk_product`.`id`
                ";
        }
        $configs["strOrderBy"]=" ORDER BY `qsnk_log_product`.`insert` DESC";
        $configs["fields"]=array(
            "productname"=>"`qsnk_product`.`name`",
            "insert"=>"`qsnk_log_product`.`insert`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    function gettotal_rows_history_account($username){
        $strQuery="
            SELECT SQL_CALC_FOUND_ROWS `qsnk_quayso`.*,`qsnk_product`.`name` as productname FROM `qsnk_quayso`,`qsnk_product`
            WHERE `game`='NGAOKIEM' AND `skey`='NGAOKIEM001' 
                AND `qsnk_quayso`.`product`=`qsnk_product`.`id`
                AND `qsnk_quayso`.`username`='$username'
            ORDER BY `qsnk_quayso`.`insert` DESC
            ";
        $this->__new($strQuery,"",array("productname"=>"`qsnk_product`.`name`"));
        return $this->jqxBinding();
    }
    
}
?>
