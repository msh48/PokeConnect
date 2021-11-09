<?php
require_once('../event_logging/event_logger.php');
require_once('rabbitMQClient.php');

$hostname = 'localhost';
$user = 'testuser';
$password = '12345';
$db = 'it490';
$table_name_users = 'users';
$table_name_pokemon = 'pokemon';

echo "Database & Table Generation Start".PHP_EOL;

// Create connection
$connection = new mysqli($hostname,$user,$password);

if(!$connection){
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: mysqli connection failure: " . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
        die("Mysqli Connection Failure: " . $connection->connect_error.PHP_EOL);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".$db;
if ($connection->query($sql) === TRUE) {
  echo "Database ".$db." created successfully".PHP_EOL;
} else {
        $event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: database creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
	//log_event($event);
	die("Database Creation Failure: " . $connection->connect_error.PHP_EOL);
}

$connection-> select_db($sql);

$query = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_users." (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) NOT NULL,email VARCHAR(50) NOT NULL,h_password VARCHAR(64) NOT NULL,salt VARCHAR(30) NOT NULL,created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
    
if ($connection->query($query) === TRUE) {
    echo "Table ".$table_name_users." created successfully";
} else {
	echo "Error creating table: " . $connection->error;
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: users table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);

}
echo PHP_EOL;

$query2 = "CREATE TABLE IF NOT EXISTS ".$db.".".$table_name_pokemon." (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50) NOT NULL, type1 VARCHAR(50) NOT NULL,type2 VARCHAR(50))";

if ($connection->query($query2) === TRUE) {
    echo "Table ".$table_name_pokemon." created successfully";
} else {
    echo "Error creating table: " . $connection->error;
	$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: pokemon table creation failure:" . $connection->connect_errno.PHP_EOL . "\n";
        //log_event($event);
}
echo PHP_EOL;

$connection->close();

?>
