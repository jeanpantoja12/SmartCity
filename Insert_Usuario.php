<?php
$hostname_localhost ="mysql-jeanpantoja1.alwaysdata.net";
$database_localhost ="jeanpantoja1_smartcitybd";
$username_localhost = "215238_root";
$password_localhost = "smartcity123";

$json=array();

	if(isset($_GET["US_Nombres"]) && isset($_GET["US_Apellidos"]) && isset($_GET["US_Email"]) && isset($_GET["US_Contrasena"]) && isset($_GET["US_Tipo"])){
		$nombre = $_GET['US_Nombres'];
		$apellidos = $_GET['US_Apellidos'];
		$direccion = $_GET['US_Direccion'];
		$fecha_nac = $_GET['US_Fecha_Nacimiento'];
		$nacionalidad = $_GET['US_Nacionalidad'];
		$telefono = $_GET['US_Telefono'];
		$email = $_GET['US_Email'];
		$password = $_GET['US_Contrasena'];
		$tipo = $_GET['US_Tipo'];
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost) or die ("Unable to connect to host");
		$insert="INSERT INTO `Tbl_Usuario`(`US_Nombres`, `US_Apellidos`, `US_Direcccion`, `US_Fecha_Nacimiento`, `US_Nacionalidad`, `US_Telefono`, `US_Email`, `US_Contrasena`, `US_Tipo`) VALUES ('{$nombre}','{$apellidos}','{$direccion}','{$fecha_nac}','{$nacionalidad}','{$telefono}','{$email}','{$password}','{$tipo}')";
		$resultado_insert=mysqli_query($conexion,$insert);

		if($resultado_insert){
			$consulta ="SELECT * FROM Tbl_Usuario WHERE ID_Usuario = '{$id}'";
			$resultado = mysqli_query($conexion,$consulta);

			if($registro=mysqli_fetch_array($resultado)){
				$json['usuario'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);			
		}
		else{
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
			echo json_encode($json);
		}
	}
	else{
			$resultar["ID_Usuario"]="No User";
			$resultar['US_Nombres']="No User";
			$resultar['US_Apellidos']="No User";
			$resultar['US_Direccion']="No User";
			$resultar['US_Fecha_Nacmiento']="No User";
			$resultar['US_Nacionalidad']="No User";
			$resultar['US_Telefono']="No User";
			$resultar['US_Email']="No User";
			$resultar['US_Contrasena']="No User";
			$resultar['US_Tipo']="No User";
			$json['usuario'][]=$resultar;
			echo json_encode($json);
	}

?>
