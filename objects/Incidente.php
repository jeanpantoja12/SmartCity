<?php
class Incidente{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Incidente";
    //private $table_name = "Tbl_Conductor";
    //private $table_name = "Tbl_Tipo_Vehiculo";
  
    // object properties
    public $ID_Vehiculo;
    public $ID_Usuario;
    public $ind_Descripcion;
    public $ind_Fotografia;
    public $ind_Fecha_Incidente;
    public $ID_Incidente;   
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET ID_Vehiculo=:ID_Vehiculo, ID_Usuario=:ID_Usuario, ind_Descripcion=:ind_Descripcion, ind_Fotografia=:ind_Fotografia, ind_Fecha_Incidente=:ind_Fecha_Incidente";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->ID_Vehiculo=htmlspecialchars(strip_tags($this->ID_Vehiculo));
    $this->ID_Usuario=htmlspecialchars(strip_tags($this->ID_Usuario));
    $this->ind_Descripcion=htmlspecialchars(strip_tags($this->ind_Fotografia));
    $this->ind_Fotografia=htmlspecialchars(strip_tags($this->ind_Fotografia));
    $this->ind_Fecha_Incidente=htmlspecialchars(strip_tags($this->ind_Fecha_Incidente));
    // bind values

    $stmt->bindParam(":ID_Vehiculo", $this->ID_Vehiculo);
    $stmt->bindParam(":ID_Usuario", $this->ID_Usuario);
    $stmt->bindParam(":ind_Descripcion", $this->ind_Descripcion);
    $stmt->bindParam(":ind_Fotografia", $this->ind_Fotografia);
    $stmt->bindParam(":ind_Fecha_Incidente", $this->ind_Fecha_Incidente);
    
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
    function Consulta(){
        // query to read single record
    $query = "SELECT
                i.ID_Incidente, i.ID_Vehiculo, i.ID_Usuario, i.ind_Descripcion, i.ind_Fotografia, i.ind_Fecha_Incidente
            FROM
                " . $this->table_name . " i
                LEFT JOIN
                    Tbl_Vehiculo v
                        ON i.ID_Vehiculo = v.ID_Vehiculo
                LEFT JOIN
                    Tbl_Usuario u
                        ON i.ID_Usuario = u.ID_Usuario
            WHERE
                i.ID_Incidente = ?
           
            LIMIT
                0,1";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Incidente);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Incidente = $row['ID_Incidente'];
    $this->ID_Vehiculo = $row['ID_Vehiculo'];
    $this->ID_Usuario = $row['ID_Usuario'];
    $this->ind_Descripcion = $row['ind_Descripcion'];
    $this->ind_Fotografia = $row['ind_Fotografia'];
    $this->ind_Fecha_Incidente = $row['ind_Fecha_Incidente'];
    }
   function Consultafecha(){
        // query to read single record
    $query = "SELECT
                i.ID_Incidente, i.ID_Vehiculo, i.ID_Usuario, i.ind_Descripcion, i.ind_Fotografia, i.ind_Fecha_Incidente
            FROM
                " . $this->table_name . " i
                LEFT JOIN
                    Tbl_Vehiculo v
                        ON i.ID_Vehiculo = v.ID_Vehiculo
                LEFT JOIN
                    Tbl_Usuario u
                        ON i.ID_Usuario = u.ID_Usuario
            WHERE
                i.ID_Vehiculo = ?
            ORDER BY
                i.ind_Fecha_Incidente DESC";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Vehiculo);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Incidente = $row['ID_Incidente'];
    $this->ID_Vehiculo = $row['ID_Vehiculo'];
    $this->ID_Usuario = $row['ID_Usuario'];
    $this->ind_Descripcion = $row['ind_Descripcion'];
    $this->ind_Fotografia = $row['ind_Fotografia'];
    $this->ind_Fecha_Incidente = $row['ind_Fecha_Incidente'];
    }
}
?>
