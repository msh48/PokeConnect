<?php
require_once("rabbitMQClient.php");
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$request = array();
$request['type'] = "login";
$request['username'] = $username;
$request['password'] = $password;
$response = createClientForDb($request);
if($response == 1){
	echo "login";
}
else{
	echo "didnt work";
}
?>