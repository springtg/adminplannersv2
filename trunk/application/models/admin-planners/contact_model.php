<?php

class contact_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('tbl_contact', $where); 
        return $query->result();
    }
    function delete($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_contact'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_contact'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function deleteRequest($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_request'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retoreRequest($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_request'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_contact`.*
            FROM `tbl_contact`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-CONTACT"]) && $_SESSION["JQX-DEL-CONTACT"]==0){
            $configs["strWhere"].=" AND `tbl_contact`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-CONTACT"]) && $_SESSION["JQX-DEL-CONTACT"]==-1){
            $configs["strWhere"].=" AND `tbl_contact`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_contact`.`Insert` DESC";
        $configs["fields"]=array(
            "Contact"=>"`tbl_contact`.`ID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    function jqxgridRequest(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_request`.*
            FROM `tbl_request`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-REQUESR"]) && $_SESSION["JQX-DEL-REQUESR"]==0){
            $configs["strWhere"].=" AND `tbl_request`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-REQUESR"]) && $_SESSION["JQX-DEL-REQUESR"]==-1){
            $configs["strWhere"].=" AND `tbl_request`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_request`.`Insert` DESC";
        $configs["fields"]=array(
            "Contact"=>"`tbl_contact`.`ID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
