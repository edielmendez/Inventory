<?php 
// get database connection
header('Access-Control-Allow-Origin: *');
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
include_once '../objects/queja.class.php';
$queja = new Queja($db);
 
// get posted data
//$data = json_decode(file_get_contents("php://input"));

//print_r($data);
/*echo $data->nombre;

return;*/

// set product property values

$queja->nombre = $_POST['name'];
$queja->telefono = $_POST['phone'];
$queja->email = $_POST['email'];
$queja->queja = $_POST['message'];
$queja->fecha = $_POST['fecha'];




//$software->created = date('Y-m-d');
     
// create the product
if($queja->create()){
    echo "done";
}
 
// if unable to create the product, tell the user
else{
    echo "fail";
}
 ?>