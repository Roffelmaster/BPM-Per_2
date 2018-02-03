<?php 
if(isset($_SESSION['naam'])){
?><!-- REGISTER.PHP

FUNCTIES:
- Kunnen registreren van een account
- Zorgen dat de gegevens van de gebruiker in de database komen

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$error_msg = "";
       	$naam = mysqli_real_escape_string($db, $_POST['naam']);
		$email = mysqli_real_escape_string($db, $_POST['emailadres']);
		$wachtwoord = mysqli_real_escape_string($db,$_POST['wachtwoord']);
		$functie = mysqli_real_escape_string($db,$_POST['functie']);
		
       	
 
       
	 // if (!preg_match("/^[a-zA-Z ]*$/",$naam)) {
      if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/",$email)){
      		$error_msg.="<li>Vul een geldig e-mail adres in.</li>";
      	}
      	
      	$query1 = "SELECT * FROM gebruikers WHERE email ='$email';";
		$result1 = mysqli_query($db, $query1) or die ("FOUT: " . mysqli_error());
		if (mysqli_num_rows($result1) > 0) {
		// e-mailadres al aanwezig in de database, foutmelding tonen
		$error_msg.="<li>Het emailadres is al in gebruik.</li>";	
	}
       	if(strlen($error_msg)>0){
       		//Een van de velden is niet juist ingevuld
       	echo ("<p>Om de volgende reden kan uw vraag helaas niet worden verwerkt:<p><ul>");
       	echo $error_msg;
       	echo "</ul><p>Klik op <a href=\"javascript:history.back(1)\">terug</a> en vul alle velden juist in.</p><br/>"; 
    } 
       else 
          { 
		$query = ("
		INSERT INTO gebruikers (naam, wachtwoord, email, functies_idfuncties) 
		VALUES('$naam', '$wachtwoord', '$email', '$functie')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Het account is aangemaakt!");
		
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
	
	
	
	
	
	