<?php
	include 'inc/db_connect.php';
	$id = $_GET['id'];
	
	$query = 	"DELETE FROM magazijn WHERE idmagazijn = '".$id."'";
	$result = mysqli_query($db, $query) or die("FOUT" );	
	echo "Leverancier met id: $id is verwijderd";
	header('refresh: 2; URL=?page=voorraad');
	?>