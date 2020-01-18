<?php
session_start();
require_once('../../conexiones/conexion.php');
$rol=$_SESSION['rol'];
$idusu=$_SESSION['idusu'];
if ($rol==0 ) {
  

  header('Location: ../../index.php');
}
$con=conectar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Admin RecolApp! </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <?php
        if (isset($_SESSION["Error"])) {
          $error=$_SESSION["Error"];
          echo "<br>$error";
        }
        ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-recycle"></i> <span>RecolApp!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Registro De Actividad</a></li>
                    </ul>
                  </li>
                  <?php if($_SESSION['rol']=="1"):  ?>
                  <li><a><i class="fa fa-edit"></i> Formularios ADM <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="formUsuario.php">Insertar Usuario</a></li>
                      <li><a href="formConvenio.php">Insertar Convenio</a></li>
                      <li><a href="formEmpresaGeneradora.php">Insertar Empresa Generadora</a></li>
                      <li><a href="formEmpresaRecolectora.php">Insertar Empresa Recolectora</a></li>
                      <li><a href="formEntregaResiduo.php">Insertar Entrega Residuo</a></li>
                      <li><a href="formResiduo.php">Insertar Residuo</a></li>
                      <li><a href="formTipoResiduo.php">Insertar Tipo De Residuo</a></li>
                      <li><a href="formTipoArbol.php">Insertar Tipo De Arbol</a></li>
                      <li><a href="formArbol.php">Insertar Arbol</a></li>
                    </ul>
                  </li>
                  <?php endif; ?>
                  <?php if($_SESSION['rol']=="3"):  ?>
                  <li><a><i class="fa fa-edit"></i> Generar Entrega <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">                      
                      <li><a href="residuocliente.php">Insertar Envio de Residuo</a></li>
                    </ul>
                  </li>
                  <?php endif; ?>
                  <?php if($_SESSION['rol']=="2"):  ?>
                  <li><a><i class="fa fa-edit"></i> Administrar Residuos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="entregaempresa.php">Insertar Entrega de Residuo</a></li>
                      <li><a href="formTipoResiduo.php">Insertar Tipo De Residuo</a></li>
                    </ul>
                  </li>
                  <?php endif; ?>
                  <?php if($_SESSION['rol']=="0"):  ?>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <?php endif; ?>
                  <li><a><i class="fa fa-table"></i> Acciones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="registros.php">Informes</a></li>
                      <?php if($_SESSION['rol']=="1"): ?>
                      <li><a href="tablas.php">Tablas</a></li>
                      <?php endif; ?>
                    </ul>
                  </li>
                  <?php if($_SESSION['rol']=="0"): ?>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li> 
                  <?php endif; ?>                 
                </ul>
              </div>
              <div class="menu_section">
                <h3>Mi Gestion</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($_SESSION['rol']=="0"): ?>
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                      <?php endif; ?> 
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($_SESSION['rol']=="0"): ?>
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Ajustes">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Pantalla Completa">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Bloquear">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesion" href="../../ingreso/salir.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuracion</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="../../ingreso/salir.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ''.$_SESSION['nombre'].'  ';?><?php echo ''.$_SESSION['apellido'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todos los mensajes</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Registros <small>Informacion de Registros</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <?php if($rol!="2" && $rol!="3"):  ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuarios <small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-usuarios"  class="table table-striped table-bordered bulk_action">
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
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $consulta="SELECT * FROM  usuario u INNER JOIN rol r ON u.IdRol=r.IdRol";

                          
                        if ($result=mysqli_query($con,$consulta)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {               
                       ?>
                        <tr>
                          <td><?php printf($mostrar->IdUsuario )?></td>
                          <td><?php printf($mostrar->NombreRol)?></td>
                          <td><?php printf($mostrar->Nombre) ?></td>
                          <td><?php printf($mostrar->Apellido) ?></td>
                          <td><?php printf($mostrar->Direccion) ?></td>
                          <td><?php printf($mostrar->Documento) ?></td>
                          <td><?php printf($mostrar->Telefono) ?></td>
                          <td><?php printf($mostrar->Email) ?></td>
                          <td><?php printf($mostrar->Contrasena) ?></td>
                          <td><button class="btn btn-primary btn-sm btneditar"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndelete" ><i class="fa fa-times-circle-o" ></i></button> </td>
                        </tr>
                        <?php }
                        }
                        $result->close();                      
                        
                      ?>
                      </tbody>                       
                    </table>

                     <form action="updates/updateusus.php" method="POST">
                    <div class="modal fade" id="modal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Usuario</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <div class="form-group">
                                    <label>Rol</label>
                                      <select class="form-control" name="selectRol" id="selectRol">
                                      <option class="form-control" value="0">--</option>
                                      <?php
                                       $sql="select * from rol";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdRol']."'>".$res['NombreRol']."</option>";
                                       }

                                      ?>
                                  </select>                                  
                                                                        
                                  </div>
                                  <input type="hidden" name="updateid" id="updateid">
                                  <div class="form-group">
                                    <label>Nombre</label>
                                      <input name="nombre" id="nombre" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Apellidos</label>
                                      <input name="apellido" id="apellido" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Direccion</label>
                                      <input name="direccion" id="direccion" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Documento</label>
                                      <input name="documento" id="documento" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Telefono</label>
                                      <input name="telefono" id="telefono" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                      <input name="email" id="email" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Contraseña</label>
                                      <input name="clave" id="clave" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  <div id="panelselector"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateusus" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>


                        <form action="delete/deleteusus.php" method="POST">
                    <div class="modal fade" id="modaldelete">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Usuario</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteid" id="deleteid">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedata" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php if($rol!="3"):  ?>              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entregas De Residuos <small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                             
                    <table id="datatable-entrega" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>ID Entrega</th>                          
                          <th>Empresa Recolectora</th>
                          <th>Numero de envio del residuo</th>
                          <th>Fecha</th>
                          <th>Peso Real</th>
                          <th>Costo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                       
                          $consultar="SELECT  * FROM  entregaresiduo er INNER JOIN residuo r ON r.IdResiduo=er.IdResiduo INNER JOIN  empresarecolectora  emr ON er.IdEmpresaRecolectora=emr.IdEmpresaRecolectora ";
                       
                          
                         if ($result=mysqli_query($con,$consultar)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {

                         
                        ?>
                        <tr>
                          <td><?php printf($mostrar->IdEntregaResiduo)?></td>
                          <td><?php printf($mostrar->NombreEmpresaR)?></td>
                          <td><?php printf($mostrar->IdResiduo)?></td>
                          <td><?php printf($mostrar->Fecha) ?></td>
                          <td><?php printf($mostrar->PesoReal) ?></td>
                          <td><?php printf($mostrar->Costo) ?></td>
                          <td><button class="btn btn-primary btn-sm btnupdateentrega" ><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndeleteentrega" ><i class="fa fa-times-circle-o" ></i></button> </td>
                        </tr>
                        <?php }
                        $result->close();
                      
                        }
                      ?>
                      </tbody>                                            
                    </table>
                    <form action="updates/updateentrega.php" method="POST">
                    <div class="modal fade" id="modalentrega">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Entregas</h4>
                                </div>
                                <div class="modal-body">
                                
                                  
                                  <input type="hidden" name="identrega" id="identrega">                                 

                                  <div class="form-group">
                                    <label>Empresa Recolectora</label>
                                      <select class="form-control" name="selectempresar" id="selectempresar">
                                      <option class="form-control" value="selectempresar">--</option>
                                      <?php
                                       $sql="select * from empresarecolectora";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdEmpresaRecolectora']."'>".$res['NombreEmpresaR']."</option>";
                                       }

                                      ?>
                                  </select>                                  
                                                                        
                                  </div>

                                  <div class="form-group">
                                    <label>Numero de envio de Residuo</label>
                                      <select class="form-control" name="selectresiduo" id="selectresiduo">
                                      <option class="form-control" value="selectempresar">--</option>
                                      <?php
                                       $sql="select * from residuo";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdResiduo']."'>".$res['IdResiduo']."</option>";
                                       }

                                      ?>
                                  </select>                                  
                                                                        
                                  </div>

                                  <div class="form-group">
                                    <label>Fecha</label>
                                      <input name="fechaentrega" id="fechaentrega" type="date" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Peso</label>
                                      <input name="pesoentrega" id="pesoentrega" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Costo</label>
                                      <input name="costoentrega" id="costoentrega" type="text" class="form-control" >                                   
                                                                        
                                  </div>                               

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateentregas" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>

                  <form action="delete/deleteentrega.php" method="POST">
                    <div class="modal fade" id="modaldeleteentrega">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Entregas</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="dtidentrega" id="dtidentrega">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedataentrega" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>

                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php if($rol=="1"):  ?>   
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empresa Generadora <small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                               
                    <table id="datatable-empresaG" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID Empresa</th>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Nit</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                         <?php
                          $consultas="SELECT * FROM empresageneradora eg";
                          if ($result=mysqli_query($con,$consultas)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {
                        ?>
                        <tr>
                          <td><?php printf($mostrar->IdEmpresaGeneradora)?></td>
                          <td><?php printf($mostrar->NombreEmpresaG)?></td>
                          <td><?php printf($mostrar->Direccion) ?></td>
                          <td><?php printf($mostrar->Telefono) ?></td>
                          <td><?php printf($mostrar->Nit) ?></td>
                          <td><button class="btn btn-primary btn-sm btneditarempresag"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndeleteempresag" ><i class="fa fa-times-circle-o" ></i></button> </td>
                        </tr>
                        <?php }
                        $result->close();                      
                        }
                      ?>
                      </tbody>                        
                    </table>
                    <form action="updates/updateempresag.php" method="POST">
                    <div class="modal fade" id="modalempresag">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Empresas Generadoras</h4>
                                </div>
                                <div class="modal-body">
                                
                                  
                                  <input type="hidden" name="updateidempresag" id="updateidempresag">
                                  <div class="form-group">
                                    <label>Nombre</label>
                                      <input name="nombreempresag" id="nombreempresag" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Direccion</label>
                                      <input name="direccionempresag" id="direccionempresag" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  

                                  <div class="form-group">
                                    <label>Telefono</label>
                                      <input name="telefonoempresag" id="telefonoempresag" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Nit</label>
                                      <input name="nitempresag" id="nitempresag" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  
                                  <div id="panelselector"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateempresag" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>


                        <form action="delete/deleteempresag.php" method="POST">
                    <div class="modal fade" id="modaldeleteempresag">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Empresas Generadoras</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidempresag" id="deleteidempresag">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedataempresag" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php if($rol=="1"):  ?>  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Convenios <small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                   
                    <table id="datatable-convenio" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID Convenio</th>
                          <th>Empresa Generadora</th>
                          <th>Usuario</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Fin</th>
                          <th>Costo</th>
                          <th>Dirirgido</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                         <?php
                            $consultac="SELECT  *, eg.NombreEmpresaG , u.Nombre FROM  convenio c INNER JOIN  EmpresaGeneradora eg ON c.IdEmpresaGeneradora=eg.IdEmpresaGeneradora INNER JOIN usuario u ON c.IdUsuario=u.IdUsuario";        
                             if ($result=mysqli_query($con,$consultac)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {            
                        
                        ?>
                        <tr>
                          <td><?php printf($mostrar->IdConvenio )?></td>
                          <td><?php printf($mostrar->NombreEmpresaG)?></td>
                          <td><?php printf($mostrar->Nombre) ?></td>
                          <td><?php printf($mostrar->FechaInicio) ?></td>
                          <td><?php printf($mostrar->FechaFin) ?></td>
                          <td><?php printf($mostrar->Costo) ?></td>
                          <td><?php printf($mostrar->Dirigido) ?></td>
                          <td><button class="btn btn-primary btn-sm btneditar"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndelete" ><i class="fa fa-times-circle-o" ></i></button> </td>
                        <?php }
                        $result->close();                      
                        }
                      ?>
                      </tbody>                       
                    </table>

                 
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php if($rol!="3"):  ?>  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Residuos <small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-buttons">
                          
                          
                          <table id="datatable-residuos" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>ID Residuo</th>
                                <th>Usuario</th>
                                <th>Tipo</th>
                                <th>Peso Aproximado</th>
                                <th>Fecha</th>
                                <th>Donativo</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>


                            <tbody>
                              <?php
                                $consultar="SELECT  * FROM  residuo r INNER JOIN usuario u ON  u.IdUsuario=r.IdUsuario INNER JOIN tipo t ON r.IdTipo=t.IdTipo ";
                                if ($result=mysqli_query($con,$consultar)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                          ?>
                              <tr>
                                                             
                                <td><?php printf($mostrar->IdResiduo )?></td>
                                <td><?php printf($mostrar->Nombre)?></td>
                                <td><?php printf($mostrar->NombreTipoR) ?></td>                                
                                <td><?php printf($mostrar->PesoAproximado) ?></td>   
                                <td><?php printf($mostrar->Fecha) ?></td>                             
                                <td><?php printf($mostrar->Donativo) ?></td>
                                <td><button class="btn btn-primary btn-sm btneditarresiduo"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndeleteresiduo" ><i class="fa fa-times-circle-o" ></i></button> </td>
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                          </table>
                          <form action="updates/updateresiduo.php" method="POST">
                    <div class="modal fade" id="modalresiduo">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Residuos</h4>
                                </div>
                                <div class="modal-body">
                                
                                  
                                  <input type="hidden" name="updateidresiduo" id="updateidresiduo">
                                  <div class="form-group">
                                    <label>Codigo de la Entrega del Residuo</label>
                                      <select class="form-control" name="entregaresiduor" id="entregaresiduor">
                                      <option class="form-control" value="">---</option>
                                      <?php
                                       $sql="select * from entregaresiduo";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdEntregaResiduo']."'>".$res['IdEntregaResiduo']."</option>";
                                       }

                                      ?>
                                  </select>                  
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Codigo del convenio</label>
                                      <select class="form-control" name="convenioresiduo" id="convenioresiduo">
                                      <option class="form-control" value="">----</option>
                                      <?php
                                       $sql="select * from convenio";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdConvenio']."'>".$res['IdConvenio']."</option>";
                                       }

                                      ?>
                                  </select>                    
                                  </div>
                                  

                                  <div class="form-group">
                                    <label>Tipo</label>
                                      <select class="form-control" name="tiporesiduo" id="tiporesiduo">
                                      <option class="form-control" value="">---</option>
                                      <?php
                                       $sql="select * from tipo";  
                                       $ejecutar = $con->query($sql);
                                       while ($res=$ejecutar->fetch_assoc()) {
                                        echo "<option value = '".$res['IdTipo']."'>".$res['NombreTipoR']."</option>";
                                       }

                                      ?>
                                  </select>                                  
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Peso</label>
                                      <input name="pesoresiduo" id="pesoresiduo" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  
                                  <div id="panelselector"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateresiduo" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>


                        <form action="delete/deleteresiduo.php" method="POST">
                    <div class="modal fade" id="modaldeleteresiduo">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Residuos</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidresiduo" id="deleteidresiduo">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedataresiduo" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>

              <?php if($rol!="3"):  ?>  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tipo de Residuos<small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
					
                    <table id="datatable-tiporr" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                       <tbody>
                              <?php
                                $consultar="SELECT  * FROM  tipo";
                                if ($result=mysqli_query($con,$consultar)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                          ?>
                              <tr>
                                <td><?php printf($mostrar->IdTipo )?></td>
                                <td><?php printf($mostrar->NombreTipoR)?></td>
                                <td><button class="btn btn-danger btndeletetipor" ><i class="fa fa-times-circle-o" ></i></button> </td>
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                    </table>   
                        <form action="delete/deletetipor.php" method="POST">
                    <div class="modal fade" id="modaldeletetipor">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Tipo de Residuos</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidtipor" id="deleteidtipor">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedatatipor" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>               
					
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if($rol=="1"):  ?>  
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empresa Recolectora<small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
          
                    <table id="datatable-empresaR" class="table table-striped table-bordered dt-responsive nowrap">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                       <tbody>
                              <?php
                                $consultar="SELECT  * FROM  empresarecolectora";
                                if ($result=mysqli_query($con,$consultar)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                          ?>
                              <tr>
                                <td><?php printf($mostrar->IdEmpresaRecolectora )?></td>
                                <td><?php printf($mostrar->NombreEmpresaR)?></td>
                                <td><?php printf($mostrar->Direccion )?></td>
                                <td><?php printf($mostrar->Telefono)?></td>
                                <td><?php printf($mostrar->Email)?></td>
                                <td><button class="btn btn-primary btn-sm btneditarempresar"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndeleteempresar" ><i class="fa fa-times-circle-o" ></i></button> </td>
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                    </table>  

                    <form action="updates/updateempresar.php" method="POST">
                    <div class="modal fade" id="modalempresar">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Empresas Recolectore</h4>
                                </div>
                                <div class="modal-body">
                                
                                  
                                  <input type="hidden" name="updateidempresar" id="updateidempresar">
                                  <div class="form-group">
                                    <label>Nombre</label>
                                      <input name="nombreempresar" id="nombreempresar" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Direccion</label>
                                      <input name="direccionempresar" id="direccionempresar" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  

                                  <div class="form-group">
                                    <label>Telefono</label>
                                      <input name="telefonoempresar" id="telefonoempresar" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                      <input name="emailempresar" id="emailempresar" type="text" class="form-control" name="">                                   
                                                                        
                                  </div>
                                  
                                  <div id="panelselector"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateempresar" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>


                        <form action="delete/deleteempresar.php" method="POST">
                    <div class="modal fade" id="modaldeleteempresar">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Empresas Recolectora</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidempresar" id="deleteidempresar">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedataempresar" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>                
          
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if($rol=="1"):  ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Arboles<small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
          
                    <table id="datatable-arbol" class="table table-striped table-bordered dt-responsive nowrap">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Numero de entrega del donativo</th>
                          <th>Tipo</th>
                          <th>Costo</th>
                          <th>Foto</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                       <tbody>
                              <?php
                                $consultar="SELECT  * FROM  arbol a INNER JOIN entregaresiduo er ON a.IdEntregaResiduo=er.IdEntregaResiduo INNER JOIN tipoa ta ON a.IdTipo=ta.IdTipo";
                                if ($result=mysqli_query($con,$consultar)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                          ?>
                              <tr>
                                <td><?php printf($mostrar->IdArbol)?></td>
                                <td><?php printf($mostrar->IdEntregaResiduo)?></td>
                                <td><?php printf($mostrar->NombreTipoA )?></td>
                                <td><?php printf($mostrar->Costo)?></td>
                                <td><?php printf($mostrar->AdjuntarFoto)?></td>
                                <td><button class="btn btn-primary btn-sm btneditararbol"><i class="fa fa-pencil-square-o" ></i></button><button class="btn btn-danger btn-sm btndeletearbol" ><i class="fa fa-times-circle-o" ></i></button> </td>
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                    </table> 

                    <form action="updates/updatearbol.php" method="POST">
                    <div class="modal fade" id="modalarbol">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Editar Arboles</h4>
                                </div>
                                <div class="modal-body">
                                
                                  
                                  <input type="hidden" name="updateidarbol" id="updateidarbol">
                                  <div class="form-group">
                                    <label>Numero de entrega del arbol</label>
                                      <select class="form-control" name="entregaarbol" id="entregaarbol">
                                        <option class="form-control" value=""></option>
                                        <?php
                                         $sql="select * from EntregaResiduo";  
                                         $ejecutar = $con->query($sql);
                                         while ($res=$ejecutar->fetch_assoc()) {
                                          echo "<option value = '".$res['IdEntregaResiduo']."'>".$res['IdEntregaResiduo']."</option>";
                                         }

                                        ?>
                                    </select>                                   
                                                                        
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Tipo</label>
                                      <select class="form-control" name="tipoarbol" id="tipoarbol">
                                        <option class="form-control" value=""></option>
                                        <?php
                                         $sql="select * from tipoa";  
                                         $ejecutar = $con->query($sql);
                                         while ($res=$ejecutar->fetch_assoc()) {
                                          echo "<option value = '".$res['IdTipo']."'>".$res['NombreTipoA']."</option>";
                                         }

                                        ?>
                                    </select>                                  
                                                                        
                                  </div>
                                  

                                  <div class="form-group">
                                    <label>Costo</label>
                                      <input name="costoarbol" id="costoarbol" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Foto</label>
                                      <input name="fotoarbol" id="fotoarbol" type="file" class="form-control" >                                   
                                                                        
                                  </div>
                                  
                                  <div id="panelselector"></div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updatearbol" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>


                        <form action="delete/deletearbol.php" method="POST">
                    <div class="modal fade" id="modaldeletearbol">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Arbol</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidarbol" id="deleteidempresar">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedataarbol" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>                 
          
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if($rol=="1"):  ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tipos de Arboles<small>Registros</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Ajustes 1</a>
                          </li>
                          <li><a href="#">Ajustes 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
          
                    <table id="datatable-tipoa" class="table table-striped table-bordered dt-responsive nowrap">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                       <tbody>
                              <?php
                                $consultar="SELECT  * FROM  tipoa";
                                if ($result=mysqli_query($con,$consultar)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                          ?>
                              <tr>
                                <td><?php printf($mostrar->IdTipo)?></td>
                                <td><?php printf($mostrar->NombreTipoA)?></td>
                                <td><button class="btn btn-danger btndeletetipoa" ><i class="fa fa-times-circle-o" ></i></button> </td>
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                    </table>  

                    <form action="delete/deletetipoa.php" method="POST">
                    <div class="modal fade" id="modaldeletetipoa">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Eliminar Tipo de Arbol</h4>
                                </div>
                                <div class="modal-body">
                                
                                  <input type="hidden" name="deleteidtipoa" id="deleteidtipoa">
                                  <h4>¿Esta seguro que desea eliminar este registro?</h4>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                  <button type="submit" name="deletedatatipoa" class="btn btn-primary">Si!! Eliminar registro</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>                 
          
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

     <script type="text/javascript">
      $(document).ready(function(){
        tablaUsuarios=$('#datatable-usuarios').DataTable({
          
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]

      });        

    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-entrega').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-empresaG').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-convenio').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-residuos').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-tiporr').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",
            
        },
      });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-empresaR').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-tipor').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-tipoa').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable-arbol').DataTable({
         "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron Resultados",
            "info": "Mostrar registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ total regisros)",
            "sSearch":"Buscar:",
            "oPaginate":{
              "sFirst":"Primero",
              "sLast":"Ultimo",
              "sNext":"Siguiente",
              "sPrevious":"Anterior",              
            },
            "sProcessing":"Procesando...",            
        },
        responsive:"true",
        dom: 'Blfrtip',
        buttons:[
          {
            extend:'csvHtml5',
            text:'<i class="fa fa-file-excel-o"></i> ',
            titleAttr:'Exportar a Excel',
            className:'btn btn-success'
          },
          {
            extend:'pdfHtml5',
            text:'<i class="fas fa-file-pdf"></i>',
            titleAttr:'Exportar a PDF',
            className:'btn btn-danger'
          },
          {
            extend:'print',
            text:'<i class="fa fa-print"></i>',
            titleAttr:'Imprimir',
            className:'btn btn-info'
          },
        ]
      });
    });
    </script>

     <script>
      $(document).ready(function(){
        $('.btndelete').on("click", function(){
          $('#modaldelete').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteid').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btneditar').on("click", function(){
          $('#modal').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateid').val(data[0]);
          $('selectRol').val(data[1]);
          $('#nombre').val(data[2]);
          $('#apellido').val(data[3]);
          $('#direccion').val(data[4]);
          $('#documento').val(data[5]);
          $('#telefono').val(data[6]);
          $('#email').val(data[7]);
          $('#clave').val(data[8]);



        });
      });

      

    </script>


<script>
      $(document).ready(function(){
        $('.btndeleteentrega').on("click", function(){
          $('#modaldeleteentrega').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#dtidentrega').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btnupdateentrega').on("click", function(){
          $('#modalentrega').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#identrega').val(data[0]);
          $('#selectempresar').val(data[1]);
          $('#selectresiduo').val(data[2]);
          $('#fechaentrega').val(data[3]);
          $('#pesoentrega').val(data[4]);
          $('#costoentrega').val(data[5]);


        });
      });

      

    </script>


    <script>
      $(document).ready(function(){
        $('.btndeleteempresag').on("click", function(){
          $('#modaldeleteempresag').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidempresag').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btneditarempresag').on("click", function(){
          $('#modalempresag').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateidempresag').val(data[0]);
          $('#nombreempresag').val(data[1]);
          $('#direccionempresag').val(data[2]);
          $('#telefonoempresag').val(data[3]);
          $('#nitempresag').val(data[4]);


        });
      });

      

    </script>

    <script>
      $(document).ready(function(){
        $('.btndeleteresiduo').on("click", function(){
          $('#modaldeleteresiduo').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidresiduo').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btneditarresiduo').on("click", function(){
          $('#modalresiduo').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateidresiduo').val(data[0]);
          $('#entregaresiduor').val(data[1]);
          $('#convenioresiduo').val(data[2]);
          $('#tiporesiduo').val(data[3]);
          $('#pesoresiduo').val(data[4]);


        });
      });

      

    </script>

    <script>
      $(document).ready(function(){
        $('.btndeletetipor').on("click", function(){
          $('#modaldeletetipor').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidtipor').val(data[0]);

        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.btndeleteempresar').on("click", function(){
          $('#modaldeleteempresar').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidempresar').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btneditarempresar').on("click", function(){
          $('#modalempresar').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateidempresar').val(data[0]);
          $('#nombreempresar').val(data[1]);
          $('#direccionempresar').val(data[2]);
          $('#telefonoempresar').val(data[3]);
          $('#emailempresar').val(data[4]);


        });
      });

      

    </script>

     <script>
      $(document).ready(function(){
        $('.btndeletearbol').on("click", function(){
          $('#modaldeletearbol').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidarbol').val(data[0]);

        });
      });
    </script>



    <script>
      $(document).ready(function(){
        $('.btneditararbol').on("click", function(){
          $('#modalarbol').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateidarbol').val(data[0]);
          $('#entregaarbol').val(data[1]);
          $('#tipoarbol').val(data[2]);
          $('#costoarbol').val(data[3]);
          $('#fotoarbol').val(data[4]);


        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.btndeletetipoa').on("click", function(){
          $('#modaldeletetipoa').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteidtipoa').val(data[0]);

        });
      });
    </script>

    

  </body>
</html>

