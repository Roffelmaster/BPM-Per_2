<?php 
if(isset($_SESSION['naam'])){
?>

<!-- form_product.PHP

FUNCTIES:
- Product in database zetten
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->


<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Leverancier toevoegen
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=leverancier_toevoegen">
	<fieldset>
		<legend></legend>
		<table>
			<tr><td>Bedrijfsnaam:*</td><td>			<input name="naam" type="text" size="40" maxlength="60" ></td></tr>
			<tr><td>Adres:*</td><td>	<input name="adres" placeholder="Straat 00, 9999 AA, Plaats"type="text" size="40" maxlength="60" </td></tr>
			<tr><td>Telefoonnummer: *</td><td>	<input name="telefoonnummer" type="number" size="40" maxlength="25" ></td></tr>
	
			
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Leverancier toevoegen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>

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
