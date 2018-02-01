

<!-- form_product.PHP

FUNCTIES:
- Product in database zetten
- Per 'Categorie' ingedeeld d.m.v. fieldset

-->

<?php

	if(isset($_SESSION[''])){
	echo "Er is al een product genaamd: ". $_SESSION["productnaam"] ;
	}else{

	?>
<div class="col-lg-9">
	<div class="card card-outline-secondary my-4">
				<div class="card-header">
				 Product toevoegen
				
				</div>
				<div class="card-body">


	<form method="post" action="?page=product_toevoegen">
	<fieldset>
		<legend></legend>
		<table>
			<tr><td>Productnaam:</td><td>			<input name="naam" type="text" size="40" maxlength="20" ></td></tr>
			<tr><td>Omschrijving:</td><td>	<input name="omschrijving" type="text" size="40" maxlength="20" </td></tr>
			<tr><td>Prijs</td><td>	<input name="prijs" type="text" size="40" maxlength="25" ></td></tr>
			<tr><td>Leverancier</td><td>
			<select>
			<option value="leverancier1">Leverancier 1</option>
			<option value="leverancier2">Leverancier 2</option>
			<option value="leverancier3">Leverancier 3</option>
			</select></td>
		</table>
	</fieldset>

	<br>


		<input type="submit" name="submit" value="Product toevoegen">
		<input name="reset" type="reset" value="Leegmaken">
	</form>

				</div>
	</div>
</div>
<?php
}

?>

