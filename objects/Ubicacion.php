<?php
class Ubicacion{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Ubicacion";

  
    // object properties
    public $ID_Ubicacion;
    public $UB_URL;
    public $UB_Via;
    public $UB_Estado;
    public $UB_Nombre;
    public $UB_Longitud;
    public $UB_Latitud;
    public $UB_ViasAlternas;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
  
    // select all query
    $query = "SELECT
                c.ID_Ubicacion, c.UB_URL, c.UB_Via ,c.UB_Estado, c.UB_Nombre, c.UB_Longitud, c.UB_Latitud, c.UB_ViasAlternas
            FROM
                " . $this->table_name . " c";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

function Consulta_id(){
        // query to read single record
    $query = "SELECT
                o.ID_Ubicacion, o.UB_URL, o.UB_Via,  o.UB_Estado, o.UB_Nombre, o.UB_Longitud, o.UB_Latitud, o.UB_ViasAlternas
            FROM
                " . $this->table_name . " o
            WHERE
                o.ID_Ubicacion = ?
            LIMIT
                0,1";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Ubicacion);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Ubicacion = $row['ID_Ubicacion'];
    $this->UB_URL = $row['UB_URL'];
    $this->UB_Via = $row['UB_Via'];
    $this->UB_Estado = $row['UB_Estado'];
    $this->UB_Nombre = $row['UB_Nombre'];
    $this->UB_Longitud = $row['UB_Longitud'];
    $this->UB_Latitud = $row['UB_Latitud'];
    $this->UB_ViasAlternas = $row['UB_ViasAlternas'];
    }  
  
  
  
  
  
  function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE ID_Ubicacion = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->ID_Ubicacion=htmlspecialchars(strip_tags($this->ID_Ubicacion));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->ID_Ubicacion);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
    return false;
}
  
  
  
  
}
?>
