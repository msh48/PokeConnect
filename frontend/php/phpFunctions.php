<?php
error_reporting(E_ALL);
ini_set('display_errors', "Off");
ini_set('log_errors', "On");
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt');

require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');

function login($username, $password){
	if($_SESSION == null){
		session_start();
	}
	$request = array();
	$request['type'] = "Login";
	$request['username'] = $username;
	$request['password'] = $password;

	$response = createClientForDb($request);

	if($response == 1){
		$_SESSION["username"] = $username;
		$_SESSION["login"] = true;
	}else{
		session_destroy();	
	}
	echo $response
	return $response;
}
?>
