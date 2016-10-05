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
	<title>Reportes de Incidencias</title>
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
	<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <h2 class="center-align">Formato de Incidencias</h2>
            <div class="row">
                <form class="col s12" action="generarReporte.php" method="POST">
                    <div class="row">
                        <div class="input-field col m12 s12">
                            <input id="first_name" type="text" class="validate" name="nombre">
                            <label for="first_name">Nombre</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="mdi-content-mail prefix"></i>
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="mdi-maps-store-mall-directory prefix"></i>
                            <input id="company" type="text" class="validate" name="telefono">
                            <label for="company">Telefono</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                          <label for="budget">Tipo de Usuario</label>
                          <br/>
                        </div>
                        <div class="input-field col s12">
                            <select class="browser-default" id="budget" name="tipoUsuario">
                              <option value="" selected disabled>Tipo de usuario</option>
                              <option value="Alumno">- Alumno</option>
                              <option value="Profesor">- Profesor</option>
                              
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                          <label for="budget">Tipo de Incidencia</label>
                          <br/>
                        </div>
                        <div class="input-field col s12">
                            <select class="browser-default" id="budget" name="tipoIncidencia">
                              <option value="" selected disabled>Tipo de Incidencia</option>
                              <option value="Sugerencia">- Sugerencia</option>
                              <option value="Solicitud de ayuda">- Solicitud de ayuda</option>
                              <option value="Queja">- Queja</option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                          <textarea id="message" class="materialize-textarea" name="descripcion"></textarea>
                          <label for="message">Descripcion de la incidencia</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                          <textarea id="message" class="materialize-textarea" name="solucion"></textarea>
                          <label for="message">Forma en la que se soluciono</label>
                        </div>
                    </div>
                  
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col m12">
                         <p class="right-align">
                         <input type="submit" class="btn btn-large waves-effect waves-light" type="button" name="action" value="Generar reporte"></input>
                         </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>