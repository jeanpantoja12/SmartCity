<?php
$hostname_localhost ="mysql-jeanpantoja1.alwaysdata.net";
$database_localhost ="jeanpantoja1_smartcitybd";
$username_localhost ="215238_root";
$password_localhost ="smartcity123";

$json=array();

	if(isset($_GET["US_Email"]) && isset($_GET["US_Contrasena"])){
		$email = $_GET['US_Email'];
		$password = $_GET['US_Contrasena'];
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$consulta = "select US_Nombres,US_Apellidos FROM `Tbl_Usuario` where US_Email= '{$email}' and US_Contrasena='{$password}'";
		$resultado = mysqli_query($conexion,$consulta);

		if($registro=mysqli_fetch_array($resultado)){
			if($registro['US_Nombres']!=null){
				$resultar["isTrue"]=true;
				$resultar["US_Nombres"]=$registro['US_Nombres'];
				$resultar["US_Apellidos"] =$registro['US_Apellidos'];
			}
			else
			{
				$resultar["isTrue"]=false;
			}
			$json['usuario'][]=$resultar;
		}
		else{
			$resultar["isTrue"]=false;
			$json['usuario'][]=$resultar;
		}
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else{
			$resultar["isTrue"]=false;
			$json['usuario'][]=$resultar;
			echo json_encode($json);
	}
?>