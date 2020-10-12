<?php
class Lugarturistico{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Lugar_Turistico";
  
    // object properties
    public $ID_Lugar_Turistico;
    public $LT_Nombre;
    public $LT_Descripcion;
    public $LT_URL_Map;
    public $ID_Distrito;
    public $LT_Hora_Inicio;
    public $LT_Hora_Fin;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET LT_Nombre=:LT_Nombre, LT_Descripcion=:LT_Descripcion, LT_URL_Map=:LT_URL_Map, ID_Distrito=:ID_Distrito, LT_Hora_Inicio=:LT_Hora_Inicio, LT_Hora_Fin=:LT_Hora_Fin";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->LT_Nombre=htmlspecialchars(strip_tags($this->LT_Nombre));
    $this->LT_Descripcion=htmlspecialchars(strip_tags($this->LT_Descripcion));
    $this->LT_URL_Map=htmlspecialchars(strip_tags($this->LT_URL_Map));
    $this->ID_Distrito=htmlspecialchars(strip_tags($this->ID_Distrito));
    $this->LT_Hora_Inicio=htmlspecialchars(strip_tags($this->LT_Hora_Inicio));
    $this->LT_Hora_Fin=htmlspecialchars(strip_tags($this->LT_Hora_Fin));

    // bind values
    $stmt->bindParam(":LT_Nombre", $this->LT_Nombre);
    $stmt->bindParam(":LT_Descripcion", $this->LT_Descripcion);
    $stmt->bindParam(":LT_URL_Map", $this->LT_URL_Map);
    $stmt->bindParam(":ID_Distrito", $this->ID_Distrito);
    $stmt->bindParam(":LT_Hora_Inicio", $this->LT_Hora_Inicio);
    $stmt->bindParam(":LT_Hora_Fin", $this->LT_Hora_Fin);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
}
?>