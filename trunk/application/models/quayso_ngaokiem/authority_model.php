<?php

class authority_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function gets()
    {
        $query = $this->db->query("
            SELECT * 
            FROM `authority` 
            WHERE `delete` is null 
        ");
        return $query->result();
    }
    function get($id)
    {
        $query = $this->db->query("
            SELECT * 
            FROM `authority` 
            WHERE `delete` is null 
                AND `id`='$id'
        ");
        return $query->result();
    }
    function _insert($params){
        $this->db->set('insert', 'NOW()', FALSE);
        $this->db->insert('authority', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _update($id,$params){
        $this->db->where('id', $id);
        $this->db->set('update', 'NOW()', FALSE);
        $this->db->update('authority', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _delete($id){
        $query = "
            UPDATE `authority` 
            SET `delete` = now()
            WHERE `id`='$id'
                AND `lock` is null
        ";
        $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
        
    }
    function _restore($id){
        $query = "
            UPDATE `authority` 
            SET     `delete`    =   null
            WHERE   `id`        =   '$id'
        ";
        $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    
    function _changeStatus($id,$status){
        $query = "
            UPDATE `authority` 
            SET `status`    =   '$status',
                `update`    =   now()
            WHERE `id`='$id'
        ";
        $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function gettotal_rows(){
        $strQuery="
            SELECT SQL_CALC_FOUND_ROWS * FROM `authority`
            WHERE true 
            ";
        $this->__new($strQuery);
        return $this->jqxBinding();
    }
    
}
?>
