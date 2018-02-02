<!-- FORM_REGISTER.PHP

FUNCTIES:
- Account aan kunnen maken
- Gegevens worden in de database gezet
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->
<?php
include 'inc/db_connect.php';


	
	$query = 	"SELECT * FROM functies";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	
?>

<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Account aanmaken
				</div>
				<div class="card-body">
				 

	<form id="form" method="post" action="?page=register">
	<fieldset>
		<legend>Persoonlijke informatie: </legend>
		<table>
			<tr><td>Naam:*</td><td>			<input name="naam" type="text" size="40" maxlength="20" required></td></tr>
		</table>
	</fieldset>	
	<fieldset>
		<table>
			<legend>Accountgegevens:</legend>
			<tr><td>Emailadres:*</td><td>	<input name="emailadres" type="text" placeholder="voorbeeld@voorbeeld.com" size="40" maxlength="40" required></td></tr>
			<tr><td>Wachtwoord:*</td><td>	<input name="wachtwoord" type="password"  size="40" maxlength="20" required></td></tr>
			<tr><td>Functie:* </td><td>
			<select name="functie" form="form">
				<?php
				while($row = mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['idfuncties'];?>"><?php echo $row['naam'];?></option>
				<?php

}

?>
			</select>
			
			</td>
			
		</table>
	</fieldset>	
	<br>


		<input type="submit" name="submit" value="Registreren">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>	
