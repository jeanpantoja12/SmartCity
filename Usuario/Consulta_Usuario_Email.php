<?PHP
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/usuario.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$user = new Usuario($db);
// set ID property of record to read
$user->US_Email = isset($_GET['US_Email']) ? $_GET['US_Email'] : die();
  
// read the details of product to be edited
$user->ConsultaEmail();
  
if($user->US_Email!=null){
    // create array
    $user_arr = array(
        "ID_Usuario" =>  $user->ID_Usuario,
        "US_Nombres" => $user->US_Nombres,
        "US_Apellidos" => $user->US_Apellidos,
        "US_Direccion" => $user->US_Direccion,
        "US_Fecha_Nacimiento" => $user->US_Fecha_Nacimiento,
        "US_Nacionalidad" => $user->US_Nacionalidad,
        "US_Telefono" => $user->US_Telefono,
        "US_Email" => $user->US_Email
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($user_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "Usuario no existe."));
}


?>