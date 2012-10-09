<?php

class video_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
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
