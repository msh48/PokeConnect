<?php

 //  Variable for type
 $type = $_GET["type"];

 //  Switch case is executed depending on the type of request
 switch ($type) {
         
    case "Login":                                       
         
        $username = $_GET["username"];
        $password = $_GET["password"];
         
        $response = login($username, $password);
        echo $response;
        break;

    default:
        return "This is the Default case.";
}

function login($username, $password){
        
        $request = array();
        
        $request['type'] = "Login";
        $request['username'] = $username;
        $request['password'] = $password;

        // Send requests to rabbitMQ For Database
        $returnedValue = rabbitMQClient($request);
        
        if($returnedValue == 1){
            $_SESSION["username"] = $username;
            $_SESSION["logged"] = true;
        }else{
            //session_destroy();
        }
       
        return $returnedValue;
}

?>