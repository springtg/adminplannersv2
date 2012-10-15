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
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
        
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
function JO_JS_location( $URL = false ) {
    if( $URL )	exit( "<script> try { parent.location.replace ( '" . $URL .		"'						); } catch ( exception ) { location.replace( '" . $URL . "'							); } </script>" );
    else	exit( "<script> try { parent.location.replace ( '" . $_SERVER[ "HTTP_REFERER" ] . "'	); } catch ( exception ) { location.replace( '" . $_SERVER[ "HTTP_REFERER" ] . "'	); } </script>" );
} 
function JO_location( $URL = false ) {JO_JS_location( $URL ); }
function objectToArray($d) {
        if (is_object($d)) {
                // Gets the properties of the given object
                // with get_object_vars function
                $d = get_object_vars($d);
        }

        if (is_array($d)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return array_map(__FUNCTION__, $d);
        }
        else {
                // Return array
                return $d;
        }
}
function converturl($str) {
    $remove="~ ` ! @ # $ % ^ & * ( ) _ + | \\ = ' \" ; : ? / > . , < ] [ { }";
    $from   = "à á ạ ả ã â ầ ấ ậ ẩ ẫ ă ằ ắ ặ ẳ ẵ è é ẹ ẻ ẽ ê ề ế ệ ể ễ ì í ị ỉ ĩ ò ó ọ ỏ õ ô ồ ố ộ ổ ỗ ơ ờ ớ ợ ở ỡ ù ú ụ ủ ũ ư ừ ứ ự ử ữ ỳ ý ỵ ỷ ỹ đ ";
    $to     = "a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
    $from  .= " À Á Ạ Ả Ã Â Ầ Ấ Ậ Ẩ Ẫ Ă Ằ Ắ Ặ Ẳ Ẵ È É Ẹ Ẻ Ẽ Ê Ề Ế Ệ Ể Ễ Ì Í Ị Ỉ Ĩ Ò Ó Ọ Ỏ Õ Ô Ồ Ố Ộ Ổ Ỗ Ơ Ờ Ớ Ợ Ở Ỡ Ù Ú Ụ Ủ Ũ Ư Ừ Ứ Ự Ử Ữ Ỳ Ý Ỵ Ỷ Ỹ Đ ";
    $to    .= " a a a a a a a a a a a a a a a a a e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y d ";
    $remove =  explode(" ", $remove);
    $from =  explode(" ", $from);
    $to =  explode(" ", $to);
    $str = str_replace($from,$to, $str);
    $str = str_replace($remove,"", $str);
    $str=strip_tags($str);
    $str = iconv("UTF-8","ISO-8859-1//TRANSLIT//IGNORE",$str);
    //$str = iconv("ISO-8859-1","UTF-8",$str);
    $str= str_replace(" ","-", $str);
    while (!(strpos($str, "--")===false)){
        $str= str_replace("--","-", $str);
    }
    
    $str=  strtolower($str);
    return $str;
}
function ShowError(
        $Error=array(
            "color"=>"",
            "errortype"=>"404",
            "title"=>"Webpage not found.",
            "title"=>"Webpage not found.",
            "message"=>"The 404 or Not Found, the server could not find what was requested",
            "homelink"=> ""
        )
        ){
    die('
        <link href="'.base_url("syslib/syscss/sysstyle.css").'" rel="stylesheet" type="text/css" />
        <div class="MrKhuong'.$Error["color"].'">
            <div class="tit"><span>'.$Error["errortype"].'</span>'.$Error["title"].'</div>
            <p>'.$Error["message"].'</p>
            <a href="javascript:window.history.back()" class="back">Go back</a>
            <a href="'.($Error["homelink"]==""?  base_url("home"):$Error["homelink"]).'" class="home">Go home</a>
        </div>
    ');
}
function getIP()
{ 
    $ip = ''; 
    if (getenv("HTTP_CLIENT_IP")) 
            $ip = getenv("HTTP_CLIENT_IP"); 
    else if(getenv("HTTP_X_FORWARDED_FOR")) 
            $ip = getenv("HTTP_X_FORWARDED_FOR"); 
    else if(getenv("REMOTE_ADDR")) 
            $ip = getenv("REMOTE_ADDR"); 
    else 
            $ip = "UNKNOWN";

    $ip = explode(',', $ip);		
    return $ip[0];
}