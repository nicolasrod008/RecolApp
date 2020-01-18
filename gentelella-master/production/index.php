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
                   <?php if($_SESSION['rol']=="3"): ?>
                  <li><a><i class="fa fa-gift"></i> Canjear Puntos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="puntos.php">Bonos y Mas</a></li>

                    </ul>
                  </li>
                  <?php endif; ?>
                    
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
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                $puntos=0;
                if ($rol!=3) {
                  $sql1="select * from entregaresiduo er INNER JOIN residuo r ON er.IdResiduo=r.IdResiduo INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario ";
                }else{
                  $sql1="select * from entregaresiduo er INNER JOIN residuo r ON er.IdResiduo=r.IdResiduo INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $puntos=$puntos+$mostrar->PesoReal; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?php echo $puntos ?><?php if ($rol!=3): ?>Kg <br><?php endif; ?></div>
                  <?php if ($rol!=3): ?>
                    <h3>Peso Total Obtenido</h3>
                  <?php else: ?>
                  <h3>Puntos obtenidos</h3>
                  <?php endif; ?>
                  <?php
                  $_SESSION['puntos']=$puntos;
                  ?>
                  <p>Total.</p>
                </div>
              <?php 
                $result->close();                      
               }
              ?>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                
                if ($rol!=3) {
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario ";
                }else{
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $entregas=$mostrar->entrega; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo $entregas ?></div>
                  <?php if ($rol!=3): ?>
                    <h3>Envios realizados por los clientes</h3>
                  <?php else: ?>
                  <h3>Envios Realizados</h3>
                  <?php endif; ?>
                  <p>Total.</p>
                </div>
                <?php 
                $result->close();                      
               }
              ?>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                
                if ($rol!=3) {
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=0";
                }else{
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=0 and u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $entregas=$mostrar->entrega; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo $entregas ?></div>
                  <h3>Envios en espera</h3>
                  <p>Total.</p>
                </div>
                <?php 
                $result->close();                      
               }
              ?>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                
                if ($rol!=3) {
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=2";
                }else{
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=2 and u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $entregas=$mostrar->entrega; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $entregas ?></div>
                  <h3>Envios ya procesados</h3>
                  <p>Total.</p>
                </div>
              </div>
              <?php 
                $result->close();                      
               }
              ?>
            </div>

            <?php if ($rol=="1") :?>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                $puntos=0;
                
                  $sql1="select *, count(IdUsuario) as usuarios from usuario ";
                
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $usus=$mostrar->usuarios; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?php echo $usus ?></div>
                    <h3>Total de usuarios en el sistema</h3>
                  <p>Total.</p>
                </div>
              <?php 
                $result->close();                      
               }
              ?>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                $total=0;
                  $sql1="select count(r.IdResiduo), floor(count(r.IdUsuario)/count(r.IdUsuario)) as us FROM residuo r  GROUP by r.IdUsuario having count(r.IdResiduo)>2";
                                
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $total=$total+$mostrar->us; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check

                    "></i></div>
                  <div class="count"><?php echo $total ?></div>
                    <h3>Total de clientes con envios activos</h3>
                  <p>Total.</p>
                </div>
                <?php 
                $result->close();                      
               }
              ?>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                
                if ($rol!=3) {
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=0";
                }else{
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=0 and u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $entregas=$mostrar->entrega; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo $entregas ?></div>
                  <h3>Envios en espera</h3>
                  <p>Total.</p>
                </div>
                <?php 
                $result->close();                      
               }
              ?>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <?php 
                
                
                if ($rol!=3) {
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=2";
                }else{
                  $sql1="select *, count(r.IdResiduo) as entrega from residuo r INNER JOIN usuario u ON r.IdUsuario=u.IdUsuario WHERE r.IdEstado=2 and u.IdUsuario=".$idusu;
                }
                 
                
                if ($result=mysqli_query($con,$sql1)) {                          
                        
                while ($mostrar=$result->fetch_object()) { 
                                  
                $entregas=$mostrar->entrega; 
                }
                ?>
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $entregas ?></div>
                  <h3>Envios ya procesados</h3>
                  <p>Total.</p>
                </div>
              </div>
              <?php 
                $result->close();                      
               }
              ?>
            <?php endif; ?>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Envios Realizados <small>Progreso mensual</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="height:280px">
                        <div id="chart_plot_02" class="demo-placeholder"></div>
                      </div>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                        <div class="x_title">
                          <h2>Top Profiles</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                              </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>