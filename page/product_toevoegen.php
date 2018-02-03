<?php 
if(isset($_SESSION['naam'])){
?><!-- product_toevoegen.PHP

FUNCTIES:
- 

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$error_msg = "";
       	$productnaam = mysqli_real_escape_string($db, $_POST['naam']);
		$omschrijving = mysqli_real_escape_string($db, $_POST['omschrijving']);
		$prijs = mysqli_real_escape_string($db, $_POST['prijs']);
		$leverancier = mysqli_real_escape_string($db, $_POST['leverancier']);

      	$query1 = "SELECT * FROM producten WHERE naam ='$productnaam';";
		$result1 = mysqli_query($db, $query1) or die ("FOUT: " . mysqli_error());
		if (mysqli_num_rows($result1) > 0) {
		// e-mailadres al aanwezig in de database, foutmelding tonen
		$error_msg.="<li>De productnaam is al in gebruik.</li>";	
	}
       	if(strlen($error_msg)>0){
       		//Een van de velden is niet juist ingevuld
       	echo ("<p>Om de volgende reden kan uw vraag helaas niet worden verwerkt:<p><ul>");
       	echo $error_msg;
       	echo "</ul><p>Klik op <a href=\"javascript:history.back(1)\">terug</a> en vul alle velden juist in.</p><br/>"; 
    } 
       else 
          { 
		$query = ("INSERT INTO producten (productnaam, omschrijving, prijs, leverancier_idleverancier)
		VALUES('$productnaam','$omschrijving','$prijs','$leverancier')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Product is toegevoegd!");
		
		
	}
}
?>
	
	
	<?php

}else{
?>
<div class="col-lg-9" >
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				Niet ingelogd
				</div>
				<div class="card-body">
				Je moet ingelogd zijn om deze pagina te kunnen bekijken!
				
				</div>
	</div>			
				 
</div>
<?php
}

?>
	
	
	