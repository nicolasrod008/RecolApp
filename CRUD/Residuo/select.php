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
          <li><a href="select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="select.php" >
    <center>
    <table width="50%" border="1" style="background: gray">
      <tr align="center">
        <td><b>ID Residuo</b></td>
        <td><b>ID Entrega Residuo</b></td>
        <td><b>ID Convenio</b></td>
        <td><b>Tipo</b></td>
        <td><b>Peso Aproximado</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM residuo";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $idresiduo=$Fila['IdResiduo']; 
        $identrega=$Fila['IdEntregaResiduo']; 
        $convenio=$Fila['IdConvenio'];
        $tipo=$Fila['IdTipo']; 
        $peso=$Fila['PesoAproximado'];
        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $idresiduo;?></td>

      <td><?php
        $sub_sql_2 = "SELECT IdEntregaResiduo FROM entregaresiduo WHERE IdEntregaResiduo=". $identrega;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['IdEntregaResiduo'];
         ?>
      </td>

      <td><?php
        $sub_sql_3 = "SELECT IdConvenio FROM convenio WHERE IdConvenio=". $convenio;
        $execute = $con->query($sub_sql_3);
        $centro = $execute->fetch_assoc();
        echo $centro['IdConvenio'];
         ?>
      </td>

      <td><?php
        $sub_sql_3 = "SELECT Nombre FROM tipo WHERE IdTipo=". $tipo;
        $execute = $con->query($sub_sql_3);
        $centro = $execute->fetch_assoc();
        echo $centro['Nombre'];
         ?>
      </td>

      <td><?php echo $peso;?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $idresiduo; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $idresiduo; ?>">Eliminar</a></td>
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