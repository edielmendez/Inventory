<?php 
if (session_id()==null)
  session_start();
  if(isset($_SESSION['user'])){
  	header("location: views/inicio.php");
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario de Software y Hardware</title>
	<!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize.min.css" />
     
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
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="libs/js/app.js"></script>
	<script type="text/javascript" src="libs/js/script.js"></script>
	<script src="libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#username').focus();
		});
	</script>
</head>	
<body style="background: #009688">

	<div class="container">

	
  <div id="login-page" class="row">
    <div class="col offset-s3 s5 z-depth-4 card-panel">
    	<div class="row">
    		<div class="col s12 center" style="height: 50px;color: white">
    			<?php
    			
    			if(isset($_SESSION['msj'])){
    				if ($_SESSION['msj']!="") {
    					echo "<h5 style='background:#3F51B5'>".$_SESSION['msj']."</h5>";
    					$_SESSION['msj'] = "";
    				}
    			} 
    			 ?>
    		</div>
    	</div>
      <form class="login-form" action="validate/login.php" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/logo.png" style="width: 200px;height: 150px;" >
            <p class="center login-form-text">Inventario de software y Hardware</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field offset-s1 col s9">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username" required="">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field offset-s1 col s9">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password" required="">
            <label for="password">Password</label>
          </div>
        </div>
        <!--<div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me">
              <label for="remember-me">Remember me</label>
          </div>
        </div>-->
        <div class="row">
          <div class="input-field offset-s3 col s6">
          	<input type="submit" value="Aceptar" class="btn  col s12" style="background: #727272"></input>
            
          </div>
        </div>
        <!--<div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="http://demo.geekslabs.com/materialize/v2.3/layout03/page-register.html">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="http://demo.geekslabs.com/materialize/v2.3/layout03/page-forgot-password.html">Forgot password ?</a></p>
          </div>       
        </div>-->

      </form>
    </div>
  </div>
  </div>
	
</body>
</html>