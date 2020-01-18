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
                <h3>Registros <small>Entregas Realizadas recientemente</small></h3>
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

            

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Residuos Enviados por los clientes <small>Registros</small></h2>
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
                          <form action="entregaempresa.php">
                      <table id="datatable-residuos" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th><center>ID Residuo</center></th>
                                <?php if($_SESSION['rol']!="3"):  ?> 
                                <th><center>Usuario</center></th>
                                <?php endif; ?>
                                <th><center>Tipo</center></th>
                                <th><center>Peso Aproximado</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Donativo</center></th>
                                 <?php if($_SESSION['rol']!="3"):  ?> 
                                <th><center>Asignar</center></th>
                                <?php else: ?>
                                <th><center>Estado</center></th>
                              <?php endif; ?>
                              </tr>
                            </thead>


                            <tbody>
                              <?php
                                if ($rol!=3) {
                                  $consultarr="SELECT  * FROM  residuo r INNER JOIN usuario u ON  u.IdUsuario=r.IdUsuario INNER JOIN tipo t ON r.IdTipo=t.IdTipo INNER JOIN estadoer ee ON ee.IdEstado=r.IdEstado";
                                }else{
                                  $consultarr="SELECT  * FROM  residuo r INNER JOIN usuario u ON  u.IdUsuario=r.IdUsuario INNER JOIN tipo t ON r.IdTipo=t.IdTipo INNER JOIN estadoer ee ON ee.IdEstado=r.IdEstado  WHERE u.IdUsuario=".$idusu;
                                }
                                if ($result=mysqli_query($con,$consultarr)) {                          
                        
                                while ($mostrar=$result->fetch_object()) { 
                                  $estado=$mostrar->IdEstado;

                          ?>
                              <tr>
                                                             
                                <td><?php printf($mostrar->IdResiduo )?></td>
                                <?php if($_SESSION['rol']!="3"):  ?>                                
                                <td><?php printf($mostrar->Nombre)?></td>
                                <?php endif; ?> 
                                <td><?php printf($mostrar->NombreTipoR) ?></td>                                
                                <td><?php printf($mostrar->PesoAproximado) ?></td>   
                                <td><?php printf($mostrar->Fecha) ?></td>                             
                                <td><?php printf($mostrar->Donativo) ?></td>
                                <?php if ($estado=="0" and $rol!="3"):?>
                                  <td><center><a type="submit" href="entregaempresa.php?actualizar=<?php echo $mostrar->IdResiduo; ?>" class="btn btn-warning"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                <?php elseif($estado=="0"): ?> 
                                  <td><center><a type="submit" class="btn btn-warning"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                  <?php endif; ?> 
                                <?php if($estado=="1"):?>
                                  <td><center><a class="btn btn-danger"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                  <?php endif; ?> 
                                <?php if($estado=="2"):?>
                                  <td><center><a class="btn btn-success"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                <?php endif; ?> 
                              </tr>
                              <?php }
                                $result->close();                      
                                }
                              ?>
                            </tbody>
                          </table>
                          </form>
                    </div>
              
            
                  </div>
                </div>
              </div>
            </div>
          </div>
               <?php if($_SESSION['rol']!="3"):  ?> 
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Entregas del residuo a la empresa<small>Registros</small></h2>
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

                    
                    <div class="table-responsive">
                      <table id="datatable-entrega" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>ID Entrega</th>
                          <th>Numero de envio del residuo</th>
                          <th>Empresa Recolectora</th>
                          <th>Fecha</th>
                          <th>Peso Real</th>
                          <th>Costo</th>
                          <th><center>Ver</center></th>   
                          <th><center>Asignar</center></th>                          
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        if ($rol!=3) {
                          $consultar="SELECT  * FROM  entregaresiduo er INNER JOIN  empresarecolectora  emr ON er.IdEmpresaRecolectora=emr.IdEmpresaRecolectora INNER JOIN residuo r ON r.IdResiduo=er.IdResiduo INNER JOIN estadoer ee ON ee.IdEstado=er.IdEstado INNER JOIN usuario u ON r.IdUsuario=U.IdUsuario";
                        }else{
                          $consultar="SELECT  * FROM  entregaresiduo er INNER JOIN  empresarecolectora  emr ON er.IdEmpresaRecolectora=emr.IdEmpresaRecolectora INNER JOIN residuo r ON r.IdResiduo=er.IdResiduo INNER JOIN estadoer ee ON ee.IdEstado=er.IdEstado INNER JOIN usuario u ON r.IdUsuario=U.IdUsuario WHERE IdUsuario=".$idusu;
                        }
                          
                         if ($result=mysqli_query($con,$consultar)) {
                          
                        
                        while ($mostrar=$result->fetch_object()) {
                          $id=$mostrar->IdEntregaResiduo;
                          $estado=$mostrar->IdEstado;
                          $nombre=$mostrar->Nombre;
                          $direc=$mostrar->Direccion;
                          $cdenvio=$mostrar->IdResiduo;
                          $fech=$mostrar->Fecha;
                          $costo=$mostrar->Costo;
                          $peso=$mostrar->PesoReal;
                         
                        ?>
                        <tr>
                          <td><?php printf($mostrar->IdEntregaResiduo)?></td>
                          <td><?php printf($mostrar->IdResiduo)?></td>
                          <td><?php printf($mostrar->NombreEmpresaR)?></td>
                          <td><?php printf($mostrar->Fecha) ?></td>
                          <td><?php printf($mostrar->PesoReal) ?></td>
                          <td><?php printf($mostrar->Costo) ?></td> 
                           <td><center><button class="btn btn-primary btn-sm btnver" value=1><i class="fa fa-search" ></i></button></center></td>   
                           <?php if ($estado=="0"):?>
                                  <td><center><a class="btn btn-warning"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                <?php endif; ?> 
                                <?php if($estado=="1"):?>
                                  <td><center><a class="btn btn-danger btnenproceso"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                  <?php endif; ?> 
                                <?php if($estado=="2"):?>
                                  <td><center><a class="btn btn-success"><?php printf($mostrar->NombreEstado) ?></a></center></td>
                                <?php endif; ?>                    
                        </tr>
                        <?php }
                        $result->close();
                      
                        }
                      ?>
                      </tbody>                                            
                    </table>
                    
                    <div class="modal fade" id="modalver">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Ver Entrega</h4>
                                </div>
                                <div class="modal-body">
                                

                                  <div class="form-group">
                                    <label>Nombre del Cliente</label>
                                      <input name="vernombreusu" id="vernombreusu" value="<?php echo $nombre ?>" type="text" readonly="readonly" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Direccion</label>
                                      <input name="verdireccionusu" id="verdireccionusu" value="<?php echo $direc ?>" type="text" readonly="readonly" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Codigo del Envio</label>
                                      <input name="verenvioresiduo" id="verenvioresiduo" type="text" value="<?php echo $cdenvio ?>" readonly="readonly" class="form-control" >                                   
                                                                        
                                  </div>

                                  <div class="form-group">
                                    <label>Fecha</label>
                                      <input name="verfecha" id="verfecha" type="text" value="<?php echo $fech ?>" readonly="readonly" class="form-control" >                                   
                                                                        
                                  </div>
                                  <div class="form-group">
                                    <label>Peso</label>
                                      <input name="verpeso" id="verpeso" value="<?php echo $peso ?>" readonly="readonly" type="text" class="form-control" >                                   
                                                                        
                                  </div>

                                  <div class="form-group">
                                    <label>Costo</label>
                                      <input name="vercosto" id="vercosto" value="<?php echo $costo ?>" readonly="readonly" type="text" class="form-control" >                                   
                                                                        
                                  </div>

                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" name="updatever" data-dismiss="modal" class="btn btn-primary">OK!!</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                    
                    <form action="updates/updateentrega2.php" method="POST">
                    <div class="modal fade" id="modalentrega">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title=">Completar Entrega</h4>
                                </div>
                                <div class="modal-body">

                                   <input type="hidden" name="updateidentrega" id="updateidentrega">
                                   <input type="hidden" name="updateresiduo" id="updateresiduo">
                                  <div class="form-group">
                                    <label>Asignar Peso</label>
                                      <input name="updatepeso" id="updatepeso" type="text" class="form-control" >                                   
                                                                        
                                  </div>

                                  <div class="form-group">
                                    <label>Asignar Costo</label>
                                      <input name="updatecosto" id="updatecosto" type="text" class="form-control" >                                   
                                                                        
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" name="updateentrega" class="btn btn-primary">Guardar Cambios</button>
                                </div>                                
                              </div>
                            </div>
                          </div>
                        </form>

                    </div>
							     
						
                  </div>
                </div>
              </div>
            <?php endif; ?>

        
        </div>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

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

   <script>
      $(document).ready(function(){
        $('.btnenproceso').on("click", function(){
          $('#modalentrega').modal('show');
          
          $tr=$(this).closest('tr');

          var data =$tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log();

          $('#updateidentrega').val(data[0]);
          $('#updateestado').val(data[7]);
          $('#updateresiduo').val(data[1]);
          $('#updatefecha').val(data[3]);
          $('#updatepeso').val(data[4]);
          $('#updatecosto').val(data[5]);



        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $('.btnver').on("click", function(){
          var id=this.value;
          $('#modalver').modal('show');
          
          


        });
      });
    </script>

      
      

  
  </body>
</html>
