<?php
	$idproducten = $_GET['id'];
	
	$query = 	"SELECT * FROM producten, leverancier WHERE idproducten = '".$idproducten."' AND producten.leverancier_idleverancier = leverancier.idleverancier";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	

?>

<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Product bewerken
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=update_producten" id="form1">
	<fieldset>
		<legend></legend>
		<table><?php
	while($row = mysqli_fetch_assoc($result)){
	?>		<input name="id" type="hidden" value="<?php echo $row['idproducten'];?>">
			<tr><td>Productnaam:</td><td>			<input value="<?php echo $row['productnaam'];?>" name="naam" type="text" size="40" maxlength="50" ></td></tr>
			<tr><td>Omschrijving:</td><td>	<input value="<?php echo $row['omschrijving'];?>" name="omschrijving" type="text" size="40" maxlength="100" </td></tr>
			<tr><td>Prijs:</td><td>	<input name="prijs" value="<?php echo $row['prijs'];?>" type="text" size="40" maxlength="25" ></td></tr>
			<tr><td>Leverancier:</td><td><b> <?php echo $row['naam'];?></b> -  <i>niet te bewerken</i> </td></tr>
				
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