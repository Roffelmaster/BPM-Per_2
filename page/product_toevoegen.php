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
       	$productnaam = $_POST['naam'];
		$omschrijving = $_POST['omschrijving'];
		$prijs = $_POST['prijs'];
		$leverancier = $_POST['leverancier'];

		$query = ("INSERT INTO producten (productnaam, omschrijving, prijs, leverancier_idleverancier)
		VALUES('".$productnaam."','".$omschrijving."','".$prijs."','".$leverancier."')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Product is toegevoegd!");
		header('refresh: 2; URL=?page=overzicht_producten_');
		
		
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
	
	
	