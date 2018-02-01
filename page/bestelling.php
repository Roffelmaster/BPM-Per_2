<!-- HOME.PHP

FUNCTIES:
- Weergeven van de producten
- Mogelijk om te filteren via de sidebarcategorieën.

-->
<?php
include 'inc/db_connect.php';

 

	if(isset($_GET['categorie'])){
	$query = 	"SELECT * FROM producten WHERE catogorie_idcatogorie = '" . $_GET["categorie"] ."';";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
	}else {
	$query = 	"SELECT * FROM producten";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	}
	
	
	
	?>

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
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

<table>
  <tr>
    <th>Bestelling ID</th>
    <th>Product</th>
    <th>Aantal</th>
	<th>Prijs</th>
  </tr>
  <tr>
    <td>#001</td>
    <td>Toetsenbord</td>
    <td>20</td>
	<td>&euro; 20</td>
  </tr>
  
</table>

</body>
</html>


 
