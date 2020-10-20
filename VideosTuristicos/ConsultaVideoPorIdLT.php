<?PHP
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Video_LugarTuristico.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$videoLT= new Video_LT($db);
// set ID property of record to read
$videoLT->ID_Lugar_Turistico = isset($_GET['ID_Lugar_Turistico']) ? $_GET['ID_Lugar_Turistico'] : die();
  
// read the details of product to be edited
$videoLT->ConsultaIdLT();
  
if($videoLT->ID_Lugar_Turistico!=null){
    // create array
    $videoLT_arr = array(
        "ID_Video_LT" =>  $videoLT->ID_Video_LT,
        "ID_Lugar_Turistico" => $videoLT->ID_Lugar_Turistico,
        "LT_Nombre" => $videoLT->LT_Nombre,
        "VL_Descripcion" => $videoLT->VL_Descripcion,
        "VL_URL" => $videoLT->VL_URL
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($videoLT_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "Video de Lugar Turístico no existe."));
}


?>