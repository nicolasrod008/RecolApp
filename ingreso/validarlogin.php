<?php
session_start();
require_once('../conexiones/conexion.php');
$con=conectar();

if(isset($_POST['txtusu'])){
	$consulta="select * from usuario where Email='".$_POST['txtusu']."' and Contrasena='".$_POST['txtpas']."'";
	$sql=mysqli_query($con,$consulta);
	$res=mysqli_fetch_assoc($sql);
	$num=mysqli_num_rows($sql);
	$_SESSION['nombre']=$res['Nombre'];
	$_SESSION['apellido']=$res['Apellido'];
	$_SESSION['direccion']=$res['Direccion'];
	$_SESSION['documento']=$res['Documento'];
	$_SESSION['telefono']=$res['Telefono'];
	$_SESSION['email']=$res['Email'];
	$_SESSION['rol']=$res['IdRol'];
	$_SESSION['idusu']=$res['IdUsuario'];
	if ($num!=0) {
		header('Location: ../gentelella-master/production/index.php');
	}else{
		$_SESSION['Error']="Error de usuario y contraseña";
		header('Location: ../index.php');
	}
}
?>