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
	//convert pokemon json string to array
	$poke_arr_data = json_decode($poke_json_string, true);
	//mysql connection, setup mysql query
	$stmt = dbConnection();
	$name = $image = null;
	$stmt = $stmt->prepare("INSERT INTO Pokemons (name, image) 
							VALUES (?, ?)";
	$stmt -> bind_param("ss", $name, $image);
	foreach($poke_arr_data as $poke_data) {
		//loop through array and add values for mysql table
		$name = $poke_data['name'];
		$image = $poke_data['image'];
		$stmt->execute();
		
		// Load type data into types table
		$last_insert_pokemon_id = mysqli_insert_id($stmt);
		$type1 = $type2 = null;
		$stmt = $stmt->prepare("INSERT INTO Types (type1, type2) 
								VALUES (?, ?)";
		$stmt -> bind_param("tt", $type1, $type2);
		$types_in_poke_data = $poke_data[$name]['types']
		for($x = 0; $x < count($types_in_poke_data); $x++){
			if(isset($types_in_poke_data[$x]))
			{
				$typeData = $types_in_poke_data[$x]->type;
				$typeName = $typeData['name'];
				$type1 = $typeName;
			} else {
				echo "No Data Found";
			}
		}
		// Load stats data into stats table
		//TODO
	}
	// return a boolean for saying if all data is load

}
?>
