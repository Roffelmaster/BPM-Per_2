<?php
	include 'inc/db_connect.php';

	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$adres = $_POST['adres'];
	$telefoonnummer = $_POST['telefoonnummer'];
	
	$query = ("
		UPDATE leverancier SET naam = '".$naam."', adres = '".$adres."', telefoonnummer = '".$telefoonnummer."' WHERE idleverancier = '".$id."'  ") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Leverancier bewerkt!");
		header('refresh: 2; URL=?page=overzicht_leverancier');
?>