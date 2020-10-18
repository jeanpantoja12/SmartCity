<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/Conductor.php';
  
$database = new Database();
$db = $database->getConnection();
  
$comment = new Conductor($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if( 
    !empty($data->CON_Nombre) &&
    !empty($data->CON_Apellidos) &&
    !empty($data->CON_Telefono) &&
    !empty($data->CON_Direccion) &&
    !empty($data->CON_Licencia) &&
    !empty($data->CON_Fotografia_Perfil) &&
    !empty($data->ID_Empresa_Transp) &&
    !empty($data->CON_Latitud) &&
    !empty($data->CON_Longitud) &&
    !empty($data->CON_Status) &&
    !empty($data->CON_FCM) &&
    !empty($data->CON_Fotografia_Licencia) &&
    !empty($data->CON_Email) &&
    !empty($data->CON_Contrasena)
){
  
    // set product property values
    $conductor->CON_Nombre = $data->CON_Nombre;
    $conductor->CON_Apellidos = $data->CON_Apellidos;
    $conductor->CON_Telefono = $data->CON_Telefono;
    $conductor->CON_Direccion = $data->CON_Direccion;
    $conductor->CON_Licencia = $data->CON_Licencia;
    $conductor->CON_Fotografia_Perfil = $data->CON_Fotografia_Perfil;
    $conductor->ID_Empresa_Transp = $data->ID_Empresa_Transp;
    $conductor->CON_Latitud = $data->CON_Latitud;
    $conductor->CON_Longitud = $data->CON_Longitud;
    $conductor->CON_Status = $data->CON_Status;
    $conductor->CON_FCM = $data->CON_FCM;
    $conductor->CON_Fotografia_Licencia = $data->CON_Fotografia_Licencia;
    $conductor->CON_Email = $data->CON_Email;
    $conductor->CON_Contrasena = $data->CON_Contrasena;
    // create the product
    if($conductor->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the obra
        echo json_encode(array("message" => "Conductor creado correctamente."));
    }
  
    // if unable to create the product, tell the obra
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the obra
        echo json_encode(array("message" => "Error en la solicitud"));
    }
}
  
// tell the obra data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the obra
    echo json_encode(array("message" => "Error, datos incompletos"));
}
?>
