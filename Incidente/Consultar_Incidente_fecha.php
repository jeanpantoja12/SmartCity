<?PHP
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Incidente.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
// prepare product object
$incidente = new Incidente($db);
// get keywords
$incidente=isset($_GET["ID_Vehiculo"]) ? $_GET["ID_Vehiculo"] : die();
// set ID property of record to read
$incidente->Consultafecha();
  
// read the details of product to be edited
  
if($incidente->name!=null){
    // create array
    $incidente_arr = array(
        "ID_Vehiculo" => $incidente->ID_Vehiculo,
            "ID_Usuario" => $incidente->ID_Usuario,
            "ind_Descripcion" => $incidente->ind_Descripcion,
            "ind_Fotografia" => $incidente->ind_Fotografia,
            "ind_Fecha_Incidente" => $incidente->ind_Fecha_Incidente,
            "ID_Tipo_Ind" => $incidente->ID_Tipo_Ind,
            "ID_Incidente" => $incidente->ID_Incidente
    );
        
    }
        
    
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($incidente_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(
        array("message" => "Incidente no existe.")
    );
}

?>
