<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Xgo_account_service{
	
	//var $wsUserName = 'trangchulmtk';
	//var $wsPassword = 'Uh&8*QghKbnH2O@#9734a';
	/*var $wsUserName = 'trangchulmtk';
	var $wsPassword = 'Uh&8*QghKbnH2O@#9734a';*/
	var $wsUserName = 'ngaokiem2';
	var $wsPassword = 'xNWvuZCTrk0FKfcGfnXVyAqHuu9QlExfw9f86fvOLxGRURzxyPx';
	var $wsdl = "http://ws.gosu.vn/gosuAccount.asmx?wsdl";
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
	
    function CheckLogin($username, $password,$ip){ 
		$result = $this->client->CheckLogin(array(  
			'UserName' => $username,
			'Password' => md5($password),
			'IP' 		=>$ip,
			'wsUserName' =>$this->wsUserName,
			'Signature' => md5($username . $ip . $this->wsUserName . $this->wsPassword)
		));
		
		return json_decode($result->CheckLoginResult);
	}
	
	
	function GetUserProfile($username){ 
		$result = $this->client->GetUserProfile(array(  
			'UserName' => $username,  
			'wsUserName' =>$this->wsUserName,
			'Signature' => md5($username . $this->wsUserName . $this->wsPassword)
		));
		
		return json_decode($result->GetUserProfileResult);
	}
	
	function LinkToGame($username, $server,$ip){ 
	
		$uri 	= 'https://id.gosu.vn/game/LinkToGame'; 
		
		$time	=	time();  
		
		$signature = md5($server . $username .  $time . $ip . $this->wsUserName . $this->wsPassword); 
		  
		$uri = $uri . '?server='. $server .'&username=' . $username .'&time='. $time . '&clientIP=' . $ip . '&wsusername=' . $this->wsUserName . '&Signature=' . $signature;    
		$result = @file_get_contents($uri); 
		 
		return $result;
	}
	
	function server_list() { 
		
		//$content = @file_get_contents('/disknet/apache/nk2channeling/public_html/soha.ngao2.gosu.vn/data/text/server_list.txt');
		$content = @file_get_contents(base_url('data/text/server_list.txt'));
		//echo $content;exit;
		$server_list = json_decode($content);
		
		return $server_list ; 
    }
	  
}
?>