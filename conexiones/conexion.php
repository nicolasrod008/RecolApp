<?php

function conectar(){
	$con=new mysqli("localhost", "root", "", "recolapp");

	if ($con->connect_error) {
		printf("fallo la conexion: %s\n", $mysqli->connect_error);
		exit();
		# code...
	}else{
		return $con;
	}
}
?>