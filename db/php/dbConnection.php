<?php
	require_once('../event_logging/event_logger.php');

	//Establishes connection to MySQL database

	function dbConnection(){

		$hostname = "localhost";
		$user = "testuser";
		$password = "12345";
		$db = "it490";

		$connection = mysqli_connect($hostname,$user,$password,$db);

		if(!$connection){
			echo "Error connecting to database: ".$connection->connect_errno.PHP_EOL;
			$event = date("Y-m-d") . "  " . date("h:i:sa") . " --- DataBase --- " . "ERROR: cannot connect to database: " . $connection->connect_errno.PHP_EOL . "\n";
	                log_event($event);
			exit(1);
		}

		//echo "Connection established to database".PHP_EOL;
		return $connection;
	}

?>
