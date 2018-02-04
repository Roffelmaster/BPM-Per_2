<!-- bestelde_producten.PHP

FUNCTIES:
- bestelde producten inzien


-->
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	padding-left: 100px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<?php 
if(isset($_SESSION['naam'])){

?>

	<?php
	include 'inc/db_connect.php';
		$query = 	"SELECT * FROM bestelregel, facturen, producten
					WHERE gebruikers_idgebruikers = '" . $_SESSION['idgebruikers'] ."'
					AND producten_idproducten = producten.idproducten AND bestelregel.facturen_idfacturen = facturen.idfacturen;";
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
		<th>Productnaam</th>
		<th>Aantal</th>
		<th>Totaalprijs</th>
		<th>Status</th>
	  </tr>
	  
	  <?php
	while($row = mysqli_fetch_assoc($result)){
	?>

	  <tr>
		<td><?php echo $row['idfacturen'];?></td>
		<td><?php echo $row['datum'];?></td>
		<td><?php echo $row['productnaam'];?></td>
		<td><?php echo $row['aantal'];?></td>
		<td>&euro; <?php echo $row['prijs'] * $row['aantal'];?>,00</td>
		<td><?php 
		if($row['goedgekeurd'] == 1){
		echo "Goedgekeurd";
		}elseif($row['goedgekeurd'] == 2){
		echo "Afgekeurd";
		}elseif($row['goedgekeurd'] == 3){
		echo "Verzonden";
		}else{
		echo "Wacht op keuren";
		}
		?>
		
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