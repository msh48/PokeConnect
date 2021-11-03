function sendLogin(username, password){
	var http;
//set http to a web request
	http.onreadystatechange = function{
//make this what you want
	}
	http.open("GET", "../php/phpFunctions.php?type=Login&username=" + username + "&password=" + password);
	http.send(null);
}
