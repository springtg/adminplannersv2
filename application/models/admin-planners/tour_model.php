<?php

class tour_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('tbl_tour', $where); 
        return $query->result();
    }
    
    function insert($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_tour', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_tour'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_tour'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$params){
        $this->db->set('Update', 'NOW()', FALSE);
        $this->db->where('ID', $ID);
        $this->db->update('tbl_tour', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_tour`.*
            FROM `tbl_tour`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-TOUR"]) && $_SESSION["JQX-DEL-TOUR"]==0){
            $configs["strWhere"].=" AND `tbl_tour`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-TOUR"]) && $_SESSION["JQX-DEL-TOUR"]==-1){
            $configs["strWhere"].=" AND `tbl_tour`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `Insert` DESC";
        $configs["fields"]=array(
            "ID"=>"ID",
            );
        $configs["filterfields"]=array(
            "Title"=>"Title",
            "Alias"=>"Alias",
            "Type"=>"Type"
        );
        $this->init($configs);
        return $this->Binding();
    }
}
?>
