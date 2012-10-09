<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Xgo_service{
	var $partnerID = 'soha';
	var $secretKey = 'Zv7o$QZaTN#lVeKPK*NJm63%tqah84';
	var $wsdl = "http://ws.xgo6.net/SohaPayment.asmx?wsdl";
	var $cryptKey = "mNXzZN50c5XeNz4y";
	
	var $client = NULL;

	function __construct(){
		$this->client = new SoapClient($this->wsdl);
	}

	function init($para = array()){
		if(!empty($para)){
			foreach($para as $key => $value){
				$this->{$key} = $value;
			}
		}
		$this->client = new SoapClient($this->wsdl);
	}

	function character_exists($username, $server, $ip){
		$result = $this->client->CharacterExists(array(
    			'PartnerID' => $this->partnerID,
    	    	'ClientIP' => $ip,
    			'UserName' => $username,
    			'Server' => $server,
    			'Signature' => md5($this->partnerID.$username.$server.$this->secretKey)
		));
				
		return json_decode($result->CharacterExistsResult);
	} 
	
	function GetLoginLink($username, $server, $ip){
		$result = $this->client->GetLoginLink(array(
				'PartnerID' => $this->partnerID,
    	    	'ClientIP' => $ip,
    			'UserName' => $username,
    			'Server' => $server,
    			'Signature' => md5($this->partnerID.$username.$server.$ip.$this->secretKey)
		));		
		return $result->GetLoginLinkResult;
	} 
}
?>