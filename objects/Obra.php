<?php
class Obra{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Obra";
  
    // object properties
    public $ID_Obra;
    public $OBR_Nombre;
    public $OBR_Descripcion;
    public $ID_Tipo;
    public $OBR_Fecha_Inicio;
    public $OBR_Fecha_Fin;
    public $OBR_Monto;
    public $OBR_Coordenada_X;
    public $OBR_Coordenada_Y;
    public $ID_Municipalidad;
    public $OBR_Dias_Calendarios;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET 
            OBR_Nombre=:OBR_Nombre, 
            OBR_Descripcion=:OBR_Descripcion, 
            ID_Tipo=:ID_Tipo, 
            OBR_Fecha_Inicio=:OBR_Fecha_Inicio, 
            OBR_Fecha_Fin=:OBR_Fecha_Fin, 
            OBR_Monto=:OBR_Monto, 
            OBR_Coordenada_X=:OBR_Coordenada_X, 
            OBR_Coordenada_Y=:OBR_Coordenada_Y, 
            ID_Municipalidad=:ID_Municipalidad, 
            OBR_Dias_Calendarios=:OBR_Dias_Calendarios";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->OBR_Nombre=htmlspecialchars(strip_tags($this->OBR_Nombre));
    $this->OBR_Descripcion=htmlspecialchars(strip_tags($this->OBR_Descripcion));
    $this->ID_Tipo=htmlspecialchars(strip_tags($this->ID_Tipo));
    $this->OBR_Fecha_Inicio=htmlspecialchars(strip_tags($this->OBR_Fecha_Inicio));
    $this->OBR_Fecha_Fin=htmlspecialchars(strip_tags($this->OBR_Fecha_Fin));
    $this->OBR_Monto=htmlspecialchars(strip_tags($this->OBR_Monto));
    $this->OBR_Coordenada_X=htmlspecialchars(strip_tags($this->OBR_Coordenada_X));
    $this->OBR_Coordenada_Y=htmlspecialchars(strip_tags($this->OBR_Coordenada_Y));
    $this->ID_Municipalidad=htmlspecialchars(strip_tags($this->ID_Municipalidad));
    $this->OBR_Dias_Calendarios=htmlspecialchars(strip_tags($this->OBR_Dias_Calendarios));
    // bind values
    $stmt->bindParam(":OBR_Nombre", $this->OBR_Nombre);
    $stmt->bindParam(":OBR_Descripcion", $this->OBR_Descripcion);
    $stmt->bindParam(":ID_Tipo", $this->ID_Tipo);
    $stmt->bindParam(":OBR_Fecha_Inicio", $this->OBR_Fecha_Inicio);
    $stmt->bindParam(":OBR_Fecha_Fin", $this->OBR_Fecha_Fin);
    $stmt->bindParam(":OBR_Monto", $this->OBR_Monto);
    $stmt->bindParam(":OBR_Coordenada_X", $this->OBR_Coordenada_X);
    $stmt->bindParam(":OBR_Coordenada_Y", $this->OBR_Coordenada_Y);
    $stmt->bindParam(":ID_Municipalidad", $this->ID_Municipalidad);
    $stmt->bindParam(":OBR_Dias_Calendarios", $this->OBR_Dias_Calendarios);
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
}
?>