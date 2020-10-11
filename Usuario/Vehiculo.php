<?php
class Vehiculo{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Vehiculo";
   //private $table_name = "Tbl_Conductor";
  
    // object properties
    public $ID_Vehiculo;
    public $VEH_Conductor;
    public $VEH_Placa;
    public $VEH_Color;
    public $VEH_Modelo;
    public $VEH_Marca;
    public $VEH_Tipo;
    public $ID_Vehiculo;
  ;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET VEH_Conductor=:VEH_Conductor, VEH_Placa=:VEH_Placa, VEH_Color=:VEH_Color, VEH_Modelo=:VEH_Modelo, VEH_Marca=:VEH_Marca, VEH_Tipo=:VEH_Tipo, ID_Vehiculo=:ID_Vehiculo";

    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->VEH_Conductor=htmlspecialchars(strip_tags($this->VEH_Conductor));
    $this->VEH_Placa=htmlspecialchars(strip_tags($this->VEH_Placa));
    $this->VEH_Color=htmlspecialchars(strip_tags($this->VEH_Color));
    $this->VEH_Modelo=htmlspecialchars(strip_tags($this->VEH_Modelo));
    $this->VEH_Marca=htmlspecialchars(strip_tags($this->VEH_Marca));
    $this->VEH_Tipo=htmlspecialchars(strip_tags($this->VEH_Tipo));
    $this->ID_Vehiculo=htmlspecialchars(strip_tags($this->ID_Vehiculo));
    // bind values
    $stmt->bindParam(":VEH_Conductor", $this->VEH_Conductor);
    $stmt->bindParam(":VEH_Placa", $this->VEH_Placa);
    $stmt->bindParam(":VEH_Color", $this->VEH_Color);
    $stmt->bindParam(":VEH_Modelo", $this->VEH_Modelo);
    $stmt->bindParam(":VEH_Marca", $this->VEH_Marca);
    $stmt->bindParam(":VEH_Tipo", $this->VEH_Tipo);
    $stmt->bindParam(":ID_Vehiculo", $this->ID_Vehiculo);

    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
}
?>
