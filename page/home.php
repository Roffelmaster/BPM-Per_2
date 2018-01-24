<!-- HOME.PHP

FUNCTIES:
- Weergeven van de producten
- Mogelijk om te filteren via de sidebarcategorieën.

-->
<?php
include 'inc/db_connect.php';

 

	if(isset($_GET['categorie'])){
	$query = 	"SELECT * FROM producten WHERE catogorie_idcatogorie = '" . $_GET["categorie"] ."';";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error()); 
	}else {
	$query = 	"SELECT * FROM producten";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());	
	}
	
	
	
	?>



<?php
while($row = mysqli_fetch_assoc($result)){
?>
			
            <div class="col-lg-4 col-md-6 mb-4">
			<form method="post" action="index.php?page=cart">
              <div class="card h-100">
                <a href="?page=product_info&product=<?php echo $row['idproducten'];?>"><img class="card-img-top" src="img/<?php echo $row['afbeelding'] ?>.png" style="height: 250px; width: 250px;" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="?page=product_info&product=<?php echo $row['idproducten'];?>"><?php echo $row['naam'] ?></a>
                  </h4>
                  <h5>&euro;<?php echo $row['prijs'] ?>,00</h5>
                  <p class="card-text"><?php echo $row['omschrijving'] ?></p>
                </div>
                <div class="card-footer">
				  <input type="text" name="quantity" class="form-control" value="1" />
				  <input type="hidden" name="hidden_id" value="<?php echo $row["idproducten"]; ?>" />
				  <input type="hidden" name="hidden_name" value="<?php echo $row["naam"]; ?>" />  
                  <input type="hidden" name="hidden_price" value="<?php echo $row["prijs"]; ?>" />
				  <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                  <a href="?page=product_info&product=<?php echo $row['idproducten'];?>" class="btn btn-success">Bekijk product</a>
                </div>
              </div>
			  </form>
            </div>
			
			

            

        
	  
<?php } ?>


 
