 <?php

session_start();
require_once ("../conexiones/conexion.php");
$con=conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registros Residuo</title>
  <link rel="stylesheet" href="../css/jquery.datatables.min.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function(){
        $('#datatable-usuarios').DataTable();
      });
    </script>
</head>

<body>

<nav>
        <ul >
          <li ><a href="../Arbol/select.php">Arbol</a> </li>
          <li><a href="../Convenio/select.php">Convenio</a></li>
          <li><a href="../EmpresaGeneradora/select.php">Empresa Generadora</a></li>
          <li><a href="../EmpresaRecolectora/select.php">Empresa Recolectora</a></li>
          <li><a href="../EntregaResiduo/select.php">Entreaga Residuo</a> </li>
          <li><a href="../residuo/select.php">Residuo</a></li>
          <li><a href="../tipo/select.php">Tipo</a></li>
          <li><a href="select.php">Usuario</a></li>
        </ul>
      </nav>
         

  <form method="POST" action="select.php" >
    <center>
  
                    <table id="datatable-usuarios" class="display">
                      <thead>
                        <tr>
                          <th>ID Usuario</th>
                          <th>Rol</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Direccion</th>
                          <th>Documento</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Contraseña</th>
                          <th>Actualizar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $consulta="SELECT u.IdUsuario, r.IdRol , u.Nombre, u.Apellido, u.Direccion, u.Documento, u.Telefono, u.Email, u.Contrasena FROM  usuario u INNER JOIN rol r ON u.IdRol=r.IdRol";
                        if ($result=mysqli_query($con,$consulta)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {
                                                  
                       ?>
                        <tr>
                          <td><?php printf($mostrar->IdUsuario )?></td>
                          <td><?php printf($mostrar->IdRol)?></td>
                          <td><?php printf($mostrar->Nombre) ?></td>
                          <td><?php printf($mostrar->Apellido) ?></td>
                          <td><?php printf($mostrar->Direccion) ?></td>
                          <td><?php printf($mostrar->Documento) ?></td>
                          <td><?php printf($mostrar->Telefono) ?></td>
                          <td><?php printf($mostrar->Email) ?></td>
                          <td><?php printf($mostrar->Contrasena) ?></td>


                          <td align="center"><a href="update.php?actualizar=<?php echo $idusuario; ?>">Actualizar</a></td>
                          <td align="center"><a href="delete.php?eliminar=<?php echo $idusuario; ?>">Eliminar</a></td>
                        </tr> 
                        <?php }
                        $result->close();
                      
                        }
                      ?>
                      </tbody>
                      
                    </table>    







  </form>
</center>


  <br><center><br><br><br><a href="insert.php" ><h5><b>NUEVO</b></h5></a></center><br>




</body>

</html>