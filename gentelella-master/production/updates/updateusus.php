<?php 


$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateusus'])){
                                  
                                   $id=$_POST['updateid'];

                                   $nom=$_POST['nombre']; 
                                   $apell=$_POST['apellido']; 
                                   $rol=$_POST['selectRol'];
                                   $direcc=$_POST['direccion']; 
                                   $docu=$_POST['documento'];
                                   $tel=$_POST['telefono'];
                                   $ema=$_POST['email'];
                                   $clav=$_POST['clave'];

                                   $query="UPDATE usuario SET IdRol='$rol', Nombre='$nom', Apellido='$apell', Direccion='$direcc', Documento='$docu', Telefono='$tel', Email='$ema', Contrasena='$clav' WHERE IdUsuario='$id'";

                                   $query_run=mysqli_query($connection,$query);

                                   if ($query_run) {
                                        echo '<script> alert ("Datos actualizados");</<script>';
                                        header("Location: ../tablas.php");
                                   }else{
                                        echo '<script> alert("Datos no actualizados");</script>';
                                   }
                                   }

                                 ?>
                                