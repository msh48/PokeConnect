<?php

	//Establishes connection to MySQL database

	function dbConnection(){

		$hostname = "localhost";
		$user = "testuser";
		$password = "12345";
		$db = "it490";

		$connection = mysqli_connect($hostname,$user,$password,$db);

		if(!$connection){
			echo "Error connecting to database: ".$connection->connect_errno.PHP_EOL;
			exit(1);
		}

		echo "Connection established to database".PHP_EOL;
		return $connection;
	}

?>
