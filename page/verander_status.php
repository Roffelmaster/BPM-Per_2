<?php
	$factuurnummer = $_POST['idfacturen'];
	
	$query = 	"UPDATE facturen SET betaald = '1' WHERE idfacturen = '" . $factuurnummer ."' ";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	echo "Factuur met factuurnummer ". $factuurnummer . " is op status BETAALD gezet.";
	header('refresh: 2; URL=?page=openstaande_facturen');
?>