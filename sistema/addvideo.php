<?php
session_start();
//si hay una sesión
if (isset($_SESSION['name'])){
    //se muestra el contenido de la página web
    require("config/connect_db.php");

   $sql2 = "SELECT * FROM categorias";
    $result = $conn->query($sql2);
    $result1 = $conn->query($sql2);

    // output data of each row

?>
<!DOCTYPE html>
<html lang="en">
<head><title>Arouesty | Nuevo Video</title>
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
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-colorpicker/css/colorpicker.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-datepicker/css/datepicker.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-clockface/css/clockface.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap-switch/css/bootstrap-switch.css">
    <!--Loading style vendors-->
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
                    <li><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Reservaciones
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout-left-sidebar.html">Nueva Reservacion</a></li>
                            <li><a href="layout-right-sidebar.html">Ver Reservaciones</a></li>
                            
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">UI Elements
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown mega-menu-full"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Extras
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum facilis est</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5 document-demo">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i class="fa fa-info-circle"></i><span>Introduction</span></a></li>
                                                <li><a href="#"><i class="fa fa-download"></i><span>Installation</span></a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i class="fa fa-cog"></i><span>T3 Settings</span></a></li>
                                                <li><a href="#"><i class="fa fa-desktop"></i><span>Layout System</span></a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i class="fa fa-magic"></i><span>Customization</span></a></li>
                                                <li><a href="#"><i class="fa fa-question-circle"></i><span>FAQs</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
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
        <div id="chat-form" class="fixed">
            <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;" class="chat-form-close pull-right"><i class="glyphicon glyphicon-remove"></i></a><i class="fa fa-user"></i>&nbsp;
                Chat
                &nbsp;<span class="badge badge-info">3</span></h2>

                <div id="group-1" class="chat-group"><strong>Favorites</strong><a href="#"><span class="user-status is-online"></span>
                    <small>Verna Morton</small>
                    <span class="badge badge-info">2</span></a><a href="#"><span class="user-status is-online"></span>
                    <small>Delores Blake</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-busy"></span>
                    <small>Nathaniel Morris</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-idle"></span>
                    <small>Boyd Bridges</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                    <small>Meredith Houston</small>
                    <span class="badge badge-info is-hidden">0</span></a></div>
                <div id="group-2" class="chat-group"><strong>Office</strong><a href="#"><span class="user-status is-busy"></span>
                    <small>Ann Scott</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                    <small>Sherman Stokes</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                    <small>Florence Pierce</small>
                    <span class="badge badge-info">1</span></a></div>
                <div id="group-3" class="chat-group"><strong>Friends</strong><a href="#"><span class="user-status is-online"></span>
                    <small>Willard Mckenzie</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-busy"></span>
                    <small>Jenny Frazier</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                    <small>Chris Stewart</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span class="user-status is-offline"></span>
                    <small>Olivia Green</small>
                    <span class="badge badge-info is-hidden">0</span></a></div>
            </div>
            <div id="chat-box" style="top:400px">
                <div class="chat-box-header"><a href="#" class="chat-box-close pull-right"><i class="glyphicon glyphicon-remove"></i></a><span class="user-status is-online"></span><span class="display-name">Willard Mckenzie</span>
                    <small>Online</small>
                </div>
                <div class="chat-content">
                    <ul class="chat-box-body">
                        <li><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" class="avt"/><span class="user">John Doe</span><span class="time">09:33</span></p>

                            <p>Hi Swlabs, we have some comments for you.</p></li>
                        <li class="odd"><p><img src="https://s3.amazonaws.com/uifaces/faces/twitter/alagoon/48.jpg" class="avt"/><span class="user">Swlabs</span><span class="time">09:33</span></p>

                            <p>Hi, we're listening you...</p></li>
                    </ul>
                </div>
                <div class="chat-textarea"><input placeholder="Type your message" class="form-control required required"/></div>
            </div>
        </div>
        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
           
            <div class="page-content">
                <div id="tab-general">
                    <div id="sum_box" class="row mbl">
                        <div class="panel panel-violet">
                            <div class="panel-heading">Ingresar Video</div>
                            <div class="panel-body pan">
                                <form action="config/ingresavideo.php" method="post" class="form-validate">
                                    <div class="form-body pal">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="first-name">Nombre:</label>
                                                    <div class="input-icon right"><input type="text" class="form-control required" name="nombre" id="first-name" placeholder="Ponga el nombre del video"></div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-icon right"><label for="email-address">Frame:</label><input type="text" class="form-control required" name="frame" id="email-address" placeholder="Ingrese el codigo del video"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="phone-number">Permisos:</label>
                                                     <?php  while ($rows = $result1->fetch_assoc()){
                                                             echo "<h5><b>" .$rows['nombre']."</b></h5>";
                                                              
                                                              $sql4 = "SELECT * FROM subcat WHERE categoria='".$rows['id']."'";
                                                              $result3 = $conn->query($sql4); 
                                                              while ($row2 = $result3->fetch_assoc()){ 
                                                                echo "<input class='form-control' type='radio' name='subcat' value='".$row2['id']."'> ".$row2['nombre'].'<br>'; 
                                                                 $sql5 = "SELECT * FROM subsubcat WHERE subcat= '".$row2['id']."'";
                                                                  $result5 = $conn->query($sql5); 
                                                                  while ($row3 = $result5->fetch_assoc()){
                                                                    if ($row3['nombre'] == "") {
                                                                         
                                                                      }else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<input class='form-control' type='radio' name='subsubcat' value='".$row3['id']."'> ".$row3['nombre'].'<br>';
                                                                  }
                                                                 
                                                                 
                                                            }
                                                           
                                                    } ?>
                                                    
                                        </div>
                                        <hr/>
                                        

                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-icon right"><label for="email-address">Descripción:</label><input type="text" class="form-control required" name="desc" id="email-address" placeholder="Ingrese Descripción"></div>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    
                                    <div class="form-actions text-right pal">

                                        <button type="submit" class="btn btn-success">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <!--END CONTENT--><!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright"><?php echo date('Y') ?> © &mu;Derechos Reservados - <a href="http://gente21.com" target="_blank">Gente21</a></div>
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