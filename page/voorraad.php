<?php 
if(isset($_SESSION['naam'])){
?><!-- VOORRAAD.PHP

FUNCTIES:
- Weergeven van de voorraad


-->
<?php
include 'inc/db_connect.php';


	
	$query = 	"SELECT * FROM magazijn";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	
?>



<html>
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
<body>


<div class="col-lg-9" >
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				Huidige Voorraad
				</div>
				<div class="card-body">
				<table>
  <tr>
    <th>ID</th>
    <th>Naam</th>
	<th>Hoeveelheid</th>
	<th>Product ID</th>
  </tr>
  
  <?php
while($row = mysqli_fetch_assoc($result)){
?>

  <tr>
    <td><?php echo $row['idmagazijn'];?></td>
	<td><?php echo $row['naam'];?></td>
	<td><?php echo $row['hoeveelheid'];?></td>
	<td><?php echo $row['producten_idproducten'];?></td>
	
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
				 Product toevoegen
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=product_inboeken" id="form1">
	<fieldset>
		<legend></legend>
		<table>
			<tr><td>Productnaam:</td><td>			<input name="naam" type="text" size="40" maxlength="50" ></td></tr>
			<tr><td>Hoeveelheid</td><td>	<input name="prijs" type="number" size="40" maxlength="25" ></td></tr>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Product toevoegen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>


</body>
</html>

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



