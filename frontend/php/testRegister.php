<?php
//connect this to the html
//make the email, password and username actually take user input
//in the if($response==1) program the success case in for the html
//the other logregister file has an example
require_once('rabbitMQClient.php');
$password = $POST_['password'];
$username = $POST_['username'];
$request = array();
$request['type'] = "register";
$request['username'] = $username;
$request['password'] = $password;
$response = createClientForDb($request);
if($response == 1) {
	echo "registered";
}
else{
	echo "this did not work"	
}
echo $response;
return $response;
?>
