<?php
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
 
// prepare user object
$user = new Usuario($db);

// set ID property of user to be edited
$user->US_Email = isset($_GET['US_Email']) ? $_GET['US_Email'] : die();
$user->US_Contrasena = isset($_GET['US_Contrasena']) ? $_GET['US_Contrasena'] : die();  

// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "ID_Usuario" => $row['ID_Usuario'],
        "US_Email" => $row['US_Email']
    );
    http_response_code(200);
    echo json_encode($user_arr);
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
    http_response_code(404);
    echo json_encode($user_arr);
}
?>