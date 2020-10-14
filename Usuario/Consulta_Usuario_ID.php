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
$data = file_get_contents('php://input');
$json = json_decode($data);
//$data = json_decode(file_get_contents("php://input"));

 
// read the details of product to be edited
$user = $json->{'ID_Usuario'};
  
if($user->ID_Usuario!=null)
{
    
$stmt = $user->ConsultaID();
    // create array
    $user_arr = array(
    if($stmt->rowCount() > 0){    
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
  }else{
        $user_arr=array(
            "status" => false,
            "message" => "Usuario Incorrecto",
        );
        http_response_code(404);
        
    }
}

else
{
    $user_arr=array(
            "status" => false,
            "message" => "Datos Incompletos",
        );
    http_response_code(500);
}
echo json_encode($user_arr);

?>