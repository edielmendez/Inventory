<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/registro.class.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$registro = new Registro($db);

// query products
$stmt = $registro->readAll();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
	
	$data="";
	$x=1;
	
	// retrieve our table contents
	// fetch() is faster than fetchAll()
	// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// extract row
		// this will make $row['name'] to
		// just $name only
		extract($row);
		
		$data .= '{';
			$data .= '"id":"'  . $id . '",';
			$data .= '"numero_de_maquina":"'   . $numero_de_maquina . '",';
			$data .= '"matricula":"'   . $matricula . '",';
			$data .= '"hora_entrada":"'   . html_entity_decode($hora_entrada ) . '",';
			$data .= '"hora_salida":"'   . $hora_salida . '",';
			$data .= '"fecha":"'   . $fecha . '"';


		$data .= '}'; 
		
		$data .= $x<$num ? ',' : ''; 
		
		$x++;
	}
}


// json format output
echo '{"records":[' . $data . ']}';



 ?>