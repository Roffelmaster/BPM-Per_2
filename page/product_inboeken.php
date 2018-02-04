<?php 
if(isset($_SESSION['naam'])){
?><!-- product_inboeken.PHP

FUNCTIES:
- 

-->

<?php
	include 'inc/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) 
  { 
	
		$error_msg = "";
       	$productnaam = $_POST['naam'];
		$hoeveelheid = $_POST['prijs'];
		

		$query = ("INSERT INTO magazijn (productnaam, hoeveelheid, producten_idproducten)
		VALUES('".$productnaam."','".$hoeveelheid."')") or die (mysqli_error());
		$result = mysqli_query($db, $query);
		echo("Product is ingeboekt!");
		header('refresh: 2; URL=?page=voorraad');
		
		
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
	
	
	