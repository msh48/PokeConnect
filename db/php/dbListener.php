#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('dbFunctions.php');

error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt');

function requestProcessor($request){
	echo "Received request".PHP_EOL;
	echo $request['type'];
	var_dump($request);
	if(!isset($request['type'])){
		return array('message'=>"ERROR: Message type is not supported");
	}
	switch($request['type']){
		case "login":
			echo "Requesting to Login".PHP_EOL;
			$response_msg = login($request['username'],$request['password']);
			break;
		case "register":
			echo "Requesting to register".PHP_EOL;
			$response_msg = register($request['username'],$request['password'], $request['email']);
			break;
		default:
			echo "error".PHP_EOL;
			$response_msg = logAndSendErrors();	
			break;
	}
	echo $response_msg;
	return $response_msg;
}
echo "Start Database Server".PHP_EOL;
$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_db.ini', 'testServer');
$server->process_requests('requestProcessor');
?>
