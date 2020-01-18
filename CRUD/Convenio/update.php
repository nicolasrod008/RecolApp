<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Convenio</title>
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
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  *, eg.IdEmpresaGeneradora as ideg, u.IdUsuario as idu, eg.Nombre as nombreEG, u.Nombre as nombreu FROM  convenio c, EmpresaGeneradora eg, usuario u WHERE c.IdConvenio=$editar_id and eg.IdEmpresaGeneradora=c.IdEmpresaGeneradora and u.IdUsuario=c.IdUsuario";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $idconvenio=$Fila['IdConvenio']; 
        $idempresa=$Fila['IdEmpresaGeneradora'];
        $isusuario=$Fila['IdUsuario']; 
        $fechai=$Fila['FechaInicio'];
        $fechaf=$Fila['FechaFin'];
        $costo=$Fila['Costo'];
        $dirigido=$Fila['Dirigido'];

        $nombreEG=$Fila['nombreEG'];
        $nombreUS=$Fila['nombreu'];

         $idemg=$Fila['ideg']; 
         $idus=$Fila['idu'];

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">


    <tr>
     <td><h3>Empresa Generadora:</h3></td>
     

      <td><select name="selectEmpresaG">
      <option value="<?php echo $idemg;?>"><?php echo $nombreEG;?></option>
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
      <option value="<?php echo $idus;?>"><?php echo $nombreUS;?></option>
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
    <td><input type="date" name="txtFechaInicio" value="<?php echo $fechai;?>"></td>
  </tr>

  <tr>
    <td><h3>Fecha Fin:</h3></td>
    <td><input type="date" name="txtFechaFin" value="<?php echo $fechaf;?>"><input type="checkbox" name="txtFechaFin" value="Null">Sin Limite </td>
  </tr>

  <tr>
    <td><h3>Costo:</h3></td>
    <td><input type="text" name="txtCosto" value="<?php echo $costo;?>"></td>
  </tr>

  <tr>
     <td><h3>Dirigido:</h3></td>
     <td><select name="selectDirigido">
      <option value="<?php echo $dirigido;?>"><?php echo $dirigido;?></option>
      <option value="persona">Persona</option>
      <option value="empresa">Empresa</option>
  </select></td>
      </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $idempresaa=$_POST['selectEmpresaG'];
        $isusuarioo=$_POST['selectUsuario']; 
        $fechaii=$_POST['txtFechaInicio'];
        $fechaff=$_POST['txtFechaFin'];
        $costoo=$_POST['txtCosto'];
        $dirigidoo=$_POST['selectDirigido'];

  $actualizar="UPDATE  convenio  SET  IdEmpresaGeneradora='$idempresaa', IdUsuario='$isusuarioo', FechaInicio='$fechaii', FechaFin='$fechaff', Costo='$costoo', Dirigido='$dirigidoo' WHERE IdConvenio='$editar_id'";
  $ejecutar=$con->query($actualizar);

  if ($ejecutar) {
     echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
  }else{
    echo $actualizar;
  }
 
}

?>
</body>
</html>