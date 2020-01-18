<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateentrega'])){
                                  
                                   $id=$_POST['updateidentrega'];

                                   $residuo=$_POST['updateresiduo'];
                                   $peso=$_POST['updatepeso']; 
                                   $costo=$_POST['updatecosto'];

                                   $query="UPDATE entregaresiduo er INNER JOIN residuo r ON er.IdResiduo=r.IdResiduo SET er.IdEmpresaRecolectora='1', er.IdResiduo='$residuo', er.IdEstado='2', er.PesoReal='$peso', er.Costo='$costo', r.IdEstado='2' WHERE er.IdEntregaResiduo='$id'";

                                   $query_run=mysqli_query($connection,$query);

                                   if ($query_run) {
                                        echo '<script> alert ("Datos actualizados");</script>';
                                        header("Location: ../registros.php");
                                   }else{
                                        echo '<script> alert("Datos no actualizados");</script>';
                                        echo $query;
                                   }
                                   }

                                 ?>