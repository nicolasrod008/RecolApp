  <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Convenio</title>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="selectB.php" >
    <center>
    <table width="50%" border="1" style="background: gray">
      <tr align="center">
        <td><b>ID Convenio</b></td>
        <td><b>Empresa Generadora</b></td>
        <td><b>Usuario</b></td>
        <td><b>Fecha Inicio</b></td>
        <td><b>Fecha Fin</b></td>
        <td><b>Costo</b></td>
        <td><b>Dirirgido</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM convenio";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $idconvenio=$Fila['IdConvenio']; 
        $idempresa=$Fila['IdEmpresaGeneradora'];
        $isusuario=$Fila['IdUsuario']; 
        $fechai=$Fila['FechaInicio'];
        $fechaf=$Fila['FechaFin'];
        $costo=$Fila['Costo'];
        $dirigido=$Fila['Dirigido'];

        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $idconvenio;?></td>

      <td><?php
        $sub_sql_2 = "SELECT Nombre FROM EmpresaGeneradora WHERE IdEmpresaGeneradora=". $idempresa;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['Nombre'];
         ?>
      </td>

      <td><?php
        $sub_sql_2 = "SELECT Nombre FROM Usuario WHERE IdUsuario=". $isusuario;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['Nombre'];
         ?>
      </td>

      <td><?php echo $fechai;?> </td>

      <td><?php echo $fechaf;?> </td>

      <td><?php echo $costo;?> </td>

      <td><?php echo $dirigido;?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $idconvenio; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $idconvenio; ?>">Eliminar</a></td>
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