<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateempresar'])){
                                  
                                   $id=$_POST['updateidempresar'];

                                   $nombre=$_POST['nombreempresar']; 
                                   $direccion=$_POST['direccionempresar'];
                                   $telefono=$_POST['telefonoempresar']; 
                                   $email=$_POST['emailempresar']; 

                                   $query="UPDATE empresarecolectora SET NombreEmpresaR='$nombre', Direccion='$direccion', Telefono='$telefono', Email='$email' WHERE IdEmpresaRecolectora='$id'";

                                   $query_run=mysqli_query($connection,$query);

                                   if ($query_run) {
                                        echo '<script> alert ("Datos actualizados");</script>';
                                        header("Location: ../tablas.php");
                                   }else{
                                        echo '<script> alert("Datos no actualizados");</script>';
                                        echo $query;
                                   }
                                   }

                                 ?>