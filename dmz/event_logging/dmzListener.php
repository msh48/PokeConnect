<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('event_logger.php');

function received_event($event_string)
{
        file_put_contents("log.txt", $event_string, FILE_APPEND);
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  echo $request['type'];
  var_dump($request);
  
  if(!isset($request['type']))
  {
    $event = date("Y-m-d") . "  " . date("h:i:sa") . " [DMZ] " . "ERROR: unsupported message type" . "\n";
    log_event($event);
    return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "event_log":
	    echo "An error has occurred.".PHP_EOL;
	    log_event($request['error_message']);
	    break;

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

echo "Start DMZ Listener".PHP_EOL;

$server = new rabbitMQServer("../rabbitmqphp_example/rabbitMQ_dmz.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>
