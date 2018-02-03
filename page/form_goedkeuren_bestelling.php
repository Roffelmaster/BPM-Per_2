<?php 
if(isset($_SESSION['naam'])){
?>
<?php
include 'inc/db_connect.php';
	$query = 	"SELECT * FROM facturen, producten, bestelregel, gebruikers WHERE bestelregel.producten_idproducten = producten.idproducten AND facturen.gebruikers_idgebruikers = gebruikers.idgebruikers AND facturen.goedgekeurd = '0' AND bestelregel.facturen_idfacturen = facturen.idfacturen";
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
	<th>Akkoord?</th>
	
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idfacturen'];?></td>
	<td><?php echo $row['naam']; ?></td>
	<td><?php echo $row['productnaam'];?></td>
	<td><?php echo $row['aantal'];?></td>
	<td>&euro; <?php echo $row['prijs'] * $row['aantal'];?>,00</td>
	<td>
	<a href="?page=goedkeuren&factuur=<?php echo $row['idfacturen'];?>"><button>Akkoord</button></a>
	</td>
</tr>


<?php

}

?>

</table>
 
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