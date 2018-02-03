<?php 
if(isset($_SESSION['naam'])){
?><?php

	if(isset($_GET['factuur'])){
	$factuurid = $_GET['factuur'];
	
	include 'inc/db_connect.php';
	$query = 	"UPDATE facturen SET goedgekeurd = '1' WHERE idfacturen =  '" . $factuurid ."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	
	echo "Bestelling goedgekeurd";
	header('refresh: 2; URL=?page=form_goedkeuren_bestelling');
	
	}
	else{
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