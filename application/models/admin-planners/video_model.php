<?php

class video_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function getVideo($VideoID){
        $where=array("VideoID"=>$VideoID);
        $query=$this->db->get_where('tbl_video', $where); 
        return $query->result();
    }
    function insertVideo($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_video', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function updateVideo($VideoID,$params){
        $this->db->set('Update', 'NOW()', FALSE);
        $this->db->where('VideoID', $VideoID);
        $this->db->update('tbl_video', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid_video(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_video`.*
            FROM `tbl_video`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        $configs["strOrderBy"]=" ORDER BY `tbl_video`.`Insert` DESC";
        $configs["fields"]=array(
            "Video"=>"`VideoID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
