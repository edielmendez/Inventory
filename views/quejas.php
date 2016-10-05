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
 	<title>QUEJAS</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
     <link href="../libs/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
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
		/*font-size: 20px;*/
	}
	.container{
		margin-top: 50px;
	}
	.modal{
		width: 70%;
		
	}
	.alerta{
		color: red;
	}
	th{
		font-size: 12px;
		align-items: center;
	}
	td{
		font-size: 13px;
		align-content: center;
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
			 $('.collapsible').collapsible({
		      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
			 $('.dropdown-button').dropdown({});
			 $('ul.tabs').tabs();
		});
	</script>
 </head>
 <body>
 <div class="navbar-fixed">
 <nav>
    <div class="navbar-fixed #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="../index.php">Inicio</a></li>
        <li><a  class="">Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <li><a class="z-depth-3 active2" href="quejas.php">Quejas</a></li>
        <li><a class="btn" href="chat.php">Chat</a></li>
        <li><a class="btn" href="reportes.php">Crer Reporte</a></li>
        <!--<li><a><?php echo $_SESSION['user']['username']; ?></a></li>-->
        <li><a class='dropdown-button ' href="" data-activates='dropdown1'><i class="mdi mdi-account"></i></a></li>
        <!--<li><a href="../validate/logout.php">Cerrar Sesión</a></li>-->
      </ul>
    </div>
  </nav>
  </div>
<!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    
    <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
  </ul>


<!--width-30-pct text-align-center clase de la tabla--> 
<!--Inicio de la tabla -->
<!-- page content and controls will be here -->
<div class="container" ng-app="myApp" ng-controller="quejaController">
	


    <div class="row">
        <div class="col s12">
            <h4>Quejas</h4>

            <!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Buscar Software...">

			<!-- table that shows product record list -->
			<table class="hoverable striped" id="tablaProductos">
				<thead>
					<tr>
						<th class="">NOMBRE</th>
						<th class="">TELEFONO</th>
						<!--<th class="">MARCA</th>-->
						<th >E-MAIL</th>
						<th class="">QUEJA</th>
						<th class="">FECHA</th>
						
						<th></th>
						<!--<th></th>-->
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in quejas | filter:search">
						<td >{{ d.nombre }}</td>
						<td>{{ d.telefono }}</td>
						<!--<td>{{ d.marca }}</td>-->
						<td>{{ d.email }}</td>
						<td>{{ d.queja }}</td>
						<td>{{ d.fecha }}</td>
						
						
						<!--<td>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-email material-icons"></i></a>

							
						</td>-->
						<td>
							<a ng-click="deleteQueja(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-delete-forever material-icons"></i></a>
						</td>

					</tr>
				</tbody>
			</table>
		
<!--Modal Confir eliminar queja-->

			<div id="modal_eliminar_queja" class="modal">
		        <div class="modal-content">
		            <h4>CONFIRMACION</h4>
		            <p>Esta seguro de eliminar la queja ?</p>
		        </div>
		        <div class="modal-footer">
		            <a  class=" modal-action modal-close waves-effect waves-red btn-flat" >Cancelar</a>
		            <a href="#" class="waves-effect waves-green btn-flat" ng-click="aceptDeleteQueja()">Aceptar</a>
		       </div>
		    </div>
		
			
			


			
             
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->









    
 </body>
 </html>