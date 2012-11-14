<?php

class gallery_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID=""){
        $where=array("ID"=>$ID);
        $query=$this->db->get_where('tbl_gallery', $where); 
        return $query->result();
    }
    function gets(){
        $query=$this->db->get_where('tbl_gallery'); 
        return $query->result();
    }
    function update($ID,$Params){
        $this->db->set('Update', "NOW()",false)
            ->where('ID', $ID)
            ->update('tbl_gallery', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function insert($Params){
        $this->db->set('Insert', "NOW()",false)
            ->insert('tbl_gallery', $Params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db->set('Delete', "NOW()",false);
        $this->db->where('ID', $ID);
        $this->db->update('tbl_gallery'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function restore($ID){
        $this->db->set('Delete', "NULL",false);
        $this->db->where('ID', $ID);
        $this->db->update('tbl_gallery'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_gallery`.*
            FROM `tbl_gallery`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-GAL"]) && $_SESSION["JQX-DEL-GAL"]==0){
            $configs["strWhere"].=" AND `tbl_gallery`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-GAL"]) && $_SESSION["JQX-DEL-GAL"]==-1){
            $configs["strWhere"].=" AND `tbl_gallery`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `Insert` DESC";
        $configs["fields"]=array(
            "ID"=>"ID",
            );
        $configs["filterfields"]=array(
            "Images"=>"Images",
            "AlbumName"=>"AlbumName"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
