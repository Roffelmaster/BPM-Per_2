
		<?php
		$query = 	"SELECT * FROM leverancier";
		$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
		
		?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Overzicht leveranciers
				</div>
				<div class="card-body">
	<table width="100%">
  <tr>
    <th>ID</th>
    <th>Naam</th>
	<th>Adres</th>
	<th>Telefoonnummer</th>
	<th>Bewerken</th>
	
  </tr>
  
	<?php
	while($row = mysqli_fetch_assoc($result)){
	?>

	  <tr>
		<td><?php echo $row['idleverancier'];?></td>
		<td><?php echo $row['naam'];?></td>
		<td><?php echo $row['adres'];?></td>
		<td><?php echo $row['telefoonnummer'] ;?> </td>
		<td><a href="?page=leverancier_delete&id=<?php echo $row['idleverancier'];?>"><button>X</button> <a href="?page=leverancier_bewerk&id=<?php echo $row['idleverancier'];?>"><button>bewerk</button></a></td>
		
		
	</tr>


	<?php

	}

	?>

	</table>
	</div>
	</div>
</div>
<div class="col-lg-9" style="margin-left: 252px;">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Leverancier toevoegen
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=leverancier_toevoegen">
	<fieldset>
		<legend></legend>
		<table>
			<tr><td>Bedrijfsnaam:*</td><td>			<input name="naam" type="text" size="40" maxlength="60" ></td></tr>
			<tr><td>Adres:*</td><td>	<input name="adres" placeholder="Straat 00, 9999 AA, Plaats"type="text" size="40" maxlength="60" </td></tr>
			<tr><td>Telefoonnummer: *</td><td>	<input name="telefoonnummer" type="number" size="40" maxlength="25" ></td></tr>
	
			
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Leverancier toevoegen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>



	