<?php
session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Actualizar Arbol</title>
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
 
<?php 
   if(isset($_GET['actualizar'])){
   $editar_id = $_GET['actualizar'];

   $consulta="SELECT  *, t.IdTipo as idt, t.Nombre as tn FROM  arbol a, tipoa t WHERE a.IdArbol=$editar_id and a.IdTipo=t.IdTipo";
   $ejecutar=$con->query($consulta);

   $Fila=$ejecutar->fetch_assoc();
        $idarbol=$Fila['IdArbol']; 
        $identrega=$Fila['IdEntregaResiduo'];
        $tipo=$Fila['IdTipo']; 
        $costo=$Fila['Costo'];
        $fot=$Fila['AdjuntarFoto'];

        $idtt=$Fila['idt'];
        $nomt=$Fila['tn'];

   }

 ?>
  <form method="POST" action="">
  <table align="center" border="0">



    <tr>
     <td><h3>Entrega :</h3></td>
     <td><select name="selectEntrega">
      <option value="<?php echo $identrega;?>"><?php echo $identrega;?></option>
      <?php
       $sql="select * from EntregaResiduo";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdEntregaResiduo']."'>".$res['IdEntregaResiduo']."</option>";
       }

      ?>
  </select></td>
      </tr>

   <tr>
     <td><h3>Tipo :</h3></td>
     <td><select name="selectTipo">
      <option value="<?php echo $idtt;?>"><?php echo $nomt;?></option>
      <?php
       $sql="select * from tipoa";  
       $ejecutar = $con->query($sql);
       while ($res=$ejecutar->fetch_assoc()) {
        echo "<option value = '".$res['IdTipo']."'>".$res['Nombre']."</option>";
       }

      ?>
  </select></td>
      </tr>

  <tr>
    <td><h3>Costo:</h3></td>
    <td><input type="text" name="txtCosto" value="<?php echo $costo;?>" ></td>
  </tr>

  <tr>
    <td><h3>Foto:</h3></td>
    <td><input type="file" name="txtFoto" value="<?php echo $fot;?>"></td>
  </tr>

            <tr><td><input type="submit" name="actualizar" value="ACTUALIZAR"></td>
            </tr>
        

  </table>
</form>


<?php
if (isset($_POST['actualizar']))
 {  

  $iddentrega=$_POST['selectEntrega'];
  $tipoo=$_POST['selectTipo'];
  $coosto=$_POST['txtCosto'];
  $footo=$_POST['txtFoto'];

  $actualizar="UPDATE  arbol  SET  IdEntregaResiduo='$iddentrega', IdTipo='$tipoo', Costo='$coosto', AdjuntarFoto='$footo' WHERE IdArbol='$editar_id'";
  $ejecutar=$con->query($actualizar);

  echo "<script>alert('Datos  Actualizados')</script>";
  echo "<script>window.open('select.php','_self')</script>";
}

?>
</body>
</html>
