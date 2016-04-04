<?php 
if (session_id()==null)
  session_start();
  if(!isset($_SESSION['user'])){
  	header("location: ../index.php");
  }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>HOME</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
     
    <!-- include material design icons -->
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <style>
    
	.container{
		margin-top: 50px;
	}
	.card-image{
		width: 80%;
		height: 250px;
	}
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="../libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="../libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="../libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="../libs/js/app.js"></script>
	<script type="text/javascript" src="../libs/js/script.js"></script>
	<script src="../libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 
		});
	</script>
 </head>
 <body>
 <nav>
    <div class="nav-wrapper #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><a><?php echo $_SESSION['user']['username']; ?></a></li>
        <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>

 	<div class="container">
 	<div class="row">
      <div class="col s4">
        <!-- Promo Content 1 goes here -->
        <div class="card z-depth-4">
            <div class="card-image">
              <img src="../images/software.jpg">
             
            </div>
            <div class="card-content">
              <h4>Inventario de Software</h4>
            </div>
            <div class="card-action">
            	<a href="software.php" class="btn ">Entrar</a>
            </div>
        </div>
      </div>
      <div class="col s4">
        <!-- Promo Content 2 goes here -->
        <div class="card z-depth-4">
            <div class="card-image">
              <img src="../images/hardware.jpg">
             
            </div>
            <div class="card-content">
              <h4>Inventario de Hardware</h4>
            </div>
            <div class="card-action">
            	<a href="" class="btn ">Entrar</a>

            </div>
        </div>
      </div>
      <div class="col s4 ">
        <!-- Promo Content 3 goes here -->
        <div class="card z-depth-4">
            <div class="card-image" >
              <img src="../images/bitacora.jpg">
             
            </div>
            <div class="card-content">
              <h4>Bitacora </h4>
            </div>
            <div class="card-action">
            	<a href="" class="btn ">Entrar</a>
            </div>
        </div>
    </div>

    </div>

    </div><!--fin del container-->
 </body>
 </html>