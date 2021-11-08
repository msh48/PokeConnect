<?php
ini_set('display_errors', 1);
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');

/*if(isset($_POST["login"])) {
    
    $username = null;
    $password = null;
    
    if(isset($_POST["username"])){
        $username = $_POST['username'];
    }
    if(isset($_POST["password"])){
        $password = $_POST['password'];
    }
    if($_SESSION == null){
            session_start();
        }
    $request = array();
     $request['type'] = "login";
       $request['username'] = $username;
    $request['password'] = $password;
    $response = createClientForDb($request);
    if($response == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["login"] = true;
        echo "logged in";
    }
    else{
        echo "this did not work";
            session_destroy();
    }
    echo json_encode($response);
    return $response;
} */

if (isset($_POST)) {
	echo "No Post";
	exit(0);
}
switch ($request["type"]){    
case "register":
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["password2"];
    $username = $_POST["username"];
    $isValid = true;
    if ($password != $confirm) {
        echo("Passwords don't match");
        $isValid = false;
    }
    if (!isset($email) || !isset($password) || !isset($confirm) || !isset($username)) {
        $isValid = false;
    }
    if($_SESSION == null){
        session_start();
    }
    $request = array();
    $request['type'] = "register";
    $request['username'] = $username;
    $request['password'] = $password;
    $request['email'] = $email;
    $response = createClientForDb($request);
    if($respone == 1) {
        $_SESSION["username"] = $username;
    $_SESSION["register"] = true;
    echo "registered";
    }
    else{
    echo "this did not work";
        session_destroy();
    }
    echo json_encode($response);
    return $response;
    break;
    
case "login":
    $username = null;
    $password = null;
    
    if(isset($_GET["username"])){
        $username = $_GET['username'];
    }
    if(isset($_GET["password"])){
        $password = $_GET['password'];
    }
    if($_SESSION == null){
            session_start();
    }
    $request = array();
     $request['type'] = "login";
       $request['username'] = $username;
    $request['password'] = $password;
    $response = createClientForDb($request);
    if($response == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["login"] = true;
        echo "logged in";
    }
    else{
        echo "this did not work";
            session_destroy();
    }
    echo json_encode($response);
    return $response;
    break;
}

?>


