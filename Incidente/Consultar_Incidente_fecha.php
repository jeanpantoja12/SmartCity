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
$incidente = new Incidente($db);
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
// set ID property of record to read
$stmt = $incidente->Consultafecha($keywords);
  
// read the details of product to be edited
$num = $stmt->rowCount();
  
if($num>0){
    // create array
    $incidente_arr = array();
    $incidente_arr["records"]=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $incidente_item= array(
        "ID_Vehiculo" =>  $incidente->ID_Vehiculo,
        "ID_Usuario" => $incidente->ID_Usuario,
        "ind_Descripcion" => $incidente->ind_Descripcion,
        "ind_Fotografia" => $incidente->ind_Fotografia,
        "ind_Fecha_Incidente" => $incidente->ind_Fecha_Incidente,
        "ID_Incidente" => $incidente->ID_Incidente
    );
        array_push($incidente_arr["records"], $incidente_item);
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
