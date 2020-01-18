<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateentregas'])){
                                  
                                   $id=$_POST['identrega'];

                                   $empresar=$_POST['selectempresar']; 
                                   $fecha=$_POST['fechaentrega'];
                                   $peso=$_POST['pesoentrega']; 
                                   $costo=$_POST['costoentrega'];
                                   $residuo=$_POST['selectresiduo']; 

                                   $query="UPDATE entregaresiduo SET IdEmpresaRecolectora='$empresar', IdResiduo='$residuo', Fecha='$fecha', PesoReal='$peso', Costo='$costo' WHERE IdEntregaResiduo='$id'";

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
                                