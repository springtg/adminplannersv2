<?php

class user_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('adp_user', $where); 
        return $query->result();
    }
    
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('adp_user', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('adp_user'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('adp_user'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$params){
        $this->db->set('Update', 'NOW()', FALSE);
        $this->db->where('ID', $ID);
        $this->db->update('adp_user', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `adp_user`.*
            FROM `adp_user`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-USER"]) && $_SESSION["JQX-DEL-USER"]==0){
            $configs["strWhere"].=" AND `adp_user`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-USER"]) && $_SESSION["JQX-DEL-USER"]==-1){
            $configs["strWhere"].=" AND `adp_user`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `adp_user`.`Insert` DESC";
        $configs["fields"]=array(
            "User"=>"`ID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
