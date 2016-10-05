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
 	<title>CHAT</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
    <link href="../libs/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
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
  .active2{
    background: #424242;
    
  }
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="../libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="../libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="../libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="../libs/js/app.js"></script>

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
         <li><a href="../index.php">Inicio</a></li>
        <li><a href="software.php" >Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <li><a  href="quejas.php">Quejas</a></li>
        <li><a class="btn active2" href="chat.php">Chat</a></li>
        <li><a class="btn" href="reportes.php">Crer Reporte</a></li>
        <li><a class='dropdown-button ' href="" data-activates='dropdown1'><i class="mdi mdi-account"></i></a></li>
        <li><a><?php echo $_SESSION['user']['username']; ?></a></li>
        <!--<li><a href="../validate/logout.php">Cerrar Sesión</a></li>-->
      </ul>
    </div>
  </nav>

   <ul id='dropdown1' class='dropdown-content'>
    
    <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
  </ul>

 	<div class="container">
    <div class="row">
      <div class="col s12">
        <iframe src="http://localhost:3000/chat.html" width="500" height="600"></iframe>
      </div>
    </div>
  </div><!--fin del container-->
 </body>
 </html>