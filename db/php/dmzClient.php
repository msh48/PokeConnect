#!/usr/bin/php
<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');

$request = array();
$request['type'] = "Pokemon";
$request['Pokemon'] = "All";
//$response = $client->send_request($request);

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
