<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
// include database and object files
include_once '../config/database.php';
include_once '../objects/Conductor.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
  
$conductor = new Conductor($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if( 
  
    !empty($data->CON_Nombre) &&
    !empty($data->CON_Apellidos) &&
    !empty($data->CON_Telefono) &&
    !empty($data->CON_Direccion) &&
    !empty($data->CON_Licencia) &&
    !empty($data->CON_Fotografia_Perfil) 
    !empty($data->ID_Empresa_Transp) &&
    !empty($data->CON_Latitud) &&
    !empty($data->CON_Longitud) 
    !empty($data->CON_Status) &&
    !empty($data->CON_FCM) &&
    !empty($data->CON_Fotografia_Licencia)&&
 
 
){
  


    $conductor->VEH_Placa = $data->VEH_Placa;
    $conductor->VEH_Color = $data->VEH_Color;
    $conductor->VEH_Modelo = $data->VEH_Modelo;
    $conductor->VEH_Marca = $data->VEH_Marca;
    $conductor->ID_Tipo_Vehiculo = $data->ID_Tipo_Vehiculo;
    $conductor->ID_Conductor = $data->ID_Conductor;


    if($conductor->create()){
  
       
        http_response_code(201);
  

        echo json_encode(array("message" => "Conductor creado correctamente."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Error en la solicitud"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Error, datos incompletos"));
}
?>
