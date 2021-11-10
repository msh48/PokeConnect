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
	$link = dbConnection();
	$name = $image = null;
	$type1 = null; 
	$type2 = "";
	$stmt = $link->prepare("INSERT INTO Pokemons (poke_name, poke_image,type1, type2) 
							VALUES (?, ?, ?,?)");
	$stmt -> bind_param("ssss", $name, $image, $type1, $type2);
	foreach($poke_arr_data as $poke_data) {
		if (array_key_exists('error', $poke_data)) { 
			continue; 
		}
		//loop through array and add values for mysql table
		$name = $poke_data['name'];
		$image = $poke_data['image'];
		//Get types to load into pokemon table
		$types_in_poke_data = $poke_data['types'];
		for($ty = 0; $ty < count($types_in_poke_data); $ty++){
			if(isset($types_in_poke_data[$ty]) && !isset($type1)) {
				$typeData = $types_in_poke_data[$ty]['type'];
				$typeName = $typeData['name'];
				$type1 = $typeName;
			} elseif (isset($type1)) {
				$typeData = $types_in_poke_data[$ty]['type'];
				$typeName = $typeData['name'];
				$type2 = $typeName;
			} else {
				echo "Error in load type data".PHP_EOL;
			} 
		}
		if ($stmt->execute()) { 
			$checkData = true;
		} else {
			//echo $name." ".$image." ".$type1." ".$type2.PHP_EOL;
			echo "Error on add data to pokemon table".PHP_EOL;
		}
		$last_insert_pokemon_id = mysqli_insert_id($link);
		// Load stats data into stats table
		$stats = array(null,null,null,null,null,null);
		$stmt_stats = $link->prepare("INSERT INTO Stats (pokemon_id, HP, Attack, Defense, SpAttack, SpDefense, Speed) 
								VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt_stats -> bind_param("iiiiiii", $last_insert_pokemon_id, $stats[0], $stats[1], $stats[2], $stats[3], $stats[4], $stats[5]);
		$stats_in_poke_data = $poke_data['stats'];
		for($st = 0; $st < count($stats_in_poke_data); $st++) {
			$st_data = $stats_in_poke_data[$st];
			$stats[$st] = $st_data['base_stat'];
		}
		if ($stmt_stats->execute()) { 
			$checkData = true;
		} else {
			echo "Error on add stats to stats table".PHP_EOL;
		}
		
	}
	$link->close();
	// return a boolean for saying if all data is load
	return $checkData;
}
function getPokemonData() {
	//mysql connection, setup mysql query
	$link = dbConnection();
	$pokemon_sql_stmt = "SELECT pokemon_id, poke_name, poke_image, type1, type2 FROM Pokemons";
	$result = $link->query($pokemon_sql_stmt);
	//Load Pokemon Data into array
	$pokemonInfoArr = array();
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//load pokemone data into array
			$current_pokemon_id = $row['pokemon_id'];
			$pokemonInfoArr[$current_pokemon_id] = array(
													"name" => $row['poke_name'],
													"image" => $row['poke_image'],
													"types" => array("type1" => $row['type1'],
																	"type2" => $row['type2'])
													);
			$stats_sql_stmt = "SELECT HP, Attack, Defense, SpAttack, SpDefense, Speed FROM Stats WHERE WHERE pokemon_id = '$current_pokemon_id'";
			$stats_result = $link->query($stats_sql_stmt);
			if ($stats_result->num_rows > 0) {
				$stats_row = $stats_result->fetch_assoc();
				$statsArr = array(
								"HP" => $stats_row['HP'],
								"Attack" => $stats_row['Attack'],
								"Defense" => $stats_row['Defense'],
								"SpAttack" => $stats_row['SpAttack'],
								"SpDefense" => $stats_row['SpDefense'],
								"Speed" => $stats_row['Speed']);
				$pokemonInfoArr["stats"] = $statsArr;
			} else {
				echo "0 results for Stats Table".PHP_EOL;
			}

		}
	} else {
		echo "0 results for Pokemons Table".PHP_EOL;
	}
	$pokemonInfoJson = json_encode($pokemonInfoArr);
	return $pokemonInfoJson;
}

?>
