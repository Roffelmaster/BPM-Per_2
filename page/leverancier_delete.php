<?php
	include 'inc/db_connect.php';
	$idleverancier = $_GET['id'];
	
	$query = 	"DELETE FROM leverancier WHERE idleverancier = '".$idleverancier."'";
	$result = mysqli_query($db, $query) or die("Leverancier met id :  <b> $idleverancier </b> kan niet verwijderd worden omdat er nog producten in staan van de leverancier. " );	
	echo "Leverancier met id: $idleverancier is verwijderd";
	header('refresh: 2; URL=?page=overzicht_leverancier');
	?>