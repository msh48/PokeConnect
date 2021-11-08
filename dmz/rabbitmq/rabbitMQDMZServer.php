#!/usr/bin/php
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
	echo $request['type'].PHP_EOL;
	var_dump($request);
	if(!isset($request['type'])){
		return array('message'=>"ERROR: Message type is not supported.");
	}
	switch($request['type']){
		case "Pokemon":
			$response_msg = callPy($request['Pokemon']);
			//echo $response_msg.PHP_EOL;
			break;
		default:
			echo "error".PHP_EOL;
			$response_msg = logAndSendErrors();	
			break;
	}
	//echo var_dump($response_msg);
	echo $response_msg;
	return $response_msg;
}

function callPy($py){
	$command = escapeshellcmd('python ../poke_api_etl/app.py ');
	$output = shell_exec($command.$py);
	return $output;
}
echo "Start Server for DMZ".PHP_EOL;
$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_dmz.ini', 'testServer');
$server->process_requests('requestProcessor');
?>
