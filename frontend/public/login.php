

<!DOCTYPE html>
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
 					<form role="form" method="post" action="register.php">
						<fieldset>							
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
								<div class="form-group">
								<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Password2">
							</div>
							<div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you're agree to our policy & terms
								</label>
							  </div>
 							<div>
 									  <input type="submit" class="btn btn-lg btn-primary   value="Register">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form role="form">
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="email" name="username" id="username_login" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password_login" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<button type="button" class="btn btn-md" onclick="validateLogin()" id = "loginButtonId">Login</button>
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

	<script type="text/javascript" src="./js/scripts.js"></script>

	</body> 
</html>