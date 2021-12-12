<?php
session_start();
?>
<html lang="en">
<head> 
  <title>PokecConnect</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<script>
function HandleSearchResponse(response){
	var resp = JSON.parse(response);
	var returnCode = parseInt(resp.returnCode);
	if(returnCode == 0){
		//modify the modal here
	}
}

function SendSearch(pokemon){
	var request = new XMLHttpRequest();
	request.open("POST","../php/search.php",true);
	request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	request.onreadystatechange = function(){
	if((this.readyState == 4) && (this.status == 200)){
		HandleSearchResponse(this.responseText);
		}
	}

	request.send("type=search&input=snom");
}
</script>

<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>PokeConnect</h1>
  <p>Where you go to connect and plan your matches!</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="boothomepage.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="account.php">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forums.php">Forums</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teambuilder.php">Team Builder</a>
</li>
    </ul>
  </div>
</nav>
<title>Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" style type="text/css"/>
</head>
<body>
	<div class="container">

<form role="form" method="post" action="../php/search.php">
<input type="text" id="pokemon" class="form control mr-3 mb-2 mb-sm-0" name="pokemon" placeholder="Search for information here"/>
<input type="submit" OnClick='SendSearch(document.getElementById("pokemon").value)' name="search" value="Search" data-toggle="modal" data-target="#mymodal">
</form>
</body>
<!--
<script>
$('form').submit(function(e){
e.preventDefault() // do not submit form
 // do get request
$.get( 'search.php', { q : },function(e){
    // then show the modal first
    $('#mymodal').modal('show');
    // then put the results there
    $('#mymodal:visible .modal-content .modal-body').html(e);
});
});
</script>
-->
<!-- The Modal -->
<div class="container" style="margin-top:90px">
  <div class="row">
    <div class="col-sm-4">
<div class="modal" id="mymodal">
<div class="modal-dialog">
<div class="modal-content">

 <!-- Modal Header -->
 <div class="modal-header">
   <h4 class="modal-title">Information</h4>
   <button type="button" class="close" data-dismiss="modal">&times;</button>
 </div>

 <!-- Modal body -->
 <div class="modal-body">

 </div>

 <!-- Modal footer -->
 <div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 </div>

</div>
</div>
</div>



<!-- this is the code for the username container -->
<!--
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">

      <h2>User Search</h2>
      <h5>Search for a user here:</h5>
        <form class="form-inline" action="/action_page.php">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">@</span>
      </div>
      <input type="text" class="form-control" placeholder="Username">
    </div>
  </form>
-->

</body>
</html>