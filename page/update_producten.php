<?php
	include 'inc/db_connect.php';

	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$omschrijving = $_POST['omschrijving'];
	$prijs = $_POST['prijs'];
	
	$query = ("
		UPDATE producten SET productnaam = '".$naam."', omschrijving = '".$omschrijving."', prijs = '".$prijs."' WHERE idproducten = '".$id."'  ") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Product bewerkt!");
		header('refresh: 2; URL=?page=overzicht_producten_');
?>