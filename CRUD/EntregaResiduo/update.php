<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Entrega Residuo</title>
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
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  *, emr.Nombre as nombre FROM  entregaresiduo er, empresarecolectora  emr WHERE er.IdEntregaResiduo=$editar_id and er.IdEmpresaRecolectora=emr.IdEmpresaRecolectora";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $identrega=$Fila['IdEntregaResiduo']; 
        $idempresa=$Fila['IdEmpresaRecolectora']; 
        $fecha=$Fila['Fecha'];
        $peso=$Fila['PesoReal']; 
        $costo=$Fila['Costo'];
        $dona=$Fila['Donativo'];

        $nombreempresa=$Fila['nombre'];

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">

      <tr>
     <td><h3>Empresa Recolectora :</h3></td>
     <td><select name="selectEmpresa">
      <option value="<?php echo $nombreempresa;?>"><?php echo $nombreempresa;?></option>
      <?php
       $sql="select * from empresarecolectora";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEmpresaRecolectora']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

    <tr>
    <td><h3>Fecha:</h3></td>
    <td><input type="date" name="txtFecha" value="<?php echo $fecha;?>"></td>
  </tr>
    

  <tr>
    <td><h3>Peso Real:</h3></td>
    <td><input type="text" name="txtPeso" value="<?php echo $peso;?>"></td>
  </tr>

  <tr>
    <td><h3>Costo:</h3></td>
    <td><input type="text" name="txtCosto" value="<?php echo $costo;?>" ></td>
  </tr>

  <tr>
    <td><h3>Donativo:</h3></td>
    <td><input type="text" name="txtDonativo" value="<?php echo $dona;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $empresaa=$_POST['selectEmpresa'];
  $fechaa=$_POST['txtFecha'];
  $pesoo=$_POST['txtPeso'];
  $costoo=$_POST['txtCosto'];
  $donar=$_POST['txtDonativo'];

  $actualizar="UPDATE  entregaresiduo  SET IdEmpresaRecolectora='$empresaa', Fecha='$fechaa', PesoReal='$pesoo', Costo='$costoo', Donativo='$donar' WHERE IdEntregaResiduo='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>