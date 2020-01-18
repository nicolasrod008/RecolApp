  <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Empresa Recolectora</title>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="select.php" >
    <center>
    <table width="50%" border="1" style="background: gray">
      <tr align="center">
        <td><b>ID Empresa</b></td>
        <td><b>Nombre</b></td>
        <td><b>Direccion</b></td>
        <td><b>Telefono</b></td>
        <td><b>Email</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM empresarecolectora";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $idempresa=$Fila['IdEmpresaRecolectora']; 
        $nombre=$Fila['Nombre'];
        $direccion=$Fila['Direccion']; 
        $telefono=$Fila['Telefono'];
        $email=$Fila['Email'];

        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $idempresa;?></td>

      <td><?php echo $nombre;?> </td>

      <td><?php echo $direccion;?> </td>

      <td><?php echo $telefono;?> </td>

      <td><?php echo $email;?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $idempresa; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $idempresa; ?>">Eliminar</a></td>
    </tr> 
    <?php
  }
  ?>
  </table>      
<?php
if (isset($_GET['actualizar'])){
  include ("update.php");
}
?>






  </form>
</center>


  <br><center><br><br><br><a href="insert.php" ><h5><b>NUEVO</b></h5></a></center><br>




</body>

</html>