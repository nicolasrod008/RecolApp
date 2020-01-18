 <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Residuo</title>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="select.php" >
    <center>
    <table width="50%" border="1" style="background: gray">
      <tr align="center">
        <td><b>ID tipo</b></td>
        <td><b>Nombre</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM tipo";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $idtipo=$Fila['IdTipo']; 
        $nombre=$Fila['Nombre']; 
        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $idtipo;?></td>

      <td><?php echo $nombre;?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $idtipo; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $idtipo; ?>">Eliminar</a></td>
    </tr> 
    <?php
  }
  ?>
  </table>      
<?php
if (isset($_GET['actualizar'])){
  include ("actu_empleB.php");
}
?>






  </form>
</center>


  <br><center><br><br><br><a href="insert.php" ><h5><b>NUEVO</b></h5></a></center><br>




</body>

</html>