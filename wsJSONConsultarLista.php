<?php
$hostname_localhost ="localhost";
$database_localhost ="bd_usuario";
$username_localhost = "root";
$password_localhost = "";

$json = array();

	$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$consulta = "select documento,nombre,profesion from usuario";
		$resultado = mysqli_query($conexion,$consulta);

		while ($registro=mysqli_fetch_array($resultado)) {
			# code...
			$json['usuario'][] = $registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
?>