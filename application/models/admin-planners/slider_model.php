<?php

class slider_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function get($ID){
        
        $where=array("ID"=>"$ID");
        $this->db->select('tbl_slider.*,tbl_video.VideoKey');
        $this->db->from('tbl_slider');
        $this->db->join('tbl_video', 'tbl_video.VideoID = tbl_slider.VideoID');
        $this->db->where($where);
        $query=$this->db->get(); 
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
    function delete($ID){
        $this->db->set('Delete', 'NOW()', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_slider'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function retore($ID){
        $this->db->set('Delete', 'NULL', FALSE);
        $where=array("ID"=>$ID);
        $this->db->where($where);
        $this->db->update('tbl_slider'); 
        $count = $this->db->affected_rows(); //should return the number of rows affected by the last query
        if($count==1) return true;
        return false;
    }
    function jqxgrid(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `tbl_slider`.*,`tbl_video`.`VideoKey`
            FROM `tbl_slider`,`tbl_video`
            ";
        $configs["strWhere"]="
            WHERE `tbl_slider`.`VideoID`=`tbl_video`.`VideoID`
            ";
        if(isset($_SESSION["JQX-DEL-SLIDER"]) && $_SESSION["JQX-DEL-SLIDER"]==0){
            $configs["strWhere"].=" AND `tbl_slider`.`Delete` IS NULL";
        }elseif(isset($_SESSION["JQX-DEL-SLIDER"]) && $_SESSION["JQX-DEL-SLIDER"]==-1){
            $configs["strWhere"].=" AND `tbl_slider`.`Delete` IS NOT NULL";
        }
        $configs["strOrderBy"]=" ORDER BY `tbl_slider`.`Insert` DESC";
        $configs["fields"]=array(
            "Slider"=>"`tbl_slider`.`ID`"
            ,"Title"=>"`tbl_slider`.`Title`"
            ,"Insert"=>"`tbl_slider`.`Insert`"
            ,"Update"=>"`tbl_slider`.`Update`"
            ,"Delete"=>"`tbl_slider`.`Delete`"
            ,"Status"=>"`tbl_slider`.`Status`"
            
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
