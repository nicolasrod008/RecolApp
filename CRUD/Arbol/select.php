  <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Arbol</title>
</head>

<body>

 <nav>
        <ul >
          <li ><a href="select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
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
        <td><b>ID Arbol</b></td>
        <td><b>Id Entrega Residuo</b></td>
        <td><b>Tipo</b></td>
        <td><b>Costo</b></td>
        <td><b>Foto</b></td>
        <td><b>Actualizar</b></td>
        <td><b>Eliminar</b></td>
      
    </tr>
</center> 

    <?php
      $consulta="SELECT * FROM arbol";
      $ejecutar=$con->query($consulta);
      $i=0;
      while ($Fila=$ejecutar->fetch_assoc()) {
        $idarbol=$Fila['IdArbol']; 
        $identrega=$Fila['IdEntregaResiduo'];
        $tipo=$Fila['IdTipo']; 
        $costo=$Fila['Costo'];
        $fot=$Fila['AdjuntarFoto'];

        $i++;
      
      ?>
    <tr align="center">
      <td><?php echo $idarbol;?></td>

      <td><?php
        $sub_sql_2 = "SELECT IdEntregaResiduo FROM EntregaResiduo WHERE IdEntregaResiduo=". $identrega;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['IdEntregaResiduo'];
         ?>
      </td>

      <td><?php
        $sub_sql_2 = "SELECT IdTipo FROM tipoa WHERE IdTipo=". $tipo;
        $execute = $con->query($sub_sql_2);
        $centro = $execute->fetch_assoc();
        echo $centro['IdTipo'];
         ?>
      </td>

      <td><?php echo $costo;?> </td>

      <td align="center"><?php echo"<img src='img/$fot' style='width:100px; height:100px;'>"?> </td>


      <td align="center"><a href="update.php?actualizar=<?php echo $idarbol; ?>">Actualizar</a></td>
      <td align="center"><a href="delete.php?eliminar=<?php echo $idarbol; ?>">Eliminar</a></td>
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
