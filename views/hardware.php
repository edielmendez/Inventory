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
 	<title>HARDWARE</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
     
    <!-- include material design icons -->
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <style>
    .width-30-pct{
	    width:30%;
	}
	 
	.text-align-center{
	    text-align:center;
	}
	 
	.margin-bottom-1em{
	    margin-bottom:1em;
	}
	.active{
		background: #424242;
		font-size: 20px;
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
        <li><a href="software.php" >Inventario de Software</a></li>
        <li><a class="z-depth-3 active">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <li><a><?php echo $_SESSION['user']['username']; ?></a></li>
        <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
 	

</div><!--fin del container-->
 </body>
 </html>