<?php
	$idleverancier = $_GET['id'];
	
	$query = 	"SELECT * FROM leverancier WHERE idleverancier = '".$idleverancier."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	

?>

<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Leverancier bewerken
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=leverancier_updaten">
	<fieldset>
		<legend></legend>
		<table>
		<?php
		while($row = mysqli_fetch_assoc($result)){
		?>	
			<input name="id" type="hidden" value="<?php echo $row['idleverancier']?>">
			<tr><td>Bedrijfsnaam:*</td><td>			<input name="naam" value="<?php echo $row['naam']?>" type="text" size="40" maxlength="60" ></td></tr>
			<tr><td>Adres:*</td><td>	<input name="adres" value="<?php echo $row['adres']?>" type="text" size="40" maxlength="60" </td></tr>
			<tr><td>Telefoonnummer: *</td><td>	<input name="telefoonnummer" type="number" value="<?php echo $row['telefoonnummer']?>" size="40" maxlength="25" ></td></tr>
	
		<?php
		}
		
		?>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Bewerkingen opslaan">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>
