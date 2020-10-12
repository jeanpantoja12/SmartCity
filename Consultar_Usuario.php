<?PHP
$hostname_localhost ="mysql-jeanpantoja1.alwaysdata.net";
$database_localhost ="jeanpantoja1_smartcitybd";
$username_localhost ="215238_root";
$password_localhost ="smartcity123";

$json=array();

    if(isset($_GET["ID_Usuario"])){

            $id=$_GET['ID_Usuario'];


            $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

            $consulta="SELECT `ID_Usuario`, `US_Nombres`, `US_Apellidos`, `US_Direcccion`, `US_Fecha_Nacimiento`, `US_Nacionalidad`, `US_Telefono`, `US_Email`, `US_Contrasena`, `US_Tipo` FROM `Tbl_Usuario` WHERE `ID_Usuario`= '{$id}'";


            $resultado=mysqli_query($conexion,$consulta);

            if($registro=mysqli_fetch_assoc($resultado)){
                $json['usuario'][]=$registro;
            }

            else{
                print_r(mysqli_error());
            $resultar["ID_Usuario"]="No Registrado";
            $resultar['US_Nombres']="No User";
            $resultar['US_Apellidos']="No User";
            $resultar['US_Direccion']="No User";
            $resultar['US_Fecha_Nacimiento']="No User";
            $resultar['US_Nacionalidad']="No User";
            $resultar['US_Telefono']="No User";
            $resultar['US_Email']="No User";
            $resultar['US_Contrasena']="No User";
            $resultar['US_Tipo']="No User";
                $json['usuario'][]=$resultar;


            }
            mysqli_close($conexion);
            echo json_encode($json);
    }

    else{
        $resultar["success"]=0;
        $resultar["message"]='WS no retorna';
        $json['usuario'][]=$resultar;
        echo json_encode($json);
    }


?>
