function sendLogin(username, password){
	http = new XMLHttpRequest();
	http.onreadystatechange = function{
		if(this.readyState == 4 && this.status == 200){
//get username and password elements from html and make		
		}
	}
	http.open("GET", "../php/phpFunctions.php?type=Login&username=" + username + "&password=" + password);
	http.send(null);
}
