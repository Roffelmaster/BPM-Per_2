<?php
	include 'inc/db_connect.php';
	// formulier data
	$idproducten = $_POST['product'];
	$aantal = $_POST['aantal'];
	$idgebruikers = $_SESSION["idgebruikers"];
	$functie = $_SESSION["functie"];

	// checken of prijs boven de 500 komt
	$query = 	"SELECT prijs FROM producten WHERE idproducten ='" . $_POST['product'] ."' ";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	while($row = mysqli_fetch_assoc($result)){
	$bedrag = $row['prijs'] * $aantal;
	}
		if($bedrag > 500){
		// factuur aanmaken
			$query = 	"INSERT INTO facturen(gebruikers_idgebruikers, functies_idfuncties, goedgekeurd) 
			VALUES('$idgebruikers', '$functie', '0')";
			
			$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
		// factuurnummer opzoeken
			$query = 	"SELECT max(idfacturen) as idfacturen  FROM facturen";
			$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
			$resultaat = mysqli_fetch_assoc($result);
		// bestelregel aanmaken
			$query2 = 	"INSERT INTO bestelregel(aantal, facturen_idfacturen, producten_idproducten)
			VALUES('$aantal', '" . $resultaat['idfacturen'] ."','$idproducten')";
			$result2 = mysqli_query($db, $query2) or die("FOUT : " . mysqli_error());
			
		// bericht naar gebruiker	
			echo "bestelling is geplaatst, maar moet nog wel goedgekeurd worden door de Department Manager.";
		}else{
		
		// factuur aanmaken
			$query = 	"INSERT INTO facturen(gebruikers_idgebruikers, functies_idfuncties, goedgekeurd) 
			VALUES('$idgebruikers', '$functie', '1')";
			
			$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
		// factuurnummer opzoeken
			$query = 	"SELECT max(idfacturen) as idfacturen  FROM facturen";
			$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
			$resultaat = mysqli_fetch_assoc($result);
		// bestelregel aanmaken
			$query2 = 	"INSERT INTO bestelregel(aantal, facturen_idfacturen, producten_idproducten)
			VALUES('$aantal', '" . $resultaat['idfacturen'] ."','$idproducten')";
			$result2 = mysqli_query($db, $query2) or die("FOUT : " . mysqli_error());
			
		// bericht naar gebruiker	
			echo "bestelling is geplaatst en is minder dan &euro; 500,-.";
		
		
		}
	
	
	
	
	