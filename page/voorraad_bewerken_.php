<?php
	include 'inc/db_connect.php';

	$id = $_POST['id'];
	$aantal = $_POST['aantal'];
	
	$query = ("
		UPDATE magazijn SET hoeveelheid = '".$aantal."' WHERE idmagazijn = '".$id."'  ") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Magazijn bijgewerkt");
		header('refresh: 2; URL=?page=voorraad');
?>