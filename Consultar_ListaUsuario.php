<?PHP
$hostname_localhost="mysql.jeanpantoja1.alwaysdata.net";
$database_localhost="jeanpantoja1_smartcitybd";
$username_localhost="215238_root";
$password_localhost="smartcity123";

$json=array();


        $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

        $consulta="select * from Tbl_Usuario";

        $resultado=mysqli_query($conexion,$consulta);

        while($registro=mysqli_fetch_array($resultado)){
            $json['Tbl_Usuario'][]=$registro;
        }

         mysqli_close($conexion);
         echo json_encode($json);
?>