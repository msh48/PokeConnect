<?php
session_start();
?>
<html>
	<html lang="en">
		<head>
			<meta http-equiv="content-type" content="text/html; charset= utf-8">
		</head>

<script>

function HandleRegisterResponse(response)
{

        var resp = JSON.parse(response);
        var returnCode = parseInt(resp.returnCode);
        if (returnCode == 0){
                document.getElementById("regResponse").innerHTML = "Registration successful!";
        }
        else{
                document.getElementById("regResponse").innerHTML = "Registration failed, try again...";
        }
        //document.getElementById("loginResponse").innerHTML = "Login Failed. Try again.";
}


function HandleLoginResponse(response)
{

	var resp = JSON.parse(response);
	var returnCode = parseInt(resp.returnCode);
	if (returnCode == 0){
		document.getElementById("loginResponse").innerHTML = "Login successful!";
	}
	else{
		document.getElementById("loginResponse").innerHTML = "Login failed, try again...";	
	}
	//document.getElementById("loginResponse").innerHTML = "Login Failed. Try again.";
}

function SendLoginRequest(username,password)
{
	//document.getElementById("textResponse").innerHTML = "response: "+this.responseText  +"<p>";	
	var request = new XMLHttpRequest();

	request.open("POST","../php/login.php", true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
	//request.open("GET", "../php/loginReg.php?type=login&username=" + username + "&password=" + password, true);

	request.onreadystatechange= function ()
	{

		if ((this.readyState == 4)&&(this.status == 200))
		{
			//console.log(this.responseText);
			HandleLoginResponse(this.responseText);
		}		
	}
	//request.send(null);
	request.send("type=login&username="+username+"&password="+password);
}

function SendRegisterRequest(username, email, password, password2)
{
        //document.getElementById("textResponse").innerHTML = "response: "+this.responseText  +"<p>";
        var request = new XMLHttpRequest();

        request.open("POST","../php/register.php",true);
        request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        request.onreadystatechange= function ()
        {

                if ((this.readyState == 4)&&(this.status == 200))
                {
                        HandleRegisterResponse(this.responseText);
                }
        }
        request.send("type=register&username="+username+"&email="+email+"&password="+password+"&password2="+password2);
}

</script>
<html lang="en">

	<title>Sign up For PokeConnect</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<head>
		<script src="jquery/jquery.min.js"></script>
		<!---- jquery link local dont forget to place this in first than other script or link or may not work ---->
		
		<link rel="stylesheet" href="style.css">
		<!---- boostrap.min link local ----->
		
		<link rel="stylesheet" href="style.css">
		<!---- boostrap.min link local ----->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
		<!---- Boostrap js link local ----->
		
		<link rel="icon" href="images/icon.png" type="image/x-icon" />
		<!---- Icon link local ----->
		
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<!---- Font awesom link local ----->
	</head>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">PokeConnect</h2>
			 <p class="text-center">
				<small id="passwordHelpInline" class="text-muted"> 
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
				
					<form role="form" method="post" action="../php/register.php" > 
					
					<form role="form" method="post" >
							
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="username" id="registerUsername" class="form-control input-lg" placeholder="username">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="registerPassword" class="form-control input-lg" placeholder="Password">
							</div>
								<div class="form-group">
								<input type="password" name="password2" id="registerPassword2" class="form-control input-lg" placeholder="Password2">
							</div>
							<div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you are agreeing to our policy & terms
								</label>
							  </div>
 							<div>
 									  <button type="submit" class="btn btn-md" OnClick='SendRegisterRequest(document.getElementById("registerUsername").value, document.getElementById("email").value, document.getElementById("registerPassword").value, document.getElementById("registerPassword2").value)' id = "registerButtonId">Register</button>
 							</div>

							<div id="regResponse">
								Awaiting Response...
							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form role="form" method="post" action="../php/login.php" >
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="username" name="username" id="loginUsername" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="loginPassword" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<button type="submit" class="btn btn-md" OnClick='SendLoginRequest(document.getElementById("loginUsername").value, document.getElementById("loginPassword").value)' id = "loginButtonId">Login</button>
							</div>
								 <div id="loginResponse">
									Awaiting Response...
								 </div>
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
		<p class="text-center">
			<small id="passwordHelpInline" class="text-muted"> 
		</p>
	</div>

	<script type="text/javascript" src="js/scripts.js"></script>

	</body> 
</html>