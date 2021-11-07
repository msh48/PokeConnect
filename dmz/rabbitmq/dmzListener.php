<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');

function requestProcessor($request){
	echo "Received request".PHP_EOL;
	echo $request['type'];
	var_dump($request);
	if(!isset($request['type'])){
		return array('message'=>"ERROR: Message type is not supported.");
	}
	switch($request['type']){
		case "Pokemon":
			$response_msg = callPy($request['Pokemon']);
			break;
	}
	echo var_dump($response_msg);
	return $response_msg;
}

function callPy($py){
	$command = escapeshellcmd('../poke_api_etl/app.py');
	$output = shell_exec($command "'.$py.'");
	echo $output;
	return $output;
}

$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_db.ini', 'testServer');
$server->process_requests('requestProcessor');
?>
