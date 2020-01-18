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
          <li><a href="select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="../usuario/select.php">Usuario</a></li>
        </ul>
      </nav>

  <form name="form" action="insert.php" method="post">
  <br><br><br><br><br><br><br>
  <h3>Insertar Arbol</h3><br><br>
<table align="center" width="80%">

  <tr>
     <td><h3>Empresa Recolectora:</h3></td>
     <td><select name="selectEmpresaR">
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

  <tr>
     <td><h3>Empresa Generadora:</h3></td>
     <td><select name="selectEmpresaG">
      <option value="0">--</option>
      <option value="11">No</option>
      <?php
       $sql="select * from EmpresaGeneradora";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEmpresaGeneradora']."'>".$res['Nombre']."</option>";
       }

      ?>
    </select></td>
  </tr>

  <tr>
     <td><h3>Usuario:</h3></td>
     <td><select name="selectUsuario">
      <option value="0">--</option>
      <option value="18">No</option>
      <?php
       $sql="select * from Usuario";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdUsuario']."'>".$res['Nombre']."</option>";
       }

      ?>
    </select></td>
  </tr>

  <tr>
    <td><h3>Fecha Inicio:</h3></td>
    <td><input type="date" name="txtFechaInicio"></td>
  </tr>
  <tr>

  <tr>
    <td><h3>Fecha Fin:</h3></td>
    <td><input type="date" name="txtFechaFin" ><input type="checkbox" name="txtFechaFin" value="Null">Sin Limite </td>
  </tr>

  <tr>
    <td><h3>Costo:</h3></td>
    <td><input type="text" name="txtCosto" ></td>
  </tr>


    <tr>
     <td><h3>Dirigido:</h3></td>
     <td><select name="selectDirigido">
      <option value="0">--</option>
      <option value="persona">Persona</option>
      <option value="empresa">Empresa</option>
  </select></td>
      </tr>

 

   

      </table>


<?php

  if(isset($_POST['Enviar'])){
      $sql='insert into convenio(IdEmpresaRecolectora,IdEmpresaGeneradora,IdUsuario,FechaInicio,FechaFin,Costo,Dirigido) values("'.$_POST['selectEmpresaR'].'","'.$_POST['selectEmpresaG'].'","'.$_POST['selectUsuario'].'","'.$_POST['txtFechaInicio'].'","'.$_POST['txtFechaFin'].'","'.$_POST['txtCosto'].'","'.$_POST['selectDirigido'].'")';
    $result = $con->query($sql);
  
    if($result)
      {
      echo "<script> alert('Registro Insertado')</script>";
      }
    else
        {
      echo "<script> alert('Error al Insertar')</script>";
      echo $sql;
        }
  }

  ?>

    <br><br><br>
  <input type="submit" name="Enviar" value="Insertar">
  <br><center><a href="select.php" style="color:black;"><h5><b>VER</b></h5></a></center><br>
</form>


</body>
</html>