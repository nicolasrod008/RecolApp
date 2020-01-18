  <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Entrega Residuo</title>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="select.php" >
    <center>
    <table width="50%" border="1" style="background: gray">
      <tr align="center">
        <td><b>ID Entrega</b></td>
        <td><b>Empresa Recolectora</b></td>
        <td><b>Fecha</b></td>
        <td><b>Peso Real</b></td>
        <td><b>Costo</b></td>
        <td><b>Donativo</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM entregaresiduo";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $identrega=$Fila['IdEntregaResiduo']; 
        $idempresa=$Fila['IdEmpresaRecolectora']; 
        $fecha=$Fila['Fecha'];
        $peso=$Fila['PesoReal']; 
        $costo=$Fila['Costo'];
        $dona=$Fila['Donativo'];

        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $identrega;?></td>

      <td><?php
        $sub_sql_2 = "SELECT IdEmpresaRecolectora FROM empresarecolectora WHERE IdEmpresaRecolectora=". $idempresa;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['IdEmpresaRecolectora'];
         ?>
      </td>

      <td><?php echo $fecha;?> </td>

      <td><?php echo $peso;?> </td>

      <td><?php echo $costo;?> </td>

      <td><?php echo $dona;?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $identrega; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $identrega; ?>">Eliminar</a></td>
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