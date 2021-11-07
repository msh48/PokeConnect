<?php
error_reporting(E_ALL);

ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt');

require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once("rabbitMQClient.php");

if(session_status() != PHP_SESSION_ACTIVE){
	session_start();
}
$username = $_GET['username'];
$password = $_GET['password'];
$request = array();
$request['type'] = "login";
$request['username'] = $username;
$request['password'] = $password;
$response = createClientForDb($request);
if($response == 1){
	echo "login";
}
else{
	echo "didnt work";
}
echo $response;
return $response;
?>
