<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');
                                   if(isset($_POST['updateresiduo'])){
                                  
                                   $id=$_POST['updateidresiduo'];

                                   $entrega=$_POST['entregaresiduor']; 
                                   $convenio=$_POST['convenioresiduo'];
                                   $tipo=$_POST['tiporesiduo']; 
                                   $peso=$_POST['pesoresiduo']; 

                                   $query="UPDATE residuo SET IdEntregaResiduo='$entrega', IdConvenio='$convenio', IdTipo='$tipo', PesoAproximado='$peso' WHERE IdResiduo='$id'";

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