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
 	<title>SOFTWARE</title>
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
	<script type="text/javascript" src="../libs/js/script.js"></script>
	<script src="../libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 
		});
	</script>
 </head>
 <body>
 <div class="navbar-fixed">
 <nav>
    <div class="navbar-fixed #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a  class="z-depth-3 active">Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <li><a><?php echo $_SESSION['user']['username']; ?></a></li>
        <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  </div>


<!--Inicio de la tabla -->
<!-- page content and controls will be here -->
<div class="container" ng-app="myApp" ng-controller="softwareController">
    <div class="row">
        <div class="col s12">
            <h4>Todos los Softwares</h4>

            <!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Buscar Software...">

			<!-- table that shows product record list -->
			<table class="hoverable striped" id="tablaProductos">
				<thead>
					<tr>
						<th class="width-30-pct">NOMBRE SOFTWARE</th>
						<th class="width-30-pct">VERSIÓN</th>
						<th class="text-align-center">MARCA</th>
						<th class="text-align-center">DOCUMENTO QUE AMPARA LA LICENCIA</th>
						<th class="text-align-center">NÚMERO DE LICENCIAS</th>
						<th class="text-align-center">PLATAFORMA</th>
						<th class="text-align-center">CLASIFICACIÓN</th>
						<th class="text-align-center">OBSERVACIONES</th>
						<th></th>
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in softwares | filter:search">
						<td >{{ d.nombre }}</td>
						<td>{{ d.version }}</td>
						<td>{{ d.marca }}</td>
						<td>{{ d.documento_de_amparo }}</td>
						<td>{{ d.numero_licencias }}</td>
						<td>{{ d.plataforma }}</td>
						<td>{{ d.clasificacion }}</td>
						<td >{{ d.observaciones }}</td>
						
						<td>
							<a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em">Editar</a>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn margin-bottom-1em">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>

		
			
			


            
			<!-- modal for for creating new product -->
			
			<div id="modal-product-form" class="modal modal-fixed-footer">
			    <div class="modal-content">
			        <h4 id="modal-product-title">Create New Product</h4>
			        <form name="formsoftware">
			        <div class="row">
			            <div class="input-field col s12">

			                <input ng-model="nombre" type="text" class="validate" id="form-nombre" placeholder="Nombre..." name="nombre" required="" />
			                <span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid">Introduzca el nombre por favor</span>
			                <label for="name">Nombre</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="version" type="text" class="validate" id="form-version" placeholder="Versión" name="version" required="" />
			                <span ng-show="formsoftware.version.$touched && formsoftware.version.$invalid" class="alerta">Introduzca la version por favor</span>
			                <label for="version">Versión</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="marca" type="text" class="validate" id="form-name" placeholder="Marca..." />
			                <label for="marca">Marca</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="documento_de_amparo" type="text" class="validate" id="form-documento_de_amparo" placeholder="Documento de Amparo..." />
			                <label for="marca">Documento de Amparo</label>
			            </div>



			            <div class="input-field col s6">
			                <input ng-model="numero_licencias" type="text" class="validate" id="form-numero_licencias" placeholder="Numero de licencias..." />
			                <label for="marca">Numero de Licencias</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="plataforma" type="text" class="validate" id="form-plataforma" placeholder="Plataforma..." />
			                <label for="marca">Plataforma</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="clasificacion" type="text" class="validate" id="form-clasificacion" placeholder="Clasificación..." />
			                <label for="marca">Clasifición</label>
			            </div>
			            <div class="input-field col s12">
			                <textarea ng-model="observaciones" type="text" class="validate materialize-textarea" placeholder="observaciones..."></textarea>
			                <label for="observaciones">Observaciones</label>
			            </div>
			            
			            <!--<div class="input-field col s12">
			                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()">Crear</a>
			                 
			                <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()">Guardar Cambios</a>
			                 
			                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em">Cerrar</a>
			            </div>-->
			        </div>
			        </form>
			    </div>
			   <div class="modal-footer">
			   <a href="#!" class="modal-action modal-close waves-effect waves-green btn red" >Cancelar</a>
			      <a id="btn-create-product" class="modal-action modal-close waves-effect waves-light btn " ng-click="createProduct()" >Crear</a>
			      <a id="btn-update-product" class="modal-action modal-close waves-effect waves-light btn " ng-click="updateProduct()">Guardar Cambios</a>
			      
			    </div>
			</div>

			<!-- floating button for creating product -->
			<div class="fixed-action-btn" style="bottom:45px; right:10px;">
			   
			    <a class=" btn red" ng-click="showCreateForm()">Nuevo Registro</a>
			</div>

			<!--Modal Confir eliminar registro-->

			<div id="modal_eliminar_software" class="modal">
		        <div class="modal-content">
		            <h4>CONFIRMACION</h4>
		            <p>Esta seguro de eliminar el registro ?</p>
		        </div>
		        <div class="modal-footer">
		            <a  class=" modal-action modal-close waves-effect waves-red btn-flat" >Cancelar</a>
		            <a href="#" class="waves-effect waves-green btn-flat" ng-click="aceptDeleteSoftware()">Aceptar</a>
		       </div>
		    </div>
			
             
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->




    
 </body>
 </html>