<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Gosu_service{
	var $partner_id = 'ngaokiem2';
	var $secret_key = 'xNWvuZCTrk0FKfcGfnXVyAqHuu9QlExfw9f86fvOLxGRURzxyPx';
	var $wsdl = "http://ws.gosu.vn/gosuAccount.asmx?wsdl";
	var $crypt_key = "mNXzZN50c5XeNz4y";	
	var $client = NULL;

	function __construct(){
		//$this->client = new SoapClient($this->wsdl);
	}

	function init($para = array()){
		if(!empty($para)){
			foreach($para as $key => $value){
				$this->{$key} = $value;
			}
		}
		//$this->client = new SoapClient($this->wsdl);
	}

	function character_exists($username, $server, $ip){
		$result = $this->client->CharacterExists(array(
    			'PartnerID' => $this->partner_id,
    	    	'ClientIP' => $ip,
    			'UserName' => $username,
    			'Server' => $server,
    			'Signature' => md5($this->partner_id.$username.$server.$this->secret_key)
		));
				
		return json_decode($result->CharacterExistsResult);
	} 
	
	function GetLoginLink($username, $server, $ip){
		$result = $this->client->GetLoginLink(array(
				'PartnerID' => $this->partner_id,
    	    	'ClientIP' => $ip,
    			'UserName' => $username,
    			'Server' => $server,
    			'Signature' => md5($this->partner_id.$username.$server.$ip.$this->secret_key)
		));		
		return $result->GetLoginLinkResult;
	}
	function validate_username($username){						
		$result = $this->client->ValidateUserName(array(				
    			'UserName' => $username,
    			'wsUserName' => $this->partner_id,
    			'Signature' => md5($this->partner_id.$this->secret_key)
		));			
			return $result->ValidateUserNameResult;
	}
}
?>