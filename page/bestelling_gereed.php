<?php

	include 'inc/db_connect.php';
	$factuurid = $_POST['factuur'];
	
	
	$query = 	"UPDATE facturen SET goedgekeurd = '3' WHERE idfacturen =  '" . $factuurid ."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	echo "Bestelling is op gereed gezet.";
	header('refresh: 2; URL=?page=voorraad');
	
	
	?>
