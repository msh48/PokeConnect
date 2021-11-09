#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('dbFunctions.php');

<<<<<<< HEAD
=======
/* error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('log_errors', 'On');
ini_set('error_log', dirname(__FILE__).'/../logging/log.txt'); */

>>>>>>> 1981b6115e0dd1c88fcaa78b54eda5f3acacbf99
$request = array();
$request['type'] = "Pokemon";
$request['Pokemon'] = "All";
//$response = $client->send_request($request);

<<<<<<< HEAD
$pokemon = createClientForDmz($request);
//$manage = json_decode($pokemon, true);
//$h = $manage["grookey"]["types"];
$typ = gettype($pokemon);
$data = json_decode($pokemon, TRUE);
$typ2 = gettype($data);
echo $typ.PHP_EOL;
echo $typ2.PHP_EOL;
echo $data.PHP_EOL;
?>
=======
$pokemonData = createClientForDmz($request);
echo "Loading Pokemon Data...".PHP_EOL;
$IsPokemonDataLoad = loadPokemonData($pokemonData);
if ($IsPokemonDataLoad){
	echo "Pokemon Data Load!!".PHP_EOL;
} else {
	echo "Error Loading Pokemon Data".PHP_EOL;
}

>>>>>>> 1981b6115e0dd1c88fcaa78b54eda5f3acacbf99
