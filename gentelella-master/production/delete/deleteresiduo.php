<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');

if(isset($_POST['deletedataresiduo'])){
                                  
$id=$_POST['deleteidresiduo'];

$query="DELETE FROM residuo WHERE IdResiduo='$id'";
$query_run=mysqli_query($connection,$query);

if ($query_run) {
    echo '<script> alert ("Datos eliminados");</script>';
    header("Location:../tablas.php");
}else{
    echo '<script> alert("Datos no eliminados");</script>';
 }
}
?>