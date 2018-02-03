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
include 'inc/db_connect.php';
	$query = 	"SELECT * FROM facturen, producten 
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
	<th>Productnaam</th>
	<th>Totaalprijs</th>
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idfacturen'];?></td>
	<td><?php echo $row['datum'];?></td>
	<td><?php echo $row['naam'];?></td>
	<td>&euro; <?php echo $row['prijs'];?>,00</td>
	
</tr>


<?php

}

?>

</table>
 
				</div>
	</div>
</div>	