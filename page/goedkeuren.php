<?php

	if(isset($_GET['factuur'])){
	$factuurid = $_GET['factuur'];
	
	include 'inc/db_connect.php';
	$query = 	"UPDATE facturen SET goedgekeurd = '1' WHERE idfacturen =  '" . $factuurid ."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	echo "Bestelling goedgekeurd";
	header('refresh: 2; URL=?page=form_goedkeuren_bestelling');
	
	}
	else{
	}
	?>