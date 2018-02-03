<?php 
if(isset($_SESSION['naam'])){
?>
<?php
include 'inc/db_connect.php';
	$query = 	"SELECT * FROM producten, leverancier WHERE producten.leverancier_idleverancier = leverancier.idleverancier";
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
    <th>Product ID</th>
    <th>Productnaam</th>
	<th>Omschrijving</th>
	<th>Prijs per stuk</th>
	<th>Leverancier</th>
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idproducten'];?></td>
	<td><?php echo $row['productnaam'];?></td>
	<td><?php echo $row['omschrijving'];?></td>
	<td>&euro; <?php echo $row['prijs']?>,00</td>
	<td><?php echo $row['naam']?></td>
	
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
				  Product bestellen
				</div>
				<div class="card-body">
				<form method="post" action="?page=bestellen" id="1">
				<table width="50%">
				<tr><td>Selecteer product:</td>
				<td><select name="product" form="1">
				
				<?php
				$query = 	"SELECT * FROM producten, leverancier WHERE producten.leverancier_idleverancier = leverancier.idleverancier";
				$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
				while($row = mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['idproducten'] ?>"><?php echo $row['productnaam'] ?></option>
				<?php

				}

				?>
				
				</select></td>				
				</tr>
				<tr>
					<td>Aantal: </td>
					<td><input type="number" name="aantal"></td>
				</tr>	
				</table><br>
				<input type="submit" name="submit" value="Product bestellen">
				
				</form>



 
				</div>
	</div>
</div>	
<?php

}else{
?>
<div class="col-lg-9" >
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				Niet ingelogd
				</div>
				<div class="card-body">
				Je moet ingelogd zijn om deze pagina te kunnen bekijken!
				
				</div>
	</div>			
				 
</div>
<?php
}

?>