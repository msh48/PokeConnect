#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('dbFunctions.php');

/* error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('log_errors', 'On');
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt'); */

$request = array();
$request['type'] = "Pokemon";
$request['Pokemon'] = "All";
//$response = $client->send_request($request);

$pokemonData = createClientForDmz($request);
echo "Loading Pokemon Data...".PHP_EOL;
$IsPokemonDataLoad = loadPokemonData($pokemonData);
if ($IsPokemonDataLoad){
	echo "Pokemon Data Load!!".PHP_EOL;
} else {
	echo "Error Loading Pokemon Data".PHP_EOL;
}

