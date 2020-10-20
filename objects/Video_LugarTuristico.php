
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

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

  

}
?>
