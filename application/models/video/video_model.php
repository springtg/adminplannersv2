<?php

class video_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function getToken($q=""){
        $where=array("Delete"=>null);
        $this->db->like('Title', $q); 
        $query=$this->db->get_where('tbl_video', $where); 
        return $query->result();
    }
    function getPre($ID){
        $where=array("VideoID <= "=>$ID-1,"Status"=>"Public","Delete"=>null);
        $this->db->order_by("VideoID", "desc"); 
        $query=$this->db->get_where('tbl_video', $where,1,0); 
        return $query->result();
    }
    function getNex($ID){
        $where=array("VideoID >= "=>$ID+1,"Status"=>"Public","Delete"=>null);
        $this->db->order_by("VideoID", "ASC"); 
        $query=$this->db->get_where('tbl_video', $where,1,0); 
        return $query->result();
    }
    function getByAlias($alias){
        $where=array("Alias"=>$alias,"Status"=>"Public","Delete"=>null);
        $query=$this->db->get_where('tbl_video', $where); 
        return $query->result();
    }
    function getRelated($video){
        $where=array(
            "`tbl_video`.`Delete`"=>null,
            "`tbl_video`.`Status`"=>"Public",
            "`tbl_video`.`Alias` <>"=>$video["Alias"]
            );
//        $this->db->like('Category', "a-zA-Z0-9"); 
//        $categorys=  explode(",", $categorys);
//        foreach ($categorys as $ca){
//            if($ca!="" && $ca!=null){
//               $this->db->or_like('Category', ",$ca,");  
//            }
//        }
//        $tag=  explode(",", $tag);
//        foreach ($tag as $ta){
//            if($ta!="" && $ta!=null){
//               $this->db->or_like('Tag', "$ta");  
//            }
//        }
        $this->db->order_by("Rand()", "desc"); 
        $query=$this->db->get_where('tbl_video', $where,3,0); 
        return $query->result();
    }
    function gets($limit=9,$begin=0){
        $where=array(
            "`tbl_video`.`Delete`"=>null
            ,"`tbl_video`.`Status`"=>"Public"
            );
        $this->db->where($where);
        $this->db->order_by("Insert", "desc"); 
        $query=$this->db->get("tbl_video",$limit,$begin);
        //$query=$this->db->get_where("tbl_slider",$where); 
        return $query->result();
    }
    function counts(){
        $where=array(
            "`tbl_video`.`Delete`"=>null
            ,"`tbl_video`.`Status`"=>"Public"
            );
        $this->db->where($where);
        //$query=$this->db->get("tbl_video",6,0);
        //$query=$this->db->get_where("tbl_slider",$where); 
        return $this->db->count_all_results("tbl_video");
    }
    
    
}
?>
