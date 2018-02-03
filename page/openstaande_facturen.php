<?php 
if(isset($_SESSION['naam'])){
?><?php

include 'inc/db_connect.php';

	$query = 	"SELECT facturen.idfacturen, facturen.datum, functies.naam, producten.prijs, bestelregel.aantal, leverancier.naam AS leveranciernaam   FROM facturen, functies, producten, leverancier, bestelregel WHERE betaald = '0' AND facturen.functies_idfuncties = functies.idfuncties AND bestelregel.producten_idproducten = producten.idproducten AND leverancier.idleverancier = producten.leverancier_idleverancier AND bestelregel.facturen_idfacturen = facturen.idfacturen";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
?>	
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Overzicht openstaande facturen
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

<div class="col-lg-9" style="margin-left: 252px;">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				  Factuurstatus aanpassen
				</div>
				<div class="card-body">
				
				<form method="post" action="?page=verander_status" id="1">
				<table width="40%">
				<tr><td>Selecteer factuurID:</td>
				<td><select name="idfacturen" form="1">
				
				<?php
				$query = 	"SELECT idfacturen FROM facturen WHERE betaald = '0'";
				$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
				while($row = mysqli_fetch_assoc($result)){
				?>
				<option value="<?php echo $row['idfacturen'] ?>">Factuurnummer: <?php echo $row['idfacturen'] ?></option>
				<?php

				}

				?>
				
				</select></td>				
				</tr>
				<tr>
				<td>Verander status naar:</td>
				<td>Betaald</td>
				</tr>
				
				</table>
				<br><br>
				<input type="submit" value="Factuurstatus aanpassen">
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