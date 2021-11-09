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
  
  var_dump($request);
  
  if(!isset($request['type']))
  {
    $event = date("Y-m-d") . "  " . date("h:i:sa") . " --- Frontend --- " . "ERROR: unsupported message type" . "\n";
    log_event($event);
    return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "event_log":
	    echo "An error has occurred.".PHP_EOL;
	    received_event($request['error_message']);
	    break;
  }
  
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

echo "Start Frontend Listener".PHP_EOL;

$server = new rabbitMQServer("../rabbitmqphp_example/rabbitMQ_fe.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>
