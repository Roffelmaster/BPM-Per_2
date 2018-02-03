<?php 
if(isset($_SESSION['naam'])){
?><?php
	$factuurnummer = $_POST['idfacturen'];
	
	$query = 	"UPDATE facturen SET betaald = '1' WHERE idfacturen = '" . $factuurnummer ."' ";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	echo "Factuur met factuurnummer ". $factuurnummer . " is op status BETAALD gezet.";
	header('refresh: 2; URL=?page=openstaande_facturen');
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