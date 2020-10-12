<?php
class Vehiculo{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Conductor";

    // object properties
    public $ID_Conductor;
    public $CON_Nombre;
    public $CON_Apellidos;
    public $CON_Telefono;
    public $CON_Direccion;
    public $CON_Licencia;
    public $CON_Fotografia_Perfil
    public $ID_Empresa_Transp;
    public $CON_Latitud;
    public $CON_Longitud;
    public $CON_Status;
    public $CON_FCM;
    public $CON_Fotografia_Licencia ;
  ;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET CON_Nombre=:CON_Nombre, CON_Apellidos=:CON_Apellidos, CON_Telefono=:CON_Telefono, CON_Direccion=:CON_Direccion, CON_Licencia=:CON_Licencia, CON_Fotografia_Perfil=:CON_Fotografia_Perfil, ID_Empresa_Transp=:ID_Empresa_Transp, CON_Latitud=:CON_Latitud, CON_Longitud=:CON_Longitud, CON_Status=:CON_Status, CON_FCM=:CON_FCM, CON_Fotografia_Licencia=:CON_Fotografia_Licencia";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->CON_Nombre=htmlspecialchars(strip_tags($this->CON_Nombre));
    $this->CON_Apellidos=htmlspecialchars(strip_tags($this->CON_Apellidos));
    $this->CON_Telefono=htmlspecialchars(strip_tags($this->CON_Telefono));
    $this->CON_Direccion=htmlspecialchars(strip_tags($this->CON_Direccion));
    $this->CON_Licencia=htmlspecialchars(strip_tags($this->CON_Licencia));
    $this->CON_Fotografia_Perfil=htmlspecialchars(strip_tags($this->CON_Fotografia_Perfil));
     $this->ID_Empresa_Transp=htmlspecialchars(strip_tags($this->ID_Empresa_Transp));
      $this->CON_Latitud=htmlspecialchars(strip_tags($this->CON_Latitud));
       $this->CON_Longitud=htmlspecialchars(strip_tags($this->CON_Longitud));
        $this->CON_Status=htmlspecialchars(strip_tags($this->CON_Status));
         $this->CON_FCM=htmlspecialchars(strip_tags($this->CON_FCM));
          $this->CON_Fotografia_Licencia=htmlspecialchars(strip_tags($this->CON_Fotografia_Licencia));
    // bind values

    $stmt->bindParam(":CON_Nombre", $this->CON_Nombre);
    $stmt->bindParam(":CON_Apellidos", $this->CON_Apellidos);
    $stmt->bindParam(":CON_Telefono", $this->CON_Telefono);
    $stmt->bindParam(":CON_Direccion", $this->CON_Direccion);
    $stmt->bindParam(":CON_Licencia", $this->CON_Licencia);
    $stmt->bindParam(":CON_Fotografia_Perfil", $this->CON_Fotografia_Perfil);
    $stmt->bindParam(":ID_Empresa_Transp", $this->ID_Empresa_Transp);
    $stmt->bindParam(":CON_Latitud", $this->CON_Latitud);
    $stmt->bindParam(":CON_Longitud", $this->CON_Longitud);
    $stmt->bindParam(":CON_Status", $this->CON_Status);
    $stmt->bindParam(":CON_FCM", $this->CON_FCM);
    $stmt->bindParam(":CON_Fotografia_Licencia", $this->CON_Fotografia_Licencia);
    

    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}

}
?>