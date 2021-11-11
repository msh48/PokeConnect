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

<!-- THIS IS WHERE THE TEAM BUILDING BEINGS --> 
<h1>PokeConnect Team Builder</h1>

<div class="m_content-box">
<form id="m_tb-form" target="_blank">

<h3>Team Input</h3>
<ul id="m_tb-team-input" class="m_tb-team-input">
<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 1</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon1"> <div class="m_tb-pkmn-options">

<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 2</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon2"> <div class="m_tb-pkmn-options">

<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 3</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon3"> <div class="m_tb-pkmn-options">
<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 4</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon4"> <div class="m_tb-pkmn-options">

<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
 <option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 5</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon5"> <div class="m_tb-pkmn-options">

<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
 </div>

<li class="m_tb-pkmn-input">
<div class="m_tb-pkmn-label"><span>Pokémon 6</span>:<div class="m_no-gen-8-text"></div></div> <input type="text" class="m_tb-pkmn-name" value="" name="search_Pokemon6"> <div class="m_tb-pkmn-options">

<select class="m_tb-pkmn-ability">
<option value="" selected disabled>(No Ability)</option>
</select>
<select class="m_tb-pkmn-item">
<option value="" selected disabled>(No Held Item)</option>
</select>
</div>
<div class="m_tb-pkmn-custom-types">
<div class="m_tb-custom-types-label">Custom Type</div>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</div>

</li></li></li></li></li></li></ul>




<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
<select class="m_tb-pkmn-custom-type">
<option value="" selected>---</option>
<option value="normal">Normal</option>
<option value="fire">Fire</option>
<option value="water">Water</option>
<option value="electric">Electric</option>
<option value="grass">Grass</option>
<option value="ice">Ice</option>
<option value="fighting">Fighting</option>
<option value="poison">Poison</option>
<option value="ground">Ground</option>
<option value="flying">Flying</option>
<option value="psychic">Psychic</option>
<option value="bug">Bug</option>
<option value="rock">Rock</option>
<option value="ghost">Ghost</option>
<option value="dragon">Dragon</option>
<option value="dark">Dark</option>
<option value="steel">Steel</option>
<option value="fairy">Fairy</option>
</select>
</form></div>


</div>





<div class="m_content-box m_team-builder-container">
<div class="m_team-builder-container-header">Defensive Coverage</div>
<table id="m_team-builder-table" class="m_team-builder-table">
<thead>
<tr class="m_rowH m_stickproof">
<th class="m_tb-type-header"></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th class="m_tb-weak-header"></th>
<th class="m_tb-resist-header"></th>
</tr>
<tr class="m_rowH">
<th scope="col" class="m_rowH m_tb-type-header">Move<br><i class="m_material-icons">arrow_downward</i></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-weak-header">Total Weak</th>
<th scope="col" class="m_rowH m_tb-resist-header">Total Resist</th>
</tr>
</thead>
<tbody>
<tr class="m_row m_tb-row m_tb-row-normal">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Normal</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fire">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fire</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-water">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Water</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-electric">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Electric</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-grass">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Grass</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ice">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ice</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fighting">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fighting</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-poison">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Poison</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ground">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ground</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-flying">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Flying</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-psychic">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Psychic</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-bug">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Bug</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-rock">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Rock</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-ghost">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ghost</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-dragon">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dragon</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-dark">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dark</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-steel">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Steel</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
<tr class="m_row m_tb-row m_tb-row-fairy">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fairy</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-weak"></td>
<td class="m_tb-total-resist"></td>
</tr>
</tbody>
</table>
</div>
<div class="m_content-box m_team-builder-container m_team-builder-coverage-container">
<div class="m_team-builder-container-header">Offensive Coverage</div>
<table id="m_team-builder-coverage-table" class="m_team-builder-table m_team-builder-coverage-table">
<thead>
<tr class="m_rowH m_stickproof">
<th class="m_tb-type-header"></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th class="m_tb-not-very-effective-header"></th>
<th class="m_tb-super-effective-header"></th>
</tr>
<tr class="m_rowH">
<th scope="col" class="m_rowH m_tb-type-header">Enemy<br><i class="m_material-icons">arrow_downward</i></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-pokemon"></th>
<th scope="col" class="m_rowH m_tb-not-very-effective-header">Not Very Effective</th>
<th scope="col" class="m_rowH m_tb-super-effective-header">Super Effective</th>
</tr>
</thead>
<tbody>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-normal">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Normal</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fire">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fire</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-water">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Water</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-electric">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Electric</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-grass">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Grass</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ice">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ice</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fighting">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fighting</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-poison">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Poison</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ground">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ground</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-flying">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Flying</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-psychic">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Psychic</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-bug">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Bug</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-rock">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Rock</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-ghost">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Ghost</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-dragon">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dragon</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-dark">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Dark</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-steel">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Steel</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
<tr class="m_row m_tb-row m_tb-coverage-row m_tb-row-fairy">
<th scope="row" class="m_rowH"><span class="m_tb-type-icon">Fairy</span></th>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="m_tb-total-not-very-effective"></td>
<td class="m_tb-total-super-effective"></td>
</tr>
</tbody>
</table>
</div>
<div class="m_content-box">
<form id="m_tb-save-load-form" target="_blank">
<h3>Save Team</h3>
<div class="m_tb-options" id="m_tb-save-load-share">
<div id="m_tb-load-team-row" class="m_tb-options-row">

<div id="m_tb-save-team-row" class="m_tb-options-row">
<div class="m_tb-options-label">Save Your Current Team</div>
<div class="m_tb-options-value">
<button id="m_tb-save-team" type="button">Save Team</button>
</div>



<u></u>
<u></u>
<u></u>
<u></u>







    </div>
</div>
</div>
</form>
</div>
</body>
</html>


