<?php 
// include database and object file
include_once '../config/database.php';
include_once '../objects/queja.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$queja = new Queja($db);
 
// get queja id
$data = json_decode(file_get_contents("php://input"));     
 
// set queja id to be deleted
$queja->id = $data->id;
 
// delete the queja
if($queja->delete()){
    echo "Queja Eliminada";
}
 
// if unable to delete the queja
else{
    echo "Queja No Eliminada";
}
 ?>

