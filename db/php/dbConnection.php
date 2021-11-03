<?php

	//Establishes connection to MySQL database
	
	$hostname = 'localhost';
	$user = 'testUser';
	$password = '12345';
	$db = 'it490';

	function dbConnection(){
	
		$connection = mysqli_connect($hostname,$user,$password,$db);

		if(!$connection){
			echo "Error connecting to database: ".$connection->connect_errno.PHP_EOL;
			exit(1);
		}

		echo "Connection established to database".PHP_EOL;
		return $connection;
	}

?>
