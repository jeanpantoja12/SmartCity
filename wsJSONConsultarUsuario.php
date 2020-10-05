<?php
$hostname_localhost ="localhost";
$database_localhost ="bd_usuario";
$username_localhost = "root";
$password_localhost = "";

$json=array();

	if(isset($_GET["documento"])){
		$documento = $_GET['documento'];
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$consulta = "select documento,nombre,profesion from usuario where documento= '{$documento}'";
		$resultado = mysqli_query($conexion,$consulta);

		if($registro=mysqli_fetch_array($resultado)){
			$json['usuario'][]=$registro;
		}
		else{
			$resultar["documento"]=0;
			$resultar["nombre"]='No registra';
			$resultar["profesion"]='No registra';
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