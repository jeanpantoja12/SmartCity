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
include_once '../objects/Parque.php';
  
$database = new Database();
$db = $database->getConnection();
  
$parque = new Parques($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
$stmt = $parque->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $parque_arr=array();
    $parque_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $parque_item=array(
            "ID_Parque" => $ID_Parque,
            "PQ_Nombre" => $PQ_Nombre,
            "PQ_Descripcion" => $PQ_Descripcion,
            "ID_Distrito" => $ID_Distrito,
            "Distrito" => $Distrito,
            "PQ_Direccion" => $PQ_Direccion,
            "PQ_Direccion" => $PQ_Direccion
        );
  
        array_push($parque_arr["records"], $parque_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show sites data in json format
    echo json_encode($parque_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "Parques no encontrados.")
    );
}
?>
