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
        <li><a  class="z-depth-3 active2">Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <li><a  href="quejas.php">Quejas</a></li>
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
						<th class="">NOMBRE SOFTWARE</th>
						<th class="">VERSIÓN</th>
						<!--<th class="">MARCA</th>-->
						<th >DOCUMENTO QUE AMPARA LA LICENCIA</th>
						<th class="">NÚMERO DE LICENCIAS</th>
						<th class="">PLATAFORMA</th>
						<th class="">CLASIFICACIÓN</th>
						<th class="">OBSERVACIONES</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in softwares | filter:search">
						<td >{{ d.nombre }}</td>
						<td>{{ d.version }}</td>
						<!--<td>{{ d.marca }}</td>-->
						<td>{{ d.documento_de_amparo }}</td>
						<td>{{ d.numero_licencias }}</td>
						<td>{{ d.plataforma }}</td>
						<td>{{ d.clasificacion }}</td>
						<td >{{ d.observaciones }}</td>
						
						<td>
							<a ng-click="readOne(d.id)" class="waves-effect waves-light btn">Editar</a>

							
						</td>
						<td>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-delete-forever material-icons"></i></a>
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
			            <div class="input-field col s6">

			                <input ng-model="nombre" type="text" class="validate" id="form-nombre" placeholder="Nombre..." name="nombre" required="" />
			                <span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid" class="alerta">Introduzca el nombre por favor</span>
			                
			                <label for="name">Nombre</label>
			                
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="version" type="text" class="validate" id="form-version" placeholder="Versión" name="version" required="" />
			                <span ng-show="formsoftware.version.$touched && formsoftware.version.$invalid" class="alerta">Introduzca la version por favor</span>
			                <label for="version">Versión</label>
			            </div>
			            
			            <!--documento de amparo opcional-->
			            <div class="input-field col s6">
			                <input ng-model="documento_de_amparo" type="text" class="validate" id="form-documento_de_amparo" placeholder="Documento de Amparo..." name="documento_de_amparo" required="" />
			                <span ng-show="formsoftware.documento_de_amparo.$touched && formsoftware.documento_de_amparo.$invalid" class="alerta">Introduzca la marca por favor</span>
			                <label for="marca">Documento de Amparo</label>
			            </div>



			            <div class="input-field col s6">
			                <input name="numero_licencias" required="" ng-model="numero_licencias" type="text" class="validate" id="form-numero_licencias" placeholder="Numero de licencias..."  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
			                <span ng-show="formsoftware.numero_licencias.$touched && formsoftware.numero_licencias.$invalid" class="alerta">Introduzca el número de licencias por favor</span>
			                <label for="marca">Numero de Licencias</label>
			            </div>

			            <div class="input-field col s6">
			                <input ng-model="plataforma" type="text" class="validate" id="form-plataforma" placeholder="Plataforma..." required="" name="plataforma" />
			                <span ng-show="formsoftware.plataforma.$touched && formsoftware.plataforma.$invalid" class="alerta">Introduzca la plataforma por favor</span>
			                <label for="marca">Plataforma</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="clasificacion" type="text" class="validate" id="form-clasificacion" placeholder="Clasificación..." required="" name="clasificacion" />
			                <span ng-show="formsoftware.clasificacion.$touched && formsoftware.clasificacion.$invalid" class="alerta">Introduzca su clasificación por favor</span>
			                <label for="marca">Clasificación</label>
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