<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');

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
		case "Login":
			echo "login";
			$response_msg = login($request['username'],$request['password'],$request['email']);
			break;
		default:
			echo "error"
			$response_msg = logAndSendErrors();	
	}
}
$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_db.ini', 'testServer');
$server->process_requests('requestProcessor');
?>
