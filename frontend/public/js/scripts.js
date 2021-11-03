
function validateLogin(){
    
    var loginUsernameNotClean = document.getElementById('username_login').value;
    var loginPasswordNotClean = document.getElementById('password_login').value;
    
    var loginUsername = loginUsernameNotClean.trim();
    var loginPassword = loginPasswordNotClean.trim();

    if (loginUsername != "" && loginPassword != ""){
        //sendLoginCredentials(loginUsername, loginPassword);
        alert("Login fields have be enter");
        sendLoginCredentials(loginUsername, loginPassword);
    }else{
        if(loginUsername == ""){
            turnFieldToRedColorBorder(loginUsername);
        }
        if(loginPassword == ""){
            turnFieldToRedColorBorder(loginPassword);
        }
        if (loginUsername == "" && loginPassword == ""){
            turnFieldToRedColorBorder(loginUsername);
            turnFieldToRedColorBorder(loginPassword);
        }
    }
}

// This function sends a AJAX request for login 
function sendLoginCredentials(username, password){
    
    var httpReq = createRequestObject();
    httpReq.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            
            document.getElementById("loginButtonId").innerHTML = "Login";
            
            if(this.responseText == true){
                //window.location = "../php/searchRestaurant.php";
            }else{
                window.location = "login.html";
            }
            
        }else{
            document.getElementById("loginButtonId").innerHTML = "Loading...";
        }
    }
    httpReq.open("GET", "./php/client.php?type=Login&username=" + username + "&password=" + password);
    httpReq.send(null);
}

//  This function will add is-invalid to the division  
function turnFieldToRedColorBorder(elementName){
    elementName.classList.add("is-invalid");
}