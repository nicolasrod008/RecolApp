<?php
session_start();
require_once ("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Validar login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						¿Olvido contraseña?<br>
						Por favor digite su correo electronico para validar su contraseña
					</span>
				</div>

			<form method="post" action="recuperarcontrasena.php" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Correo</span>
						<input class="input100" type="text" name="email" placeholder="Ingrese Email">
						<span class="focus-input100"></span>
					</div>

				<div class="container-login100-form-btn">
						<button type="submit" name="enviar" class="login100-form-btn">
							Validar
						</button><pre>            </pre>
						<a href="../index.php" class="btn btn-primary">
							Volver
						</a>
				</div>

			</form>

			<?php 
			try{
				if (isset($_POST['email']) && !empty($_POST['email'])) {
				$pass=substr(md5(microtime()), 1, 10);
				$mail =$_POST['email'];

				$conn= new mysqli("","root","","recolapp");
				if ($conn->connect_error) {
					die("Fallo en la conexion: " . $conn->connect_error);
				}

				$sqql="update usuario set Contrasena='$pass' where Email='$mail'";

				if ($conn->query($sqql)=== TRUE) {
					echo "contraseña modificada correctamente";
				}else{
					echo "Error: ". $conn->error;
				}

				$to=$_POST['email'];
				$from= "From: " . "RecolApp";
				$subject= "Recordar Contraseña";
				$message="El sistema le asigno la siguiente contraseña: " . $pass;

				mail($to, $subject, $message, $from);
				echo "Correo enviado satisfactoriamente a: " . $_POST['email'];
			}
			else
				echo "Informacion incompleta";
			}

			catch(SException $e){
				echo "Excepcion capturada: " . $e->getMessage(), "\n";
			}
			
			?>

			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>