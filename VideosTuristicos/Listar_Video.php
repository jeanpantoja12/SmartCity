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
include_once '../objects/Video_LugarTuristico.php';
  
$database = new Database();
$db = $database->getConnection();
  
$video = new videoLugar($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
$stmt = $video->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $video_arr=array();
    $video_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $video_item=array(
            "ID_Video_LT" => $ID_Lugar_Turistico,
            "ID_Lugar_Turistico" => $ID_Lugar_Turistico,
            "VL_Descripcion" => $VL_Descripcion,
            "VL_URL" => $VL_URL,
            "Nombre_lugar" => $Nombre_lugar
        );
  
        array_push($video_arr["records"], $video_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show sites data in json format
    echo json_encode($lugart_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "Videos no encontrados.")
    );
}
?>