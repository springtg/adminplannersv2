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
            FROM `adp_account`
            WHERE `adp_account`.`delete` is null 
                AND `adp_account`.`id`='$id'
        ");
        return $query->result();
    }
    function login($username,$password)
    {
        $query=$this->db
        ->select("adp_account.*,adp_group.Name as GroupName,adp_group.Authority as GroupAuthority")
        ->from("adp_account")
        ->join('adp_group', 'adp_account.Group = adp_group.ID', 'left')
        ->where(array(
            "adp_account.UserName"=>$username,
            "adp_account.Password"=>$password
            ))
        ->get();
        return $query->result();
    }
    function getAuthoritys($list){
        
        $query=$this->db
        ->from("adp_authority")
        ->where(array(
            "Delete"=>null
            ))
        ->where_in("Keyword",$list)
        ->get();
        return $query->result();
    }
    function getgroup_au($name)
    {
        $query = $this->db->query("
            SELECT `adp_authority`.*
            FROM `adp_authority`,`adp_group`
            WHERE `adp_authority`.`delete` is null 
                AND `adp_group`.`delete` is null 
                AND `adp_group`.`authority` LIKE CONCAT( '%;',`adp_authority`.`name`,';%' )
                AND `adp_group`.`name`='$name'
        ");
        return $query->result();
    }
    function getgroups()
    {
        $query = $this->db->query("
            SELECT * 
            FROM `adp_group` 
            WHERE `delete` is null 
        ");
        return $query->result();
    }
    function _insert($params){
        $this->db->set('insert', 'NOW()', FALSE);
        $this->db->insert('adp_account', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _update($id,$params){
        $this->db->where('id', $id);
        $this->db->set('update', 'NOW()', FALSE);
        $this->db->update('adp_account', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function _delete($id){
        $query = "
            UPDATE `adp_account` 
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
            UPDATE `adp_account` 
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
            UPDATE `adp_authority` 
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
            SELECT SQL_CALC_FOUND_ROWS * FROM `adp_account`
            WHERE true
            ";
        $this->__new($strQuery);
        return $this->jqxBinding();
    }
    
    
}
?>
