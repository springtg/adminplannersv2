<?php

class slider_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('tbl_slider', $where); 
        return $query->result();
    }
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_slider', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$params){
        $this->db->set('Update', 'NOW()', FALSE);
        $this->db->where('ID', $ID);
        $this->db->update('tbl_slider', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_slider`.*
            FROM `tbl_slider`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        $configs["strOrderBy"]=" ORDER BY `tbl_slider`.`Insert` DESC";
        $configs["fields"]=array(
            "Slider"=>"`tbl_slider`.`ID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
