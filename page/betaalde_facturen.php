<?php 
if(isset($_SESSION['naam'])){
?>
<?php

include 'inc/db_connect.php';

	$query = 	"SELECT facturen.idfacturen, facturen.datum, functies.naam, producten.prijs, bestelregel.aantal, leverancier.naam AS leveranciernaam   FROM facturen, functies, producten, leverancier, bestelregel WHERE betaald = '1' AND facturen.functies_idfuncties = functies.idfuncties AND bestelregel.producten_idproducten = producten.idproducten AND leverancier.idleverancier = producten.leverancier_idleverancier AND bestelregel.facturen_idfacturen = facturen.idfacturen";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
?>	
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Overzicht betaalde facturen
				</div>
				<div class="card-body">

	<table width="100%">
  <tr>
    <th>FactuurID</th>
    <th>Besteldatum</th>
	<th>Afdeling</th>
	<th>Totaalprijs</th>
	<th>Leverancier</th>
  </tr>
  
	<?php
	while($row = mysqli_fetch_assoc($result)){
	?>

	  <tr>
		<td><?php echo $row['idfacturen'];?></td>
		<td><?php echo $row['datum'];?></td>
		<td><?php echo $row['naam'];?></td>
		<td><?php echo $row['prijs'] * $row['aantal'];?> </td>
		<td><?php echo $row['leveranciernaam'] ?></td>
		
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