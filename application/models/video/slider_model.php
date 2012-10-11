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
    function gets(){
        $where=array(
            "`tbl_slider`.`Delete`"=>null
            ,"`tbl_slider`.`Status`"=>"Public"
            ,"`tbl_video`.`Delete`"=>null
            ,"`tbl_video`.`Status`"=>"Public"
            );
        $this->db->select('tbl_slider.*,tbl_video.VideoKey,tbl_video.Alias');
        $this->db->from('tbl_slider');
        $this->db->join('tbl_video', 'tbl_video.VideoID = tbl_slider.VideoID');
        $this->db->where($where);
        $query=$this->db->get();
        //$query=$this->db->get_where("tbl_slider",$where); 
        return $query->result();
    }
    
    
}
?>
