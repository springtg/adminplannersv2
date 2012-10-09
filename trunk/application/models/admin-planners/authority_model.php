<?php

class authority_model extends jqxGrid_CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    
    function jqxgrid_authority(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `adp_authority`.*
            FROM `adp_authority`
            ";
        $configs["strWhere"]="
            WHERE true
            ";
        $configs["strOrderBy"]=" ORDER BY `adp_authority`.`Insert` DESC";
        $configs["fields"]=array(
            "Authority"=>"`AuthorityID`"
            );
        $this->init($configs);
        return $this->jqxBinding();
    }
    
    
}
?>
