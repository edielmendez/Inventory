<?php 
if (session_id()==null)
  session_start();
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$userActual = new User($db);

$user = $_POST['username'];
$password = $_POST['password'];





$userActual->username = $user;


$userActual->password = $password;

$userActual->readOneForLogin();

/*
print_r($userActual->id);
return;*/


$array_usuario = array(
    "id" =>  $userActual->id,
    "username" => $userActual->username,
    "email" => $userActual->email,
    "password" => $userActual->password,
    "created" => $userActual->created
);



if ($userActual->id) {
	$_SESSION['user'] = $array_usuario;

	header("location:../views/inicio.php");
}else{
	$_SESSION['msj'] = "LO SENTIMOS NO ESTA REGISTRADO";

	header("location:../index.php");
}

 ?>