<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('../event_logging/event_logger.php');

$client = new rabbitMQClient("../rabbitmqphp_example/rabbitMQ_db.ini","testServer");

$request = array();
$request['type'] = "login";
$request['username'] = $_POST["username"];
$request['password'] = $_POST["password"];
$response = $client->send_request($request);

if($response == 1){
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "SUCCESS: login successful using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
        log_event($event);
        /*$user = $_POST['username'];
        $email = $_POST['email'];
        $output = shell_exec("python3 emailscript.py $usr $email");*/
        header("Location: www.testpoke.com/frontend/html/boothomepage.html");
        exit();
} else {
        $error = date("Y-m-d") . "  " . date("h:i:sa") . " [ FE ] " . "ERROR: failed to login using Username = " . $_POST["username"] . " and Password = " . $_POST["password"] . "\n";
        log_event($error);
        //session_destroy();
        header("Location: www.testpoke.com/frontend/html/login_failure.html");
        exit();
}

//session_destroy();
exit(0);
}
