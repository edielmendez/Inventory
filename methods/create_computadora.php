<?php 
// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/computadora.class.php';
$computadora = new Computadora($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

//print_r($data);
/*echo $data->nombre;

return;*/
$computadora->numero_asignado = $data->numero_asignado;

//print_r( $computadora->getNumeroAsignado());

if($computadora->getNumeroAsignado()){
	echo "1";
}else{
	$computadora->nombre = $data->nombre;
	$computadora->modelo = $data->modelo;
	$computadora->caracteristicas = $data->caracteristicas;
	$computadora->numero_de_serie = $data->numero_de_serie;
	$computadora->fecha_de_compra = $data->fecha_de_compra;
	$computadora->costo = $data->costo;
	$computadora->numero_asignado = $data->numero_asignado;

	if($computadora->create()){
    	echo "Registro Agredo Correctamente.";
	}
	else{
	    echo "Error Al Agregar el Nuevo Registro";
	}
}

/*
if($computadora->getNumeroAsignado()){
	$computadora->nombre = $data->nombre;
	$computadora->modelo = $data->modelo;
	$computadora->caracteristicas = $data->caracteristicas;
	$computadora->numero_de_serie = $data->numero_de_serie;
	$computadora->fecha_de_compra = $data->fecha_de_compra;
	$computadora->costo = $data->costo;
	$computadora->numero_asignado = $data->numero_asignado;

	if($computadora->create()){
    	echo "Registro Agredo Correctamente.";
	}
	else{
	    echo "Error Al Agregar un Nuevo hardware";
	}
}else{
	echo "Numero asignado ya existe";
}

*/


 ?>