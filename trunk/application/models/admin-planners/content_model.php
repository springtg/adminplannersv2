<?php

class content_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('tbl_content', $where); 
        return $query->result();
    }
    
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_content', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_content'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_content'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$params){
        $this->db->set('Update', 'NOW()', FALSE);
        $this->db->where('ID', $ID);
        $this->db->update('tbl_content', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_content`.*
            FROM `tbl_content`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-CONTENT"]) && $_SESSION["JQX-DEL-CONTENT"]==0){
            $configs["strWhere"].=" AND `tbl_content`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-CONTENT"]) && $_SESSION["JQX-DEL-CONTENT"]==-1){
            $configs["strWhere"].=" AND `tbl_content`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_content`.`Insert` DESC";
        $configs["fields"]=array(
            "Content"=>"`ID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
