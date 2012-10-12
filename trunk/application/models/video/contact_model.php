<?php

class contact_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_contact', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    
    
}
?>
