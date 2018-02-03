<?php
include 'inc/db_connect.php';
	$query = 	"SELECT * FROM facturen, producten, bestelregel
				WHERE bestelregel.producten_idproducten = producten_idproducten AND
				bestelregel.producten_idproducten = producten.idproducten 
";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	
?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Goedkeuring van bestelling
				</div>
				<div class="card-body">
				


<table width="100%">
  <tr>
    <th>BestellingID</th>
    <th>Besteld door</th>
	<th>Productnaam</th>
	<th>Aantal</th>
	<th>Totaalprijs</th>
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idfacturen'];?></td>
	<td>naam</td>
	<td><?php echo $row['naam'];?></td>
	<td><?php echo $row['aantal'];?></td>
	<td>&euro; <?php echo $row['prijs'] * $row['aantal'];?>,00</td>
	
</tr>


<?php

}

?>

</table>
 
				</div>
	</div>
</div>