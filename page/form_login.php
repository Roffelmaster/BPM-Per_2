<!-- LOGIN.php

FUNCTIES:
- Form met als action de login_controle.php
- Input gebruikersnaam en wachtwoord
- Aantal vereisten aan gebruikersnaam en wachtwoord
- Submit 

-->



	<?php
	
	if(isset($_SESSION["emailadres"])){
	?>
	<table width="80%">
	  <tr>
		<td>Gebruiker:</td>
		<td><?php echo $_SESSION["naam"]; ?></td>
	  </tr>
	  <tr>
		<td>Functie: </td>
	  
	  <td>
	<?php
	
	
	
	
	switch($_SESSION["functie"]) {
		case 1: 
		echo "Employee";
		break;
		case 2: 
		echo "Department manager";
		break;
		case 3: 
		echo "Purchasing department";
		break;
		case 4:
		echo "Logistic employee";
		break;
		case 5:
		echo "Finance employee";
		break;
	}
	?>
	</td>
	</tr>
	</table>
	<?php
	echo "<br><a class='btn btn-success' href='?page=uitloggen'>Uitloggen</a><br><br>";
	?>
	
	
	<?php
	}else{
	?>
	<form method="post" action="?page=login">
	<table>
	<tr><td>Emailadres:</td><td> <input name="emailadres" type="text"  size="15" ></td></tr>
	<tr><td>Wachtwoord: </td><td><input name="wachtwoord" type="password" size="15" maxlength="20"></td></tr>
	</table>
	
	<a href="?page=forgotpass">Wachtwoord vergeten?</a>
	<br><br>
	<input class="btn btn-success" type="submit" name="Submit" value="Inloggen">
	<input class="btn btn-success" name="reset" type="reset" id="reset" value="Leegmaken">
	</form>
	<br>
	<a href="?page=form_register">Maak een account aan</a>
	<?php 
	}
	?>