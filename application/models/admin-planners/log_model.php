<?php

class log_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_log', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid($table="",$row=""){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_log`.*
            FROM `tbl_log`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if($table!=""){
            $configs["strWhere"].=" AND `tbl_log`.`Table`='$table'";
        }
        if($row!=""){
            $configs["strWhere"].=" AND `tbl_log`.`RowID`='$row'";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_log`.`Insert` DESC";
        $configs["fields"]=array(
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
