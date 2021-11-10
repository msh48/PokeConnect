#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('event_logger.php');
require_once('../php/dbFunctions.php');
function received_event($event_string)
{
        file_put_contents("log.txt", $event_string, FILE_APPEND);
}

function requestProcessor($request){
	echo "Received request".PHP_EOL;
	echo $request['type'];
	var_dump($request);
	
	if(!isset($request['type'])){
		$event = date("Y-m-d") . "  " . date("h:i:sa") . " [DB] " . "ERROR: unsupported message type" . "\n";
    		log_event($event);
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
		case "event_log":
		      	echo "An error occurred.".PHP_EOL;
			received_event($request['error_message']);
			break;
		case "search":
			echo "Requesting a search.".PHP_EOL;
			$response_msg = search($request['input']);
			break;
		default:
			echo "default case";	
			break;
	}
	echo $response_msg;
	return $response_msg;
}
echo "Start Database Server".PHP_EOL;
$server = new rabbitMQServer('../rabbitmqphp_example/rabbitMQ_db.ini', 'testServer');
$server->process_requests('requestProcessor');
exit(0);
?>
