<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Residuo</title>
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
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  *, c.IdConvenio as idc, t.Nombre as tipoNombre, t.IdTipo as idt, er.IdEntregaResiduo as identrega FROM  residuo r, convenio c, tipo t, entregaresiduo er WHERE r.IdResiduo=$editar_id  and r.IdTipo=t.IdTipo and c.IdConvenio=r.IdConvenio and er.IdEntregaResiduo=r.IdEntregaResiduo";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $idresiduo=$Fila['IdResiduo']; 
        $identrega=$Fila['IdEntregaResiduo']; 
        $convenio=$Fila['IdConvenio'];
        $tipo=$Fila['IdTipo']; 
        $peso=$Fila['PesoAproximado'];

        $idcon=$Fila['idc'];
        $nomtipo=$Fila['tipoNombre'];
        $idtipo=$Fila['idt'];
        $ide=$Fila['identrega'];

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">

  <tr>
     <td><h3>Codigo de la Entrega del Residuo :</h3></td>
     <td><select name="selectEntrega">
      <option value="<?php echo $ide;?>"><?php echo $ide;?></option>
      <?php
       $sql="select * from entregaresiduo";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEntregaResiduo']."'>".$res['IdEntregaResiduo']."</option>";
       }

      ?>
  </select></td>
      </tr>

  <tr>
     <td><h3>Codigo del convenio:</h3></td>
     <td><select name="selectConvenio">
      <option value="<?php echo $idcon;?>"><?php echo $idcon;?></option>
      <?php
       $sql="select * from convenio";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdConvenio']."'>".$res['IdConvenio']."</option>";
       }

      ?>
  </select></td>
      </tr>

  <tr>
     <td><h3>Tipo:</h3></td>
     <td><select name="selectTipo">
      <option value="<?php echo $idtipo;?>"><?php echo $nomtipo;?></option>
      <?php
       $sql="select * from tipo";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdTipo']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

    <tr>
    <td><h3>Peso Aproximado:</h3></td>
    <td><input type="text" name="txtPeso" value="<?php echo $peso;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $empresaa=$_POST['selectEntrega'];
  $fechaa=$_POST['selectConvenio'];
  $pesoo=$_POST['selectTipo'];
  $costoo=$_POST['txtPeso'];

  $actualizar="UPDATE  residuo  SET IdEntregaResiduo='$empresaa', IdConvenio='$fechaa', IdTipo='$pesoo', PesoAproximado='$costoo' WHERE IdResiduo='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>