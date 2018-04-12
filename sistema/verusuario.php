<?php
session_start();
//si hay una sesión
if (isset($_SESSION['name'])){
    //se muestra el contenido de la página web
    require("config/connect_db.php");

    // output data of each row
    $sql = "SELECT * FROM categorias ORDER BY id DESC";
    $result1 = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Arouesty | Sistema</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="vendors/jquery-news-ticker/jquery.news-ticker.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="css/themes/style1/pink-violet.css" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="css/style-responsive.css">
</head>
<body class="sidebar-colors">
<div><!--BEGIN THEME SETTING-->
    
    <!--END THEME SETTING--><!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP--><!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" data-intro="&lt;b&gt;Topbar&lt;/b&gt; has other styles with live demo. Go to &lt;b&gt;Layouts-&gt;Header&amp;Topbar&lt;/b&gt; and check it out." class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="home.php" class="navbar-brand"><span class="fa fa-rocket"></span><img class="img-responsive" src="../img/logo.jpg" alt="Arouesty"></span><span style="display: none" class="logo-text-icon"></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar-nav    ">
                    <li class="active"><a href="home.php">Inicio</a></li>
                    <li><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Usuarios
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout-left-sidebar.html">Nueva Reservacion</a></li>
                            <li><a href="layout-right-sidebar.html">Ver Reservaciones</a></li>
                            
                        </ul>
                    </li>
                    
                </ul>
                <!--
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li>Welcome to μAdmin - Responsive Multi-Style Admin Template</li>
                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque.</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><p>You have 14 new notifications</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="label label-blue"><i class="fa fa-comment"></i></span>New Comment<span class="pull-right text-muted small">4 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-violet"><i class="fa fa-twitter"></i></span>3 New Followers<span class="pull-right text-muted small">12 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-pink"><i class="fa fa-envelope"></i></span>Message Sent<span class="pull-right text-muted small">15 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-green"><i class="fa fa-tasks"></i></span>New Task<span class="pull-right text-muted small">18 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-yellow"><i class="fa fa-upload"></i></span>Server Rebooted<span class="pull-right text-muted small">19 mins ago</span></a></li>
                                        <li><a href="#"><span class="label label-green"><i class="fa fa-tasks"></i></span>New Task<span class="pull-right text-muted small">2 days ago</span></a></li>
                                        <li><a href="#"><span class="label label-pink"><i class="fa fa-envelope"></i></span>Message Sent<span class="pull-right text-muted small">5 days ago</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#" class="text-right">See all alerts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><p>You have 14 new messages</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">Jessica Spencer</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="#"><span class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith<span class="label label-blue pull-right">New</span></span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="#"><span class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Doe<span class="label label-orange pull-right">10 min</span></span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="#"><span class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="#"><span class="avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#">Read all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li><p>You have 14 pending tasks</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="#"><span class="task-item">Fix the HTML code<small class="pull-right text-muted">40%</small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;" class="progress-bar progress-bar-orange"><span class="sr-only">40% Complete (success)</span></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#"><span class="task-item">Make a wordpress theme<small class="pull-right text-muted">60%</small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-blue"><span class="sr-only">60% Complete (success)</span></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#"><span class="task-item">Convert PSD to HTML<small class="pull-right text-muted">55%</small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;" class="progress-bar progress-bar-green"><span class="sr-only">55% Complete (success)</span></div>
                                            </div>
                                        </a></li>
                                        <li><a href="#"><span class="task-item">Convert HTML to Wordpress<small class="pull-right text-muted">78%</small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;" class="progress-bar progress-bar-yellow"><span class="sr-only">78% Complete (success)</span></div>
                                            </div>
                                        </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="#">See all tasks</a></li>
                        </ul>
                    </li>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">John Doe</span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="page-calendar.html"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="email-inbox.html"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="extra-lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="cerrar.php"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                    <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>
                </ul>
            </div>-->
        </nav>
        <!--BEGIN MODAL CONFIG PORTLET-->
        
        <!--END MODAL CONFIG PORTLET--></div>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="thumb"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" alt="" class="img-circle"/></div>
                        <div class="info"><p>Admin</p>
                            <ul class="list-inline list-unstyled">
                                <li><a href="extra-profile.html" data-hover="tooltip" title="Profile"><i class="fa fa-user"></i></a></li>
                                <li><a href="email-inbox.html" data-hover="tooltip" title="Mail"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#" data-hover="tooltip" title="Setting" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                                <li><a href="cerrar.php" data-hover="tooltip" title="Logout"><i class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <li class="active"><a href="home.php"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Inicio</span></a></li>
                    <li><a href="#"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Usuario</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="addusuario.php"><i class="fa fa-align-left"></i><span class="submenu-title">Nuevo Usuario</span></a></li>
                            <li><a href="verusuario.php"><i class="fa fa-angle-double-left"></i><span class="submenu-title">Ver Usuarios</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-database fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Videos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="addvideo.php"><i class="fa fa-briefcase"></i><span class="submenu-title">Nuevo Video</span></a></li>
                            <li><a href="vervideo.php"><i class="fa fa-th-large"></i><span class="submenu-title">Ver Videos</span></a></li>
                            
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Categorías</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="vercat.php"><i class="fa fa-angle-right"></i><span class="submenu-title">Ver Categoría</span></a></li>
                            
                            <li><a href="#"><i class="fa fa-angle-right"></i><span class="submenu-title"> Sub Categoria Nivel 1</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="addsub.php"><i class="fa fa-angle-double-right"></i><span class="submenu-title"></span> Nueva Sub Categoría</a></li>
                                    <!-- <li><a href="versub.php"> <i class="fa fa-angle-double-right"></i><span class="submenu-title"></span>Ver Sub Categoría </a></li> -->
                                    
                                    </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-right"></i><span class="submenu-title"> Sub Categoria Nivel 2</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="addsub2.php"><i class="fa fa-angle-double-right"></i><span class="submenu-title"></span> Nueva Sub Categoría</a></li>
                                    <!-- <li><a href="versub.php"> <i class="fa fa-angle-double-right"></i><span class="submenu-title"></span>Ver Sub Categoría </a></li> -->
                                    
                                    </ul>
                            </li>
                           

                        </ul>
                    </li>
                    <li><a href="cerrar.php"><i class="fa fa-slack fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Cerrar Sesion</span></a></li>
                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU--><!--BEGIN CHAT FORM-->
        
        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="portlet box portlet-yellow">
                            <div class="portlet-header">
                                <div class="caption">
                                 Usuarios</div>
                            </div>
            <div class="page-content">
                <div id="tab-general">
                    <div id="sum_box" class="row mbl">
                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha de inicio</th>
                                                    <th>Estado</th>
                                                    
                                                    <th>Acciones</th>
                                                </tr>
                                                <tbody>
                                                    <?php $sql2 = "SELECT * FROM usuarios WHERE estado!='-1'";
                                                            $result = $conn->query($sql2); 

                                                     while ($rows = $result->fetch_assoc()){
                                                     echo '<tr><td>'. $rows['id']. '</td>';
                                                     echo '<td>'. $rows['usuario']. '</td>';
                                                     echo '<td>'. $rows['contrasena']. '</td>';
                                                     echo '<td>'. $rows['nombre']. '</td>';
                                                     echo '<td>'. $rows['fecha_inicio']. '</td>';
                                                     

                                                     if ($rows['estado']=='1'){
                                                        echo '<td>'. "<br><span class='label label-sm label-success'>Activo</span>". '</td>';
                                                        echo '<td>'. "<a href='config/revocar.php?id=".$rows['id']."'> <button class='btn btn-xs btn-success filter-submit'>&nbsp;
                                                            Revocar
                                                        </button></a><br>";
                                                        echo  "<a href='editarusuario.php?id=".$rows['id']."'><button type='button' class='btn btn-default btn-xs'><i class='fa fa-edit'></i>&nbsp;
                                                            Editar
                                                        </button></a>
                                                        <br>
                                                        <a href='eliminar.php?id=".$rows['id']."'><button type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i>&nbsp;
                                                            Borrar
                                                        </button></a>". '</td>';
                                                        }else if ($rows['estado']=='2'){
                                                        echo '<td>'. "<br><span class='label label-sm label-warning'>Revocado</span>". '</td>';
                                                        echo '<td>'. "<a href='config/habilitar.php?id=".$rows['id']."'><button class='btn btn-xs btn-success filter-submit'>&nbsp;
                                                            Habilitar
                                                        </button></a><br>";
                                                        echo "<a href='editarusuario.php?id=".$rows['id']."'><button type='button' class='btn btn-default btn-xs'><i class='fa fa-edit'></i>&nbsp;
                                                            Editar
                                                        </button></a>
                                                        <br>
                                                        <a href='eliminar.php?id=".$rows['id']."'><button type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i>&nbsp;
                                                            Borrar
                                                        </button></a>". '</td>';
                                                        }
                                                    }
                                                    

                                                    
                                                     ?>
                                                    
                                                   
                                               
                                                
                                                </tbody>
                                                </thead></table>
                                               
                                                <table class="table table-hover table-striped table-bordered table-advanced tablesorter">
                                               
                                                    
                                                   
                                                </thead></table>
                    </div>
                    
                    </div>
                </div>

            </div>


            <!--END CONTENT--><!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright"><?php echo date('Y') ?> © Derechos Reservados - <a href="http://gente21.com" target="_blank">Gente21</a></div>
            </div>
            <!--END FOOTER--></div>
        <!--END PAGE WRAPPER--></div>
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<script src="vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="vendors/iCheck/icheck.min.js"></script>
<script src="vendors/iCheck/custom.min.js"></script>
<script src="vendors/jquery-news-ticker/jquery.news-ticker.js"></script>
<script src="js/jquery.menu.js"></script>
<script src="vendors/jquery-pace/pace.min.js"></script>
<script src="vendors/holder/holder.js"></script>
<script src="vendors/responsive-tabs/responsive-tabs.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="vendors/moment/moment.js"></script>
<script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="js/form-components.js"></script>
<script src="vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="js/main.js"></script>
</body>
</html>
<?php
}//si no hay sesión
else{
    //se redirecciona
    header ('location: index.html');
}
?>