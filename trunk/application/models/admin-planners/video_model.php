<?php

class video_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function getToken($q=""){
        $where=array("Delete"=>null);
        $this->db->like('Title', $q); 
        $query=$this->db->get_where('tbl_video', $where,10,0); 
        return $query->result();
    }
    function getVideo($VideoID){
        $where=array("VideoID"=>$VideoID);
        $query=$this->db->get_where('tbl_video', $where); 
        return $query->result();
    }
    function getVideos(){
        $where=array("Delete"=>null);
        $query=$this->db->get_where('tbl_video', $where); 
        return $query->result();
    }
    function checkExist($VideoKey="",$ID=""){
        if($ID==""){
            $where=array("VideoKey"=>$VideoKey);
            
        }else{
            $where=array("VideoKey"=>$VideoKey);
            $query=$this->db->where("VideoID!=",$ID);
        }
        $query=$this->db->where($where);
        $query=$this->db->get('tbl_video'); 
        return $query->result();
    }
    function insertVideo($params){
        $this->db->set('Insert', 'NOW()', FALSE);
        $this->db->insert('tbl_video', $params); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function delete($ID){
        $this->db
            ->set('Delete', 'NOW()', FALSE)
            ->where(array("VideoID"=>$ID))
            ->update('tbl_video');
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db
            ->set('Delete', 'NULL', FALSE)
            ->where(array("VideoID"=>$ID))
            ->update('tbl_video');
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
    function insert($params){
        $count = $this->db
            ->set('Insert', 'NOW()', FALSE)
            ->insert('tbl_video', $params)
            ->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function update($ID,$params){
        $this->db
            ->set('Update', 'NOW()', FALSE)
            ->where('VideoID', $ID)
            ->update('tbl_video', $params);
        $count =  $this->db->affected_rows(); //should return the number of rows affected by the last query
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
        if(isset($_SESSION["JQX-DEL-VIDEO"]) && $_SESSION["JQX-DEL-VIDEO"]==0){
            $configs["strWhere"].=" AND `tbl_video`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-VIDEO"]) && $_SESSION["JQX-DEL-VIDEO"]==-1){
            $configs["strWhere"].=" AND `tbl_video`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_video`.`Insert` DESC";
        $configs["fields"]=array(
            "Video"=>"`VideoID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    function FlexiGridData(){
        $configs["strQuery"]="
             SELECT SQL_CALC_FOUND_ROWS `tbl_video`.*
            FROM `tbl_video`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        if(isset($_SESSION["JQX-DEL-VIDEO"]) && $_SESSION["JQX-DEL-VIDEO"]==0){
            $configs["strWhere"].=" AND `tbl_video`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-VIDEO"]) && $_SESSION["JQX-DEL-VIDEO"]==-1){
            $configs["strWhere"].=" AND `tbl_video`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `Insert` DESC";
        $configs["fields"]=array(
            "ID"=>"VideoID",
            );
        $configs["filterfields"]=array(
            "Title"=>"Title"
        );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
