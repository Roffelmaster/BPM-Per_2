<!-- bestelde_producten.PHP

FUNCTIES:
- bestelde producten inzien


-->
<?php
include 'inc/db_connect.php';
	$query = 	"SELECT * FROM facturen
				WHERE gebruikers_idgebruikers = '" . $_SESSION['idgebruikers'] ."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	
?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Overzicht bestelde producten
				</div>
				<div class="card-body">
				


<table width="100%">
  <tr>
    <th>BestelID</th>
    <th>Besteldatum</th>
	<th>ProductID</th>
	<th>Totaalprijs</th>
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idfacturen'];?></td>
	<td><?php echo $row['datum'];?></td>
	<td><?php echo $row['producten_idproducten'];?></td>
	<td><?php echo $row['prijs'];?></td>
	
</tr>


<?php

}

?>

</table>
 
				</div>
	</div>
</div>	