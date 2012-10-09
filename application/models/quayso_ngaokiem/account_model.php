<?php

class account_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($id)
    {
        $query = $this->db->query("
            SELECT *
            FROM `account`
            WHERE `account`.`delete` is null 
                AND `account`.`id`='$id'
        ");
        return $query->result();
    }
    function login($username,$password)
    {
        $query = $this->db->query("
            SELECT `account`.*,`group`.`authority` as `groupauthority`
            FROM `account` LEFT JOIN `group` ON (`account`.`group`=`group`.`name`)
            WHERE `account`.`delete` is null 
                AND `account`.`username`='$username'
                AND `account`.`password`='$password'
        ");
        return $query->result();
    }
    function getAuthoritys($list){
         $query = $this->db->query("
            SELECT * 
            FROM `authority` 
            WHERE `delete` is null 
                AND '$list' LIKE CONCAT( '%;',`authority`.`name`,';%' )
        ");
        return $query->result();
    }
    function getgroup_au($name)
    {
        $query = $this->db->query("
            SELECT `authority`.*
            FROM `authority`,`group`
            WHERE `authority`.`delete` is null 
                AND `group`.`delete` is null 
                AND `group`.`authority` LIKE CONCAT( '%;',`authority`.`name`,';%' )
                AND `group`.`name`='$name'
        ");
        return $query->result();
    }
    function getgroups()
    {
        $query = $this->db->query("
            SELECT * 
            FROM `group` 
            WHERE `delete` is null 
        ");
        return $query->result();
    }
    function _insert($params){
        $this->db->set('insert', 'NOW()', FALSE);
        $this->db->insert('account', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _update($id,$params){
        $this->db->where('id', $id);
        $this->db->set('update', 'NOW()', FALSE);
        $this->db->update('account', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _delete($id){
        $query = "
            UPDATE `account` 
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
            UPDATE `account` 
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
            SELECT SQL_CALC_FOUND_ROWS * FROM `account`
            WHERE true
            ";
        $this->__new($strQuery);
        return $this->jqxBinding();
    }
    
    
}
?>
