<?php

class setting_model extends FlexiGrid_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function FlexiGridData(){
        $configs["strQuery"]="
            SELECT SQL_CALC_FOUND_ROWS `adp_settings`.*
            FROM `adp_settings`
            ";
        $configs["strWhere"]="
            WHERE TRUE
            ";
        $configs["fields"]=array(
            
            );
        $this->init($configs);
        return $this->Binding();
    }
    
}
?>
