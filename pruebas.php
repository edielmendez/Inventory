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
    <link rel="stylesheet" href="libs/css/materialize.min.css" />
    <link href="libs/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
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
	.active2{
		background: #424242;
	
	}
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="libs/js/app.js"></script>
	<script type="text/javascript" src="libs/js/script.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			  $('ul.tabs').tabs();
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
        <li><a href="bitacora.php" class="z-depth-3 active2">Bitacora</a></li>
        <!--<li><a><?php echo $_SESSION['user']['username']; ?></a></li>-->
        <li><a class='dropdown-button ' href="" data-activates='dropdown1'><i class="mdi mdi-account"></i></a></li>
        <!--<li><a href="../validate/logout.php">Cerrar Sesión</a></li>-->
      </ul>
    </div>
  </nav>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    
    <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
  </ul>

<div class="container">
 	<div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#inbox">Inbox</a></li>
            <li class="tab col s3"><a class="active" href="#unread">Unread</a></li>
            <li class="tab col s3 disabled"><a href="#outbox">Outbox (Disabled)</a></li>
            <li class="tab col s3"><a href="#sent">Sent</a></li>
          </ul>
        </div>
        <div id="inbox" class="col s12">Inbox</div>
        <div id="unread" class="col s12">Unread</div>
        <div id="outbox" class="col s12">Outbox (Disabled)</div>
        <div id="sent" class="col s12">Sent</div>
      </div>

</div><!--fin del container-->
 </body>
 </html>


