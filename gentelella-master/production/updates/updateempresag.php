<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateempresag'])){
                                  
                                   $id=$_POST['updateidempresag'];

                                   $nombre=$_POST['nombreempresag']; 
                                   $direccion=$_POST['direccionempresag'];
                                   $telefono=$_POST['telefonoempresag']; 
                                   $nit=$_POST['nitempresag']; 

                                   $query="UPDATE empresageneradora SET NombreEmpresaG='$nombre', Direccion='$direccion', Telefono='$telefono', Nit='$nit' WHERE IdEmpresaGeneradora='$id'";

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