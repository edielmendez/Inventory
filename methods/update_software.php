
<?php 
// include database and object files
include_once '../config/database.php';
include_once '../objects/software.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$software = new Software($db);
 
// get id of software to be edited
$data = json_decode(file_get_contents("php://input"));     


// set ID property of software to be edited
$software->id = $data->id;
 
// set software property values

$software->nombre = $data->nombre;
$software->version = $data->version;
$software->marca = $data->marca;
$software->documento_de_amparo = $data->documento_de_amparo;
$software->numero_licencias = $data->numero_licencias;
$software->plataforma = $data->plataforma;
$software->clasificacion = $data->clasificacion;
$software->observaciones = $data->observaciones;

 
// update the software
if($software->update()){
    echo "Registro Actualizado.";
}
 
// if unable to update the software, tell the user
else{
    echo "Registro NO Actualizado..";
}
 ?>