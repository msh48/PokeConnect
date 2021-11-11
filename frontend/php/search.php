<?php
ini_set('display_errors', 1);
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');

if (!isset($_POST)) {
	echo "No Post";
	exit(0);
}

$type = $_POST["type"];
switch ($type){    
case "search":

    /*$isValid = true;
    if ($password != $confirm) {
        echo("Passwords don't match");
        $isValid = false;
    }
    if (!isset($email) || !isset($password) || !isset($confirm) || !isset($username)) {
        $isValid = false;
    }*/
    if($_SESSION == null){
        session_start();
    }
    $request = array();
    $request['type'] = "search";
    $request['input'] = $_POST["pokemon"];
    $response = createClientForDb($request);
    if($response == 1) {
        $_SESSION["input"] = $_POST["pokemon"];
    echo "searched";
    }
    else{
    echo "this did not work";
        session_destroy();
    }
    echo json_encode($response);
    //$jsonresp = json_encode($response);
    //return  $jsonresp;
    exit(0);
    break;
}
?>
