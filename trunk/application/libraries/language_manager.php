<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_Manager {
	
	var $curr_lang = NULL;
	
	function __construct($params = array())
	{
		$this->CI =& get_instance();
		if( !isset($params['autoget']) || $params['autoget'] !== FALSE ){
			$this->check_language();
		}
	}
	
	function check_language()
	{
		$o = $this->get_language();
		if($o === FALSE){
			show_error('Không tồn tại ngôn ngữ');
		}
		return TRUE;
	}
	
	function get_language(){
		if(is_null($this->curr_lang)){
			$code = $this->CI->lang->lang();
			if( !empty($code) ){
				$o = new Language_model();
				$o->where('identifier', $code);
				$o->get(1);
				if($o->exists()) {
					$this->curr_lang = $o;
					return $this->curr_lang;
				}
			}
			return FALSE;
		}else{
			return $this->curr_lang;
		}
	}
}
