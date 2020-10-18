<?PHP
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Conductor.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$conductor = new Conductor($db);
// set ID property of record to read
$conductor->ID_Conductor = isset($_GET['ID_Conductor']) ? $_GET['ID_Conductor'] : die();
  
// read the details of product to be edited
$conductor->Consulta();
$data = file_get_contents('php://input');
$json = json_decode($data);

if($conductor->ID_Conductor!=null){
    // create array
    $conductor_arr = array(
        "ID_Conductor" =>  $conductor->ID_Conductor,
        "Nombre_Conductor" => $conductor->Nombre_Conductor,
        "CON_Telefono" => $conductor->CON_Telefono,
        "CON_Direccion" => $conductor->CON_Direccion,
        "CON_Licencia" => $conductor->CON_Licencia,
        "CON_Fotografia_Perfil" => $conductor->CON_Fotografia_Perfil,
        "Nombre_Empresa" => $conductor->Nombre_Empresa,
        "CON_Latitud" => $conductor->CON_Latitud,
        "CON_Longitud" => $conductor->CON_Longitud,
        "CON_FCM" => $conductor->CON_Longitud,
        "CON_Fotografia_Licencia" => $conductor->CON_Fotografia_Licencia,
        "CON_Email" => $conductor->CON_Email,

    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($conductor_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "Conductor no existe."));
}

?>