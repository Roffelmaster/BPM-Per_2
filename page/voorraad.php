<!-- VOORRAAD.PHP

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

</body>
</html>



