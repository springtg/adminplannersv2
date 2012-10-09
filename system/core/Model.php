<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */
class jqxGrid_CI_Model extends CI_Model{
    private $strQuery;
    private $strWhere;
    private $strOrderBy;
    private $strGroupBy;
    private $fields;
    private $configs;
    function __construct()
    {
        parent::__construct();
        $this->strQuery="";
        $this->strWhere="";
        $this->strOrderBy="";
        $this->strGroupBy="";
        $this->fields=array();
        $this->configs["usinglimit"]=true;
    }
    function __new($strQuery="",$strWhere="",$fields=array()){
        
        $this->strQuery=$strQuery;
        $this->strWhere=$strWhere;
        if(is_array($fields))
            $this->fields=$fields;
    }
    
    function init($configs){//$strQuery="",$strWhere="",$strOrderBy="",$fields=array()){
        $this->configs=$configs;
        if(isset($configs["strQuery"]))
            $this->strQuery=$configs["strQuery"];
        if(isset($configs["strWhere"]))
            $this->strWhere=$configs["strWhere"];
        if(isset($configs["strOrderBy"]))
            $this->strOrderBy=$configs["strOrderBy"];
        if(isset($configs["strGroupBy"]))
            $this->strGroupBy=$configs["strGroupBy"];
        if(isset($configs["fields"]))
            $this->fields=$configs["fields"];
    }
    function jqxBinding(){
        
        $FstrSQL    =$this->strQuery;//"SELECT SQL_CALC_FOUND_ROWS * FROM `auction`";
        $where      =$this->strWhere;//" WHERE `product`='$id' ";
        $orderby    =$this->strOrderBy;
        $strgroupby =$this->strGroupBy;
        $fields     =$this->fields;
        
        $pagenum    = isset($_GET['pagenum'])?$_GET['pagenum']:0;
	$pagesize   = isset($_GET['pagesize'])?$_GET['pagesize']:20;
	$start = $pagenum * $pagesize;
        $limit="";
	if(isset($this->configs["usinglimit"]) && $this->configs["usinglimit"]){
            $limit="LIMIT $start, $pagesize";
        }
        $SQLquery = "$FstrSQL $where $strgroupby $orderby";
	
	$query=$this->db->query($SQLquery);
        $sql = "SELECT FOUND_ROWS() AS `found_rows`;";
	$query=$this->db->query($sql);
        //$query->result();
        $rows=$query->row_array();
	$total_rows = $rows['found_rows'];
        $result['total_rows']=$total_rows;
	$filterquery = "";
        
        
        $SQLquery = "$FstrSQL $where $strgroupby $orderby  $limit";
        // filter data.
	if (isset($_GET['filterscount']))
	{
		$filterscount = $_GET['filterscount'];
		
		if ($filterscount > 0)
		{
			$where.= " AND (";
			$tmpdatafield = "";
			$tmpfilteroperator = "";
			for ($i=0; $i < $filterscount; $i++)
		    {
				// get the filter's value.
				$filtervalue = $_GET["filtervalue" . $i];
				// get the filter's condition.
				$filtercondition = $_GET["filtercondition" . $i];
				// get the filter's column.
				$filterdatafield = $_GET["filterdatafield" . $i];
				// get the filter's operator.
				$filteroperator = $_GET["filteroperator" . $i];
				
                                //check filterdatafield
                                if($filterdatafield[0] === "_" && $filterdatafield[strlen($filterdatafield) - 1] === "_"){
                                    $filterdatafield=  substr($filterdatafield, 1, -1);
                                }
				if ($tmpdatafield == "")
				{
					$tmpdatafield = $filterdatafield;			
				}
				else if ($tmpdatafield <> $filterdatafield)
				{
					$where .= ")AND(";
				}
				else if ($tmpdatafield == $filterdatafield)
				{
					if ($tmpfilteroperator == 0)
					{
						$where .= " AND ";
					}
					else $where .= " OR ";	
				}
				
				// build the "WHERE" clause depending on the filter's condition, value and datafield.
                                // possible conditions for string filter: 
                                //      'EMPTY', 'NOT_EMPTY', 'CONTAINS', 'CONTAINS_CASE_SENSITIVE',
                                //      'DOES_NOT_CONTAIN', 'DOES_NOT_CONTAIN_CASE_SENSITIVE', 
                                //      'STARTS_WITH', 'STARTS_WITH_CASE_SENSITIVE',
                                //      'ENDS_WITH', 'ENDS_WITH_CASE_SENSITIVE', 'EQUAL', 
                                //      'EQUAL_CASE_SENSITIVE', 'NULL', 'NOT_NULL'
                                // 
                                // possible conditions for numeric filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN',
                                //  'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 
                                //  'NULL', 'NOT_NULL'
                                //  
                                // possible conditions for date filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 
                                // 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 
                                // 'NOT_NULL'                         
                                
                                $vowels = array( 
                                    "đ"=>"d", 
                                    "'"=>"",
                                    "\\"=>"",
                                    "/"=>""
                                    );
                                
                                $filtervalue = str_replace(
                                        array_keys($vowels),  
                                        array_values($vowels), 
                                        $filtervalue
                                        );
                                if(count($fields)>0 && isset($fields[$filterdatafield])){
                                    $filterdatafield=$fields[$filterdatafield];
                                }else{
                                    $filterdatafield="`$filterdatafield`";
                                }
				switch($filtercondition)
				{
                                        case "NULL":
                                            $where .= " ($filterdatafield is null)";
                                            break;
                                        case "EMPTY":
                                                $where .= " ($filterdatafield is null) or ($filterdatafield='')";
                                                break;
                                        case "NOT_NULL":
                                            $where .= " ($filterdatafield is not null)";
                                            break;
                                        case "NOT_EMPTY":
                                                $where .= " ($filterdatafield is not null) and ($filterdatafield <>'')";
                                                break;
                                        case "CONTAINS_CASE_SENSITIVE":
                                        case "CONTAINS":
                                                $where .= " $filterdatafield LIKE '%$filtervalue%'";
                                                break;
                                        case "DOES_NOT_CONTAIN_CASE_SENSITIVE":
                                        case "DOES_NOT_CONTAIN":
                                                $where .= " $filterdatafield NOT LIKE '%$filtervalue%'";
                                                break;
                                        case "EQUAL_CASE_SENSITIVE":
                                        case "EQUAL":
                                            $where .= " $filterdatafield = '$filtervalue'";
                                            break;
                                        case "NOT_EQUAL":
                                            $where .= " $filterdatafield <> '$filtervalue'";
                                            break;
                                        case "GREATER_THAN":
                                            $where .= " $filterdatafield > '$filtervalue'";
                                            break;
                                        case "LESS_THAN":
                                            $where .= " $filterdatafield < '$filtervalue'";
                                            break;
                                        case "GREATER_THAN_OR_EQUAL":
                                            $where .= " $filterdatafield >= '$filtervalue'";
                                            break;
                                        case "LESS_THAN_OR_EQUAL":
                                            $where .= " $filterdatafield <= '$filtervalue'";
                                            break;
                                        case "STARTS_WITH_CASE_SENSITIVE":
                                        case "STARTS_WITH":
                                            $where .= " $filterdatafield LIKE '$filtervalue%'";
                                            break;
                                        case "ENDS_WITH_CASE_SENSITIVE":
                                        case "ENDS_WITH":
                                            $where .= " $filterdatafield LIKE '%$filtervalue'";
                                            break;
                                        
                                        
				}
								
				if ($i == $filterscount - 1)
				{
					$where .= ")";
				}
				
				$tmpfilteroperator = $filteroperator;
				$tmpdatafield = $filterdatafield;			
			}
			// build the query.
                        $SQLquery = "$FstrSQL $where $strgroupby $orderby";
			$filterquery = $SQLquery;
			//$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			$query=$this->db->query($SQLquery);
                        $sql = "SELECT FOUND_ROWS() AS `found_rows`;";
			//$rows = mysql_query($sql);
			//$rows = mysql_fetch_assoc($rows);
                        $query=$this->db->query($sql);
                        $rows=$query->row_array();
                        $total_rows = $rows['found_rows'];
                        $result['total_rows']=$total_rows;
			$new_total_rows = $rows['found_rows'];		
			//$SQLquery = "$FstrSQL ".$where." LIMIT $start, $pagesize";		
			$total_rows = $new_total_rows;	
		}
	}
	
	if (isset($_GET['sortdatafield']))
	{
                $sortfield = $_GET['sortdatafield'];
                //fix sortfield
                if($sortfield[0] === "_" && $sortfield[strlen($sortfield) - 1] === "_"){
                    $sortfield=  substr($sortfield, 1, -1);
                }
                if(count($fields)>0 && isset($fields[$sortfield])){
                    $sortfield=$fields[$sortfield];
                }else{
                    $sortfield="`$sortfield`";
                }
                
		$sortorder = $_GET['sortorder'];
	
//                if ($_GET['filterscount'] == 0)
//		{
			if ($sortorder == "desc")
			{
				$SQLquery = "$FstrSQL $where $strgroupby ORDER BY $sortfield DESC $limit";
			}
			else if ($sortorder == "asc")
			{
				$SQLquery = "$FstrSQL $where $strgroupby ORDER BY $sortfield ASC $limit";
			}
//		}
//		else
//		{
//			if ($sortorder == "desc")
//			{
//				$filterquery .= " ORDER BY `$sortfield` DESC LIMIT $start, $pagesize";
//			}
//			else if ($sortorder == "asc")	
//			{
//				$filterquery .= " ORDER BY `$sortfield` ASC LIMIT $start, $pagesize";
//			}
//			$SQLquery = $filterquery;
//		}		
	}else{
            $SQLquery = "$FstrSQL $where $strgroupby $orderby $limit";
        }
        
        $query=$this->db->query($SQLquery);
        $result['rows']= $query->result();
        
        return $result;
        //$data['total_rows']=$total_rows;
        
    }
}
class ADP_CI_Model extends CI_Model{
    private $strQuery;
    private $fields;
    function __construct()
    {
        parent::__construct();
        $this->strQuery="";
        $this->fields=array();
    }
    function __new($strQuery="",$fields=array()){
        
        $this->strQuery=$strQuery;
        if(is_array($fields))
            $this->fields=$fields;
    }
    function jqxBinding(){
        
        $FstrSQL=$this->strQuery;//"SELECT SQL_CALC_FOUND_ROWS * FROM `auction`";
        $fields=$this->fields;
        $pagenum = isset($_GET['pagenum'])?$_GET['pagenum']:0;
	$pagesize = isset($_GET['pagesize'])?$_GET['pagesize']:20;
	$start = $pagenum * $pagesize;
	
        $SQLquery = "$FstrSQL";
	
	$query=$this->db->query($SQLquery);
        $sql = "SELECT FOUND_ROWS() AS `found_rows`;";
	$query=$this->db->query($sql);
        //$query->result();
        $rows=$query->row_array();
	$total_rows = $rows['found_rows'];
        $result['total_rows']=$total_rows;
	$filterquery = "";
        
        $SQLquery = "$FstrSQL  LIMIT $start, $pagesize";
        
        // filter data.
	if (isset($_GET['filterscount']))
	{
		$filterscount = $_GET['filterscount'];
		
		if ($filterscount > 0)
		{
			$where= " AND (";
			$tmpdatafield = "";
			$tmpfilteroperator = "";
			for ($i=0; $i < $filterscount; $i++)
		    {
				// get the filter's value.
				$filtervalue = $_GET["filtervalue" . $i];
				// get the filter's condition.
				$filtercondition = $_GET["filtercondition" . $i];
				// get the filter's column.
				$filterdatafield = $_GET["filterdatafield" . $i];
				// get the filter's operator.
				$filteroperator = $_GET["filteroperator" . $i];
				
                                //check filterdatafield
                                if($filterdatafield[0] === "_" && $filterdatafield[strlen($filterdatafield) - 1] === "_"){
                                    $filterdatafield=  substr($filterdatafield, 1, -1);
                                }
				if ($tmpdatafield == "")
				{
					$tmpdatafield = $filterdatafield;			
				}
				else if ($tmpdatafield <> $filterdatafield)
				{
					$where .= ")AND(";
				}
				else if ($tmpdatafield == $filterdatafield)
				{
					if ($tmpfilteroperator == 0)
					{
						$where .= " AND ";
					}
					else $where .= " OR ";	
				}
				
				// build the "WHERE" clause depending on the filter's condition, value and datafield.
                                // possible conditions for string filter: 
                                //      'EMPTY', 'NOT_EMPTY', 'CONTAINS', 'CONTAINS_CASE_SENSITIVE',
                                //      'DOES_NOT_CONTAIN', 'DOES_NOT_CONTAIN_CASE_SENSITIVE', 
                                //      'STARTS_WITH', 'STARTS_WITH_CASE_SENSITIVE',
                                //      'ENDS_WITH', 'ENDS_WITH_CASE_SENSITIVE', 'EQUAL', 
                                //      'EQUAL_CASE_SENSITIVE', 'NULL', 'NOT_NULL'
                                // 
                                // possible conditions for numeric filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN',
                                //  'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 
                                //  'NULL', 'NOT_NULL'
                                //  
                                // possible conditions for date filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 
                                // 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 
                                // 'NOT_NULL'                         
                                
                                $vowels = array( 
                                    "đ"=>"d", 
                                    "'"=>"",
                                    "\\"=>"",
                                    "/"=>""
                                    );
                                
                                $filtervalue = str_replace(
                                        array_keys($vowels),  
                                        array_values($vowels), 
                                        $filtervalue
                                        );
                                if(count($fields)>0 && isset($fields[$filterdatafield])){
                                    $filterdatafield=$fields[$filterdatafield];
                                }else{
                                    $filterdatafield="`$filterdatafield`";
                                }
				switch($filtercondition)
				{
                                        case "NULL":
                                            $where .= " ($filterdatafield is null)";
                                            break;
                                        case "EMPTY":
                                                $where .= " ($filterdatafield is null) or ($filterdatafield='')";
                                                break;
                                        case "NOT_NULL":
                                            $where .= " ($filterdatafield is not null)";
                                            break;
                                        case "NOT_EMPTY":
                                                $where .= " ($filterdatafield is not null) and ($filterdatafield <>'')";
                                                break;
                                        case "CONTAINS_CASE_SENSITIVE":
                                        case "CONTAINS":
                                                $where .= " $filterdatafield LIKE '%$filtervalue%'";
                                                break;
                                        case "DOES_NOT_CONTAIN_CASE_SENSITIVE":
                                        case "DOES_NOT_CONTAIN":
                                                $where .= " $filterdatafield NOT LIKE '%$filtervalue%'";
                                                break;
                                        case "EQUAL_CASE_SENSITIVE":
                                        case "EQUAL":
                                            $where .= " $filterdatafield = '$filtervalue'";
                                            break;
                                        case "NOT_EQUAL":
                                            $where .= " $filterdatafield <> '$filtervalue'";
                                            break;
                                        case "GREATER_THAN":
                                            $where .= " $filterdatafield > '$filtervalue'";
                                            break;
                                        case "LESS_THAN":
                                            $where .= " $filterdatafield < '$filtervalue'";
                                            break;
                                        case "GREATER_THAN_OR_EQUAL":
                                            $where .= " $filterdatafield >= '$filtervalue'";
                                            break;
                                        case "LESS_THAN_OR_EQUAL":
                                            $where .= " $filterdatafield <= '$filtervalue'";
                                            break;
                                        case "STARTS_WITH_CASE_SENSITIVE":
                                        case "STARTS_WITH":
                                            $where .= " $filterdatafield LIKE '$filtervalue%'";
                                            break;
                                        case "ENDS_WITH_CASE_SENSITIVE":
                                        case "ENDS_WITH":
                                            $where .= " $filterdatafield LIKE '%$filtervalue'";
                                            break;
                                        
                                        
				}
								
				if ($i == $filterscount - 1)
				{
					$where .= ")";
				}
				
				$tmpfilteroperator = $filteroperator;
				$tmpdatafield = $filterdatafield;			
			}
			// build the query.
                        $SQLquery = "$FstrSQL ".$where;
			$filterquery = $SQLquery;
			//$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			$query=$this->db->query($SQLquery);
                        $sql = "SELECT FOUND_ROWS() AS `found_rows`;";
			//$rows = mysql_query($sql);
			//$rows = mysql_fetch_assoc($rows);
                        $query=$this->db->query($sql);
                        $rows=$query->row_array();
                        $total_rows = $rows['found_rows'];
                        $result['total_rows']=$total_rows;
			$new_total_rows = $rows['found_rows'];		
			//$SQLquery = "$FstrSQL ".$where." LIMIT $start, $pagesize";		
			$total_rows = $new_total_rows;	
		}
	}
	
	if (isset($_GET['sortdatafield']))
	{
                $sortfield = $_GET['sortdatafield'];
                //fix sortfield
                if($sortfield[0] === "_" && $sortfield[strlen($sortfield) - 1] === "_"){
                    $sortfield=  substr($sortfield, 1, -1);
                }
                if(count($fields)>0 && isset($fields[$sortfield])){
                    $sortfield=$fields[$sortfield];
                }else{
                    $sortfield="`$sortfield`";
                }
                
		$sortorder = $_GET['sortorder'];
	
//                if ($_GET['filterscount'] == 0)
//		{
			if ($sortorder == "desc")
			{
				$SQLquery = "$FstrSQL $where ORDER BY $sortfield DESC LIMIT $start, $pagesize";
			}
			else if ($sortorder == "asc")
			{
				$SQLquery = "$FstrSQL $where ORDER BY $sortfield ASC LIMIT $start, $pagesize";
			}
//		}
//		else
//		{
//			if ($sortorder == "desc")
//			{
//				$filterquery .= " ORDER BY `$sortfield` DESC LIMIT $start, $pagesize";
//			}
//			else if ($sortorder == "asc")	
//			{
//				$filterquery .= " ORDER BY `$sortfield` ASC LIMIT $start, $pagesize";
//			}
//			$SQLquery = $filterquery;
//		}		
	}else{
            $SQLquery = "$FstrSQL $where ORDER BY `insert` DESC LIMIT $start, $pagesize";
        }
        
        $query=$this->db->query($SQLquery);
        $result['rows']= $query->result();
        
        return $result;
        //$data['total_rows']=$total_rows;
        
    }
}