<?php
	$idvoorraad = $_GET['id'];
	$voorraad = $_GET['hoeveelheid'];
	
	$query = 	"SELECT * FROM magazijn, producten WHERE idmagazijn = '".$idvoorraad."' AND magazijn.producten_idproducten = producten.idproducten " ;
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	

?>

<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Voorraad bewerken
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=voorraad_bewerken_">
	<fieldset>
		<legend></legend>
		<table>
		<?php
		while($row = mysqli_fetch_assoc($result)){
		?>	
			<input name="id" type="hidden" value="<?php echo $row['idmagazijn']?>">
			<tr><td>Productnaam:</td><td><?php echo $row['productnaam']?></td></tr>
			<tr><td>Aantal:</td><td>	<input name="aantal" value="<?php echo $voorraad?>" type="text" size="40" maxlength="60" </td></tr>
	
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