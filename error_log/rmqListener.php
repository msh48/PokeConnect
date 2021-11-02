<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');

function logError($error, $file){
	$log = fopen($file . 'txt', "a");
	for ($i = 0; $i < count($error); $i++){
		fwrite($log, $error[$i]);
	}
	return true;
}
//file_put_contents(file.txt, error + <br>, FILE_APPEND)

function requestProcessor($request){
	echo "received request".PHP_EOL;
	echo $request['type'];
	var_dump($request);
	if(!isset($request['type'])){
		return array('message'=>"ERROR: Message type is not supported.");
	}
	switch($request['type']){
		case "frontend":
			echo "<br>In Front End: ";
			$response = logError($request['error_string'], 'frontend_errors');
			echo "Result: " . $response;
			break;
		case "dmz":
			echo "<br>In DMZ: ";
			$response = logError($request['error_string'], 'dmz__errors');
			echo "Result: " . $response;
			break;
		case: "db":
			echo "<br>In Database: ";
			$response = logError($request['error_string'], 'db_errors');
			echo "Result: " . $response;
			break;
	}
	echo $response;
	return $response;
}
$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_rmq.ini', 'testServer');
$server->process_requests('requestProcessor');
?>
