<?php
require_once(rabbitMQClient.php);
if (isset($_POST["register"])) {
    $email = null;
    $password = null;
    $confirm = null;
    $username = null;
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
    if (isset($_POST["password2"])) {
        $confirm = $_POST["password2"];
    }
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
    }
    $isValid = true;
    //check if passwords match on the server side
    if ($password == $confirm) {
        //not necessary to show
        //echo "Passwords match <br>";
    }
    else {
        echo("Passwords don't match");
        $isValid = false;
    }
    if (!isset($email) || !isset($password) || !isset($confirm)) {
        $isValid = false;
    }
    //TODO other validation as desired, remember this is the last line of defense
    if ($isValid) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
    if($_SESSION == null){
    	session_start();
    }
    $request = array();
    $request['type'] = "Login";
    $request['username'] = $username;
    $request['password'] = $password;
    $request['email'] = $email;
    $response = createClientForDb($request);
    if($respone == 1) {
    	$_SESSION["username"] = $username;
	$_SESSION["login"] = true;
    }
    else{
    	session_destroy();
    }
    echo $response;
    return $respone;
    }
?>
