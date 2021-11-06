function validateLogin(){
    
    var loginUsernameNotClean = document.getElementById('loginUsername').value;
    var loginPasswordNotClean = document.getElementById('loginPassword').value;
    
    var loginUsername = loginUsernameNotClean.trim();
    var loginPassword = loginPasswordNotClean.trim();

    if (loginUsername != "" && loginPassword != ""){
        //sendLoginCredentials(loginUsername, loginPassword);
        //alert("Login fields have be entered");
        sendLoginCredentials(loginUsername, loginPassword);
    }else{
        if(loginUsername == ""){
            turnFieldToRedColorBorder(loginUsername);
            alert("Login fields have be entered");
        }
        if(loginPassword == ""){
            turnFieldToRedColorBorder(loginPassword);
            alert("Login fields have be entered");
        }
        if (loginUsername == "" && loginPassword == ""){
            turnFieldToRedColorBorder(loginUsername);
            turnFieldToRedColorBorder(loginPassword);
            alert("Login fields have be entered");
        }
    }
}

// This function sends a AJAX request for login 
function sendLoginCredentials(username, password){
    
    var httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            document.getElementById("loginButtonId").innerHTML = "Login";
            location.href = "boothomepage.html"
        }else{

            document.getElementById("loginButtonId").innerHTML = "Loading...";
        }
    };
    httpReq.open("GET", "testLogin.php?username=" + username + "&password=" + password, true);
    httpReq.send();
}

//  This function will add is-invalid to the division  
function turnFieldToRedColorBorder(elementName){
    elementName.classList.add("is-invalid");
}