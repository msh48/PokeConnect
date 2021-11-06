#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');

/* error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('log_errors', 'On');
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt'); */

/*function logAndSendErrors(){
	$file = fopen("/../logging/log.txt", "r");
	$errorArray = [];
	while(!feof($file)){
		array_push($errorArray, fgets($file));
	}
	fclose($file);

	$request = array();
	$request['type'] = "db";
	$request['error_string'] = $errorArray;
	$returnedValue = createClientForRmq($request);
	
	$fp = fopen("/../logging/logHistory.txt", "a");
	for($i = 0; $i < count($errorArray); $i++){
		fwrite($fp, $errorArray[$i]);
	}

	file_put_contents("/../logging/log.txt", "");
}*/
$request = array();
$request['type'] = "Pokemon";
$request['Pokemon'] = "All";
//$response = $client->send_request($request);

$pokemon = createClientForDmz($request);
$manage = json_decode($pokemon, true);
$h = $manage["grookey"]["types"];
echo $h.PHP_EOL;
