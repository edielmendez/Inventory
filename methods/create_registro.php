<?php 
// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/registro.class.php';
$registro = new Registro($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

//print_r($data);
/*echo $data->nombre;

return;*/

// set product property values

$registro->numero_de_maquina = $data->numero_de_maquina;
$registro->matricula = $data->matricula;
$registro->hora_entrada = $data->hora_entrada;
$registro->hora_salida = "00:00:00";
$registro->fecha = $data->fecha;




//$software->created = date('Y-m-d');
     
// create the product
if($registro->create()){
    echo "Registro Agredo Correctamente.";
}
 
// if unable to create the product, tell the user
else{
    echo "Error Al Agregar un Nuevo registro";
}
 ?>