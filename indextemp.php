<?php
session_start();
//si hay una sesión

    //se muestra el contenido de la página web
    require("sistema/config/connect_db.php");

    // output data of each row
    $sql = "SELECT * FROM categorias ORDER BY id ";
    $result1 = $conn->query($sql);
    
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from webdesign-finder.com/html/models/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2018 07:59:16 GMT -->
<head>
	<title>Arouesty Sistema</title>
	<meta charset="utf-8">
	<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css" id="color-switcher-link">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!--[if lt IE 9]>
        <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
    <![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>


	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
            


			<!-- template sections -->

			<header class="page_header header_darkgrey columns_padding_0 table_section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-sm-6 text-center">
							<a href="home.php">
								<img src="images/logo.png">
							</a>
						</div>
						<div class="col-md-6 text-center">
							
							<div class="widget widget_search">
			
		</div>
							<!-- eof main nav -->
							<span class="toggle_menu">
								<span></span>
							</span>
						</div>
						<div class="col-md-3 col-sm-6 header-contacts text-center hidden-xs">
						</div>
					</div>
				</div>
			</header>

			<section class="ds section_padding_10 about-content">
				<div class="container">
					<div class="row">

					    <br>
						<div class="col-sm-12">

							<!-- eof main nav -->
							<article class="post format-small-image with_background">

							
								<div class="side-item content-padding">
                                    

										<div class="col-md-4">
											<div class="item-media entry-thumbnail">
													<h3>Cursos de Fotografía</h3>
													<p align="center"><img src="images/2.jpg" width="100%"></p>
											</div>
										</div>
										<div class="col-md-4">
											<div class="item-media entry-thumbnail">
											<h3>Curso de Retoque Digital</h3>
												<p align="center"><img src="images/1.jpg" width="100%"></p>
													
											</div>
										</div>
										<div class="col-md-4">
											<div class="item-media entry-thumbnail">
												<h3>Otros Cursos</h3>
													<p align="center"><img src="images/3.jpg" width="100%"></p>
											</div>
										</div>

									</div>
								</div>

							</article>
						</div>
					</div>
				</div>
			</section>

			

			


			<section class="ds ms section_padding_30 page_social">
				<div class="container">
					<div class="row topmargin_20 bottommargin_10">
						<div class="col-sm-12 text-center">
							<div class="page_social_icons">
								<a class="social-icon color-bg-icon soc-facebook" href="#" title="Facebook"></a>
								<a class="social-icon color-bg-icon soc-twitter" href="#" title="Twitter"></a>
								
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ls page_copyright section_padding_20">
				<div class="container">
					<div class="row topmargin_5 bottommargin_5">
						<div class="col-sm-12 text-center">
						<a href="pdf/Terminos-y-Condiciones.pdf" target="_blank"><font color="#000"><br>Términos y Condiciones</a></font> | <a href="pdf/FAQ.pdf" target="_blank"><font color="#000">FAQ</a></font> | <a href="arouestyinicio/colaboradores.php" target="_blank"><font color="#000">Colaboradores </a></font>
							<font color="#000"><p class="darklinks">&copy; Arouesty 2017 | Derechos Reservados</p></font>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->

	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

</body>


<!-- Mirrored from webdesign-finder.com/html/models/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2018 07:59:16 GMT -->
</html>
