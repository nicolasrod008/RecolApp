<?php 
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'recolapp');

if(isset($_POST['deletedataarbol'])){
                                  
$id=$_POST['deleteidarbol'];

$query="DELETE FROM arbol WHERE IdArbol='$id'";
$query_run=mysqli_query($connection,$query);

if ($query_run) {
    echo '<script> alert ("Datos eliminados");</script>';
    header("Location:../tablas.php");
}else{
    echo '<script> alert("Datos no eliminados");</script>';
 }
}
?>