<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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

  <form name="form" action="insert.php" method="post">
  <br><br><br><br><br><br><br>
  <h3>Insertar Entrega Residuo</h3><br><br>
<table align="center" width="80%">

  <tr>
    <td><h3>Fecha:</h3></td>
    <td><input type="date" name="txtFecha"></td>
  </tr>
  <tr>

  <tr>
    <td><h3>Peso Real:</h3></td>
    <td><input type="text" name="txtPeso" ></td>
  </tr>

  <tr>
    <td><h3>Costo:</h3></td>
    <td><input type="text" name="txtCosto" ></td>
  </tr>

  <tr>
    <td><h3>Donativo:</h3></td>
    <td><select name="selectDonativo">
      <option value="0">-----</option>
    <option value="Si">Si</option>
  <option value="No">No</option></td>
  </tr>

    <tr>
     <td><h3>Empresa Recolectora:</h3></td>
     <td><select name="selectEmpresa">
      <option value="0">--</option>
      <?php
       $sql="select * from EmpresaRecolectora";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEmpresaRecolectora']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

 

   

      </table>


<?php

  if(isset($_POST['Enviar'])){
      $sql='insert into entregaresiduo(IdEmpresaRecolectora,Fecha,PesoReal,Costo,Donativo) values('.$_POST['selectEmpresa'].',"'.$_POST['txtFecha'].'","'.$_POST['txtPeso'].'","'.$_POST['txtCosto'].'","'.$_POST['selectDonativo'].'")';
    $result = $con->query($sql);
  
    if($result)
      {
      echo "<script> alert('Registro Insertado')</script>";
      }
    else
        {
      echo "<script> alert('Error al Insertar')</script>";
        }
  }

  ?>

    <br><br><br>
  <input type="submit" name="Enviar" value="Insertar">
  <br><center><a href="selectB.php" style="color:black;"><h5><b>VER</b></h5></a></center><br>
</form>


</body>
</html>