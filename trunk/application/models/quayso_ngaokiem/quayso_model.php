<?php

class quayso_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function gets($game,$skey){
        $query = $this->db->query("
            SELECT * 
            FROM `qsnk_product` 
            WHERE `delete` is null 
                AND `game`='$game'
                AND `skey`='$skey'
                
        ");
        return $query->result();
    }
    function getuser($username){
        $query = $this->db->query("
            SELECT * 
            FROM `qsnk_user` 
            WHERE `delete` is null 
                AND `username`='$username'
        ");
        return $query->result();
    }
    function getproducts($game,$skey){
        $query = $this->db->query("
            SELECT * 
            FROM `qsnk_product` 
            WHERE `delete` is null 
                AND `game`='$game'
                AND `skey`='$skey'
                AND (
                        (`amount`>0 AND `amount`>`active`) 
                        OR
                        `amount` is null
                    )
            ORDER BY `pecent` ASC
        ");
        return $query->result();
    }
    function insert($params){
        $query="
            INSERT INTO `qsnk_user`
                (   
                    `customerid`,
                    `username`,
                    `email`,
                    `insert`,
                    `note`,
                    `totalamount`
                )
            VALUE
                (
                    '".$params["customerid"]."',
                    '".$params["username"]."',
                    '".$params["email"]."',
                    NOW(),
                    '".$params["note"]."',
                    '".$params["totalamount"]."'
                    
                )
            ON DUPLICATE KEY UPDATE
                `note`='".$params["note"]."',
                `totalamount`='".$params["totalamount"]."',
                `update`=NOW()
        ";
        $query = $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count>0) return true;
        return false;
    }
    function insertProduct($params){
        $query="
            INSERT INTO `qsnk_product`
                (   
                    `name`,
                    `amount`,
                    `pecent`,
                    `game`,
                    `skey`,
                    `key`,
                    `insert`,
                    `log`
                )
            VALUE
                (
                    '".$params["name"]."',
                    ".$params["amount"].",
                    ".$params["pecent"].",
                    '".$params["game"]."',
                    '".$params["skey"]."',
                    '".$params["key"]."',
                    NOW(),
                    '".$params["log"]."'
                    
                )
            ON DUPLICATE KEY UPDATE
                `amount`=".$params["amount"].",
                `log`='".$params["log"]."'
                
        ";
        $query = $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count>0) return true;
        return false;
    }
    function updateProduct($id){
        $query="
            UPDATE `qsnk_product`
            SET
                `active`=`active`+1
            WHERE `id`='$id'
                    
                
        ";
        $query = $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count>0) return true;
        return false;
    }
    function updateUser($username){
        $query="
            UPDATE `qsnk_user`
            SET
                `activeamount`=`activeamount`+1
            WHERE `username`='$username'
                    
                
        ";
        $query = $this->db->query($query);
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count>0) return true;
        return false;
    }
    function insertQuayso($params){
        $this->db->set('insert', 'NOW()', FALSE);
        $this->db->insert('qsnk_quayso', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function gettotal_rows(){
        $strQuery="
            SELECT SQL_CALC_FOUND_ROWS `qsnk_product`.* FROM `qsnk_product`
            WHERE true
            ";
        $this->__new($strQuery);
        return $this->jqxBinding();
    }
}
?>
