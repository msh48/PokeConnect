function validateLogin(){
    
    var username = document.getElementById('loginUsername').value;
    var password = document.getElementById('loginPassword').value;

    sendLoginCredentials(username, password);
}

function sendLoginCredentials(username, password){
    
    var http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            location.href = "boothomepage.html"
        }else{

            document.getElementById("loginButtonId").innerHTML = "Loading";
        }
    };
    http.open("GET", "../php/testLogin.php?username=" + username + "&password=" + password);
    http.send();
}
