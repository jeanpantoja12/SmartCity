<?php
class Eventos{
  
    // database connection and table name
    private $conn;
    private $table_name = "Tbl_Eventos";

  
    // object properties
    public $ID_Eventos;
    public $EVE_Nombres;
    public $EVE_Descripcion;
    public $EVE_Detalles;
    public $EVE_Fotografia;
    public $EVE_Fecha_Hora;
    public $EVE_Longitud;
    public $ID_Distrito;
    public $EVE_Latitud;
    public $Distrito;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
  
    // select all query
    $query = "SELECT
                c.ID_Eventos, c.EVE_Nombres, c.EVE_Descripcion ,c.EVE_Detalles, c.EVE_Fotografia, c.EVE_Fecha_Hora, c.EVE_Longitud, c.ID_Distrito,d.DIS_Nombre as Distrito, c.EVE_Latitud
            FROM
                " . $this->table_name . " c
                LEFT JOIN
                    Tbl_Distrito d
                        ON c.ID_Distrito = d.ID_Distrito";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
}
?>