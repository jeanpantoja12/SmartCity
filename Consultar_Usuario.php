<?PHP
$hostname_localhost="mysql.jeanpantoja1.alwaysdata.net";
$database_localhost="jeanpantoja1_smartcitybd";
$username_localhost="215238_root";
$password_localhost="smartcity123";

$json=array();

    if(isset($_GET["ID_Usuario"])){

            $ID_Usuario=$_GET['ID_Usuario'];

            $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

            $consulta="select ID_Usuario, US_Nombres, US_Apellidos,US_Direcccion,US_Fecha_Nacimiento,US_Nacionalidad,US_Telefono,US_Email,US_Contraseña,US_Tipo from Tbl_Usuario where ID_Usuario= '{$ID_Usuario}'";

            $resultado=mysqli_query($conexion,$consulta);

            if($registro=mysqli_fetch_array($resultado)){
                $json['Tbl_Usuario'][]=$registro;
            }

            else{
                $resultar["ID_Usuario"]=0;
                $resultar["US_Nombres"]='No registra';
                $resultar["US_Apellidos"]='No registra';
                 $resultar["US_Direcccion"]='No registra';
                $resultar["US_Fecha_Nacimiento"]='No registra';
                 $resultar["US_Nacionalidad"]='No registra';
                $resultar["US_Telefono"]='No registra';
                 $resultar["US_Email"]='No registra';
                $resultar["US_Contraseña"]='No registra';
                $resultar["US_Tipo"]='No registra';
                $json['Tbl_Usuario'][]=$resultar;
            }

            mysqli_close($conexion);
            echo json_encode($json);
    }

    else{
        $resultar["success"]=0;
        $resultar["message"]='WS no retorna';
        $json['Tbl_Usuario'][]=$resultar;
        echo json_encode($json);
    }


?>