<?php
	include 'inc/db_connect.php';
	$idproducten = $_GET['id'];
	
	$query = 	"DELETE FROM producten WHERE idproducten = '".$idproducten."'";
	$result = mysqli_query($db, $query) or die("Product met id :  <b> $idproducten </b> kan niet verwijderd worden. " );	
	echo "Product met id: $idproducten is verwijderd";
	header('refresh: 2; URL=?page=overzicht_producten_');
	?>