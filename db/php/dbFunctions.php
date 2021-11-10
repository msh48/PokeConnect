<?php
require_once('../rabbitmqphp_example/path.inc');
require_once('../rabbitmqphp_example/get_host_info.inc');
require_once('../rabbitmqphp_example/rabbitMQLib.inc');
require_once('rabbitMQClient.php');
require_once('dbConnection.php');
require_once('../event_logging/event_logger.php');

error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('log_errors', 'On');

//user login
function login($username, $password){
	
	$connection = dbConnection();

	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = $connection->query($query);

	if($result){
		if($result->num_rows == 0){
			echo("No users in table.");
			$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: this user does not exist: $username" . "\n";
	                log_event($event);
			return false;
		}
		else {
			while($row = $result->fetch_assoc()){
				$salt = $row['salt'];
				$h_password = generateHash($password,$salt);
				if ($row['h_password'] == $h_password){
					echo "User Authenicated".PHP_EOL;
					return true;
				}
				else{
					$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ] " . "ERROR: Username & Password do not match" . "\n";
			                log_event($event);
					return false;
				}
			}
		}
	}
}

//registers a new user
function  register($username, $password, $email){

	$connection = dbConnection();

	//check username if not taken
	if(!checkUsername($username)){
		echo "Username is taken.".PHP_EOL;
		$event = date("Y-m-d") . "  " . date("h:i:sa") . " [ DB ]  " . "ERROR: trying to register a taken username: $username" . "\n";
		log_event($event);
		return false;
	}

	$salt = generateSalt(29);

	$h_password = generateHash($password,$salt);

	$new_query = "INSERT INTO users (username,email,h_password,salt) VALUES ('$username','$email','$h_password','$salt')";

	$result = $connection->query($new_query);

	return true;	
}

//checks if username is not taken
function checkUsername($username){
	
	$connection = dbConnection();

	$check_query = "SELECT * FROM users WHERE username = '$username'";
	$query_result = $connection->query($check_query);

	if($query_result){
		if($query_result->num_rows == 0){ //username is not taken
			return true;
		}
		else{
			return false;
		}
	}
}

//hashes password to store in the db
function generateHash($password, $salt) {
	$new = $password . $salt;
	$hash = hash('sha256',$new);
	//echo "Hash: " . $hash.PHP_EOL;
	return $hash;
}

//creates a salt for password
function generateSalt($length) {
	$string = '';
	srand((double) microtime(TRUE) * 1000000);

	$chars = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	for($i = 0; $i <= $length; $i++) {
		$rand = rand(0, count($chars) - 1);
		$string .= $chars[$rand];
	}
	
	//echo "Salt: " . $string .PHP_EOL;
	return $string;
}

function loadPokemonData($poke_json_string){
	$checkData = false;
	//convert pokemon json string to array
	$poke_arr_data = json_decode($poke_json_string, true);
	//mysql connection, setup mysql query
	$stmt = dbConnection();
	$name = $image = null;
	$type1 = $type2 = null;
	$stmt = $stmt->prepare("INSERT INTO Pokemons (poke_name, poke_image,type1, type2) 
							VALUES (?, ?, ?,?)");
	$stmt -> bind_param("pppp", $name, $image, $type1, $type2);
	foreach($poke_arr_data as $poke_data) {
		//loop through array and add values for mysql table
		$name = $poke_data['name'];
		$image = $poke_data['image'];
		//Get types to load into pokemon table
		$types_in_poke_data = $poke_data[$name]['types'];
		for($ty = 0; $ty < count($types_in_poke_data); $ty++){
			if(isset($types_in_poke_data[$t]) && !isset($type1)) {
				$typeData = $types_in_poke_data[$ty]->type;
				$typeName = $typeData['name'];
				$type1 = $typeName;
			} elseif (isset($type1)) {
				$typeData = $types_in_poke_data[$ty]->type;
				$typeName = $typeData['name'];
				$type2 = $typeName;
			} else {
				echo "Error in load type data";
			} 
		}
		if ($stmt->execute()) { 
			$checkData = true;
		} else {
			echo "Error on add data to pokemon table";
		}
		$last_insert_pokemon_id = mysqli_insert_id($stmt);
		// Load stats data into stats table
		$stats = array(null,null,null,null,null,null);
		$stmt_stats = $stmt->prepare("INSERT INTO Stats (pokemon_id, HP, Attack, Defense, SpAttack, SpDefense, Speed) 
								VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt_stats -> bind_param(
			"sssssss", 
			$last_insert_pokemon_id,  
			$stats[0], 
			$stats[1],  
			$stats[2],
			$stats[3],
			$stats[4],
			$stats[5]);
		$stats_in_poke_data = $poke_data['stats'];
		for($st = 0; $st < count($stats_in_poke_data); $st++) {
			$st_data = $stats_in_poke_data[$st];
			$stats[$st] = $st_data['base_stat'];
		}
		if ($stmt_stats->excute()) { 
			$checkData = true;
		} else {
			echo "Error on add stats to stats table";
		}
		
	}
	// return a boolean for saying if all data is load
	return $checkData;
}
?>
