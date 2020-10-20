
<?php
class Video_LT{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Video_LugarTuristico";

      // object properties
    public $ID_Video_LT;
    public $ID_Lugar_Turistico;
    public $VL_Descripcion;
    public $VL_URL;
    public $Nombre_lugar;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
  
  
  
  
  
  
  
  
  
  
  function ConsultaIdLT(){
        // query to read single record
    $query = "SELECT v.ID_Video_LT, v.ID_Lugar_Turistico, l.LT_Nombre, v.VL_Descripcion, v.VL_URL FROM" . $this->table_name . " v INNER JOIN Tbl_Lugar_Turistico l ON v.ID_Lugar_Turistico = l.ID_Lugar_Turistico WHERE v.ID_Lugar_Turistico = ? LIMIT 0,1";
                // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(1, $this->ID_Lugar_Turistico);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->ID_Video_LT = $row['ID_Video_LT'];
    $this->ID_Lugar_Turistico = $row['ID_Lugar_Turistico'];
    $this->LT_Nombre = $row['LT_Nombre'];
    $this->VL_Descripcion = $row['VL_Descripcion'];
    $this->VL_URL = $row['VL_URL'];
    }

  function read(){
  
    // select all query
    $query = "SELECT
                v.ID_Video_LT, v.VL_Descripcion, v.VL_URL, l.LT_Nombre. as Nombre_lugar, v.ID_Lugar_Turistico
            FROM
                " . $this->table_name . " v
                LEFT JOIN
                    Tbl_Lugar_Turistico l
                        ON v.ID_Lugar_Turistico = l.ID_Lugar_Turistico
            ";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
} 
  

}
?>
