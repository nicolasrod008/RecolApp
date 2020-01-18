<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
            Registrate
          </span>
        </div>  



        <form method="post" name="form" action="registro.php" class="login100-form validate-form">
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Nombres</span>
            <input class="input100" type="text" name="txtNombre" placeholder="Ingrese sus Nombres">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Apellidos</span>
            <input class="input100" type="text" name="txtApellido" placeholder="Ingresa Sus Apellidos">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Direccion</span>
            <input class="input100" type="text" name="txtDireccion" placeholder="Ingresa Su Direccion">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Documento</span>
            <input class="input100" type="text" name="txtDocumento" placeholder="Ingresa Su Documento">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Telefono</span>
            <input class="input100" type="text" name="txtTelefono" placeholder="Ingresa Su Telefono">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Email</span>
            <input class="input100" type="text" name="txtEmail" placeholder="Enter password">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Contraseña</span>
            <input class="input100" type="password" name="txtClave" placeholder="Enter password">
            <span class="focus-input100"></span>
          </div>



<?php

  if(isset($_POST['Enviar'])){
    $clave=md5($_POST['txtClave']);
      $sql='insert into usuario(IdRol,Nombre,Apellido,Direccion,Documento,Telefono,Email,Contrasena) values("3","'.$_POST['txtNombre'].'","'.$_POST['txtApellido'].'","'.$_POST['txtDireccion'].'","'.$_POST['txtDocumento'].'","'.$_POST['txtTelefono'].'","'.$_POST['txtEmail'].'","'.$clave.'")';
    $result = $con->query($sql);
  
    if($result)
      {
      echo "<script> alert('Registro Insertado')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
      }
    else
        {
      echo "<script> alert('Error al Insertar')</script>";
      echo $sql;
        }
  }

  ?>

   <div class="col-md-6" class="container-login100-form-btn">
            <button type="submit" name="Enviar" class="login100-form-btn">
              Registrarse
            </button>
</div>

<div class="col-md-6" class="container-login100-form-btn">
            <a href="../index.php" >
              Volver
            </button>
</div>
</div>
</div>
      
  </form>
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
