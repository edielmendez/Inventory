<?php 
// include database and object file
include_once '../config/database.php';
include_once '../objects/software.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$software = new Software($db);
 
// get software id
$data = json_decode(file_get_contents("php://input"));     
 
// set software id to be deleted
$software->id = $data->id;
 
// delete the software
if($software->delete()){
    echo "Registro Eliminado";
}
 
// if unable to delete the software
else{
    echo "Registro No Eliminado";
}
 ?>

