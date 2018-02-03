<!-- HOME.PHP

FUNCTIES:
- Weergeven van de producten
- Mogelijk om te filteren via de sidebarcategorieën.

-->

<?php
	if(isset($_SESSION["naam"])){
	
?>

	

<?php }else{
?>
<div class="col-lg-9" >
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 IT Solutions bestelapplicatie
				</div>
				<div class="card-body">
				<img style="float: right;"src="img/logo.png">
				Welkom op de bestelwebsite van IT Solutions. Als medewerker kun je hier je producten bestellen die je nodig hebt tijdens het uitvoeren van je werkzaamheden.<br><br><br>
				<i>- IT Solutions Management</i>
				
				</div>
	</div>			
				 
</div>

<?php
}

?>