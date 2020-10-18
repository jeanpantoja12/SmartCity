<?php
class Parques{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_parque";

  
    // object properties
    public $ID_Parque;
    public $PQ_Nombre;
    public $PQ_Descripcion;
    public $ID_Distrito;
    public $Distrito;
    public $PQ_Direccion;
    public $PQ_Nivel_humedad;
    public $PQ_Nivel_Radiacion;
    public $PQ_Nivel_Ruido;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET PQ_Nombre=:PQ_Nombre, PQ_Descripcion=:PQ_Descripcion, ID_Distrito=:ID_Distrito, PQ_Direccion=:PQ_Direccion, PQ_Nivel_humedad=:PQ_Nivel_humedad, PQ_Nivel_Radiacion=:PQ_Nivel_Radiacion, PQ_Nivel_Ruido=:PQ_Nivel_Ruido";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->PQ_Nombre=htmlspecialchars(strip_tags($this->PQ_Nombre));
    $this->PQ_Descripcion=htmlspecialchars(strip_tags($this->PQ_Descripcion));
    $this->ID_Distrito=htmlspecialchars(strip_tags($this->ID_Distrito));
    $this->PQ_Direccion=htmlspecialchars(strip_tags($this->PQ_Direccion));
    $this->PQ_Nivel_humedad=htmlspecialchars(strip_tags($this->PQ_Nivel_humedad));
    $this->PQ_Nivel_Radiacion=htmlspecialchars(strip_tags($this->PQ_Nivel_Radiacion));
    $this->PQ_Nivel_Ruido=htmlspecialchars(strip_tags($this->PQ_Nivel_Ruido));
    // bind values

    $stmt->bindParam(":PQ_Nombre", $this->PQ_Nombre);
    $stmt->bindParam(":PQ_Descripcion", $this->PQ_Descripcion);
    $stmt->bindParam(":ID_Distrito", $this->ID_Distrito);
    $stmt->bindParam(":PQ_Direccion", $this->PQ_Direccion);
    $stmt->bindParam(":PQ_Nivel_humedad", $this->PQ_Nivel_humedad);
    $stmt->bindParam(":PQ_Nivel_Radiacion", $this->PQ_Nivel_Radiacion);
    $stmt->bindParam(":PQ_Nivel_Ruido", $this->PQ_Nivel_Ruido);
   

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
      
}
function Consulta(){
        // query to read single record
    $query = "SELECT
                p.ID_Parque, p.PQ_Nombre, p.PQ_Descripcion, p.ID_Distrito,d.DIS_Nombre as Distrito,p.PQ_Direccion,p.PQ_Nivel_humedad, p.PQ_Nivel_Ruido,p.PQ_Nivel_Radiacion
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    Tbl_Distrito d
                        ON p.ID_Distrito = d.ID_Distrito
            WHERE
                p.ID_Parque = ?
            LIMIT
                0,1";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Parque);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Parque = $row['ID_Parque'];
    $this->PQ_Nombre = $row['PQ_Nombre'];
    $this->PQ_Descripcion = $row['PQ_Descripcion'];
    $this->ID_Distrito = $row['ID_Distrito'];
    $this->Distrito = $row['Distrito'];
    $this->PQ_Direccion = $row['PQ_Direccion'];
    $this->PQ_Nivel_humedad = $row['PQ_Nivel_humedad'];
    $this->PQ_Nivel_Ruido = $row['PQ_Nivel_Ruido'];
    $this->PQ_Nivel_Radiacion = $row['PQ_Nivel_Radiacion'];
    }
  
  function read(){
  
    // select all query
    $query = "SELECT
                p.ID_Parque, p.PQ_Nombre, p.PQ_Descripcion, p.ID_Distrito,d.DIS_Nombre as Distrito,p.PQ_Direccion, p.PQ_Nivel_humedad, p.PQ_Nivel_Radiacion, p.PQ_Nivel_Ruido
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    Tbl_Distrito d
                        ON p.ID_Distrito = d.ID_Distrito
            ";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
}
?>
