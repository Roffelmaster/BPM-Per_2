<?php 
if(isset($_SESSION['naam'])){
?><?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$naam = mysqli_real_escape_string($db, $_POST['naam']);
		$adres = mysqli_real_escape_string($db, $_POST['adres']);
		$telefoonnummer = mysqli_real_escape_string($db, $_POST['telefoonnummer']);
		
		$query = ("
		INSERT INTO leverancier (naam, adres, telefoonnummer) 
		VALUES('$naam', '$adres', '$telefoonnummer')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Leverancier toegevoegd");
		header('refresh: 2; URL=?page=overzicht_leverancier');
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