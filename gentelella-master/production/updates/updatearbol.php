<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updatearbol'])){
                                  
                                   $id=$_POST['updateidarbol'];

                                   $entrega=$_POST['entregaarbol']; 
                                   $tipo=$_POST['tipoarbol'];
                                   $costo=$_POST['costoarbol']; 
                                   $foto=$_POST['fotoarbol']; 

                                   $query="UPDATE arbol SET IdEntregaResiduo='$entrega', IdTipo='$tipo', Costo='$costo', AdjuntarFoto='$foto' WHERE IdArbol='$id'";

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