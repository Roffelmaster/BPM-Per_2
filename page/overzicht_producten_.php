<?php
	include 'inc/db_connect.php';
	
	

		$query = 	"SELECT * FROM producten";
		$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
		
		?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Overzicht producten
				</div>
				<div class="card-body">
	<table width="100%">
  <tr>
    <th>ID</th>
    <th>Naam</th>
	<th>Omschrijving</th>
	<th>Prijs per stuk</th>
	<th>Bewerken</th>
	
  </tr>
  
	<?php
	while($row = mysqli_fetch_assoc($result)){
	?>

	  <tr>
		<td><?php echo $row['idproducten'];?></td>
		<td><?php echo $row['productnaam'];?></td>
		<td><?php echo $row['omschrijving'];?></td>
		<td>&euro; <?php echo $row['prijs'];?>,00</td>
		
		<td><a href="?page=product_delete&id=<?php echo $row['idproducten'];?>"><button>X</button> <a href="?page=product_bewerk&id=<?php echo $row['idproducten'];?>"><button>bewerk</button></a></td>
		
		
	</tr>


	<?php

	}

	?>

	</table>
	</div>
	</div>
</div>
<?php
	include 'inc/db_connect.php';
	
	

		$query = 	"SELECT * FROM leverancier";
		$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
		
		?>
<div class="col-lg-9" style="margin-left: 252px;">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Product toevoegen
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=product_toevoegen" id="form1">
	<fieldset>
		<legend></legend>
		<table>
			<tr><td>Productnaam:</td><td>			<input name="naam" type="text" size="40" maxlength="50" ></td></tr>
			<tr><td>Omschrijving:</td><td>	<input name="omschrijving" type="text" size="40" maxlength="100" </td></tr>
			<tr><td>Prijs</td><td>	<input name="prijs" type="text" size="40" maxlength="25" ></td></tr>
			<tr><td>Leverancier</td><td>
			<select name="leverancier" form="form1">
			<?php
				while($row = mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['idleverancier'];?>"><?php echo $row['naam'];?></option>
				
				<?php 
				}
				?>
			</select></td>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Product toevoegen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>