<?php
class Conductor{
  
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
    public $CON_Fotografia_Perfil;
    public $ID_Empresa_Transp;
    public $CON_Latitud;
    public $CON_Longitud;
    public $CON_Status;
    public $CON_FCM;
    public $CON_Fotografia_Licencia;
    public $CON_Contrasena;
    public $CON_Email;
    public $Nombre_Conductor;
    public $Nombre_Empresa;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET CON_Nombre=:CON_Nombre, CON_Apellidos=:CON_Apellidos, CON_Telefono=:CON_Telefono, CON_Direccion=:CON_Direccion, CON_Licencia=:CON_Licencia, CON_Fotografia_Perfil=:CON_Fotografia_Perfil, ID_Empresa_Transp=:ID_Empresa_Transp, CON_Latitud=:CON_Latitud, CON_Longitud=:CON_Longitud, CON_Status=:CON_Status, CON_FCM=:CON_FCM, CON_Fotografia_Licencia=:CON_Fotografia_Licencia, CON_Contrasena=:CON_Contrasena, CON_Email=:CON_Email";

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
    $this->CON_Contrasena=htmlspecialchars(strip_tags($this->CON_Contrasena));
    $this->CON_Email=htmlspecialchars(strip_tags($this->CON_Email));
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
    $stmt->bindParam(":CON_Contrasena", $this->CON_Contrasena);
    $stmt->bindParam(":CON_Email", $this->CON_Email);
    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
      
}
  
  
  
  
  
  
  function update(){
    // query to insert record
    $query = "UPDATE
                " . $this->table_name . "
            SET 
            CON_Nombre = :CON_Nombre,
            CON_Apellidos = :CON_Apellidos, 
            CON_Telefono = :CON_Telefono,
            CON_Direccion = :CON_Direccion,
            CON_Licencia = :CON_Licencia, 
            CON_Fotografia_Perfil = :CON_Fotografia_Perfil,
            ID_Empresa_Transp = :ID_Empresa_Transp,
            CON_Latitud = :CON_Latitud,
            CON_Longitud = :CON_Longitud,
            CON_Status = :CON_Status,
            CON_FCM = :CON_FCM,
            CON_Fotografia_Licencia = :CON_Fotografia_Licencia,
            CON_Email = :CON_Email
            WHERE
                ID_Conductor = :ID_Conductor";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->ID_Conductor=htmlspecialchars(strip_tags($this->ID_Conductor));
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
    $this->CON_Email=htmlspecialchars(strip_tags($this->CON_Email));

    // bind values
    $stmt->bindParam(":ID_Conductor", $this->ID_Conductor);
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
    $stmt->bindParam(":CON_Email", $this->CON_Email);
    // execute query
    if($stmt->execute()){
        return true;
        
    }
    
    return false;
}
  
  
function read(){
  
    // select all query
    $query = "SELECT
                c.ID_Conductor, c.CON_Nombre, c.CON_Apellidos, c.CON_Telefono, c.CON_Direccion, c.CON_Licencia,c.CON_Fotografia_Perfil, c.ID_Empresa_Transp, c.CON_Latitud, c.CON_Longitud, c.CON_Status, c.CON_FCM, c.CON_Fotografia_Licencia, c.CON_Email
            FROM
                " . $this->table_name . " c";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}    
  
  
  function Consulta(){
        // query to read single record
    $query = "SELECT
                c.ID_Conductor, CONCAT(c.CON_Nombre,' ',c.CON_Apellidos) as Nombre_Conductor, c.CON_Telefono, c.CON_Direccion, c.CON_Licencia, c.CON_Fotografia_Perfil, e.EMT_Nombre as Nombre_Empresa, c.CON_Latitud, c.CON_Longitud, c.CON_FCM, c.CON_Fotografia_Licencia, c.CON_Email
            FROM
                " . $this->table_name . " c
                LEFT JOIN
                    Tbl_Empresa_Trans e
                        ON c.ID_Empresa_Transp = e.ID_Empresa_Transp
                
            WHERE
                c.ID_Conductor = ?
            LIMIT
                0,1";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Conductor);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Conductor = $row['ID_Conductor'];
    $this->Nombre_Conductor = $row['Nombre_Conductor'];
    $this->CON_Telefono = $row['CON_Direccion'];
    $this->CON_Licencia = $row['CON_Licencia'];
    $this->CON_Fotografia_Perfil = $row['CON_Fotografia_Perfil'];
    $this->Nombre_Empresa = $row['Nombre_Empresa'];
    $this->CON_Latitud = $row['CON_Latitud'];
    $this->CON_Longitud = $row['CON_Longitud'];
    $this->CON_FCM = $row['CON_FCM'];
    $this->CON_Fotografia_Licencia = $row['CON_Fotografia_Licencia'];
    $this->CON_Email = $row['CON_Email'];
    }

  
  
  
   function delete(){
  

    $query = "DELETE FROM " . $this->table_name . " WHERE ID_Conductor = ?";
  
    $stmt = $this->conn->prepare($query);
  
    $this->ID_Conductor=htmlspecialchars(strip_tags($this->ID_Conductor));
  
   $stmt->bindParam(1, $this->ID_Conductor);
  
    if($stmt->execute()){
        return true;
    }
  
 }
  
  
 

}
?>
