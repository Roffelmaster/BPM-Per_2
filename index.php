<!-- INDEX.PHP

FUNCTIES:
- Header, sidebars en footer inladen

-->

<?php include 'inc/db_connect.php';?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
         <a class="navbar-brand" href="?page=home">
		<a class="navbar-brand" href="?page=home">IT Solutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <!-- Homepagina -->
            <li class="nav-item active">
              <a class="nav-link" href="?page=home">Home
              </a>
            </li>
			
			
			
			<!-- begin speciaal menu -->
            <?php 
			session_start();
			if(isset($_SESSION["functie"])){
				switch($_SESSION["functie"]){
				case 1:
				?>
			
			<!-- menu van functie-ID 0 (Employee) -->
			<li class="nav-item">
              <a class="nav-link" href="?page=form_bestellen">Bestellen
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=bestelde_producten">Overzicht bestelde producten</a>
            </li>
			
			<?php
				break;
				case 2: 
				?>
				
			<!-- menu van functie-ID 1 (Department manager)-->
			<li class="nav-item">
              <a class="nav-link" href="?page=form_bestellen">Bestellen
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=bestelde_producten">Overzicht bestelde producten</a>
            </li>
			
			<li class="nav-item">
            <a class="nav-link" href="?page=form_register">Werknemer registeren</a>
            </li>
			
			<li class="nav-item">
            <a class="nav-link" href="?page=form_goedkeuren_bestelling">Goedkeuren bestelling</a>
            </li>
								
			<?php	
				break;
				case 3: 
				?>
				
			<!-- menu van functie-ID 2 (Purchasing department)-->
<li class="nav-item">
              <a class="nav-link" href="?page=form_bestellen">Bestellen
              </a>
            </li>			
			<li class="nav-item">
              <a class="nav-link" href="?page=bestelde_producten">Bestelde producten</a>
            </li>
			
			<li class="nav-item">
            <a class="nav-link" href="?page=form_register">Werknemer registeren</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=overzicht_producten_">Producten</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="?page=overzicht_leverancier">Leveranciers</a>
            </li>
			<?php 
				break;
				case 4:
				?>
			
			<!-- menu van functie-ID 3 (Logistiek medewerker)-->
			<li class="nav-item">
              <a class="nav-link" href="?page=form_bestellen">Bestellen
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=bestelde_producten">Overzicht bestelde producten</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=voorraad">Voorraad</a>
            </li>
			
			<?php 
				break;
				case 5:
				?>
				
			<li class="nav-item">
              <a class="nav-link" href="?page=form_bestellen">Bestellen
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="?page=bestelde_producten">Overzicht bestelde producten</a>
            </li>
			

			<li class="nav-item">
            <a class="nav-link" href="?page=openstaande_facturen">Openstaande facturen</a>
            </li>		
			
			<li class="nav-item">
            <a class="nav-link" href="?page=betaalde_facturen">Betaalde facturen</a>
            </li>	
				<?php
				break;
				}
				
			?> 
			
		
		
			
			
			<?php 
			}else{
			}
			?>
		

			

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
		<div class="row">
			<div style="margin-left: -60px; margin-right: 30px;"class="col-lg-3">
			<?php include 'page/form_login.php' ?>
			  <br><br>
			  
			</div>


			<?php
		
				if(!empty($_GET)){
				$page = $_GET['page'];
				include "page/$page.php";
				}else{
				include "page/home.php";
				}
			?>

		</div>
    </div>
	</div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container" style="color: white;">
		
		
		
        <p class="m-0 text-center text-white">Copyright &copy; IT Solutions (2018)</p>
		

      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
