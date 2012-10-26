<?php

class template_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function gets($start=0,$limit=12){
        $where=array("delete"=>null);
        $query=$this->db->get_where('tbl_template', $where,$limit,$start); 
        return $query->result();
    }
    function CALC_FOUND_ROWS(){
        $where=array("delete"=>null);
        $this->db->where($where);
        $this->db->from('tbl_template');
        return $this->db->count_all_results();
    }
    
    
}
?>
