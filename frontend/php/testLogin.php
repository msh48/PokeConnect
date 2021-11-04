<?php
require_once("rabbitMQClient.php");
$username = "test";
$password = "test";
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
echo $response;
return $response;
?>
