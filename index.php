<?php
session_start();
//si hay una sesión
if (isset($_SESSION['name'])){
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
			

			<!-- HEADER -->
			<?php include 'header.php'; ?>



			<section class="ds section_padding_10 about-content top10">
    			<div class="container">
    		
    				<!-- menu row begins -->
    				<div class="row">			
    					<div class="col-sm-3 nopaddingxs gray75 menuheight padding12 fuentes">
    						página principal
    					</div>

    					<div class="col-sm-9 nopaddingxs gray75">

    						<!-- eof main nav -->
							<div class="container" >
								<div class="row">
									<div class="col-md-auto buttonmenu menuheight fuentes">
										<a href="index.php" class="<?php 
											$page = $_SERVER['PHP_SELF'];
											$realpage = explode("/", $page);
											if (end($realpage) == 'index.php') { echo "currentsection"; } ?>"><b>INICIO</b></a>
									</div>
									<?php  while ($row1 = $result1->fetch_assoc()){ ?>
									<div class="col-md-auto buttonmenu menuheight fuentes">
										<a href="categoria.php?id=<?php echo $row1['id'] ?>" class="<?php if(intval($_SESSION['catId']) == intval($row1['id'])){ echo "currentsection"; } ?>">
											<b><?php echo $row1['nombre']; ?></b>
										</a>
									</div>
									<?php 
									}
									?>
								</div>
							</div>

						</div>


    				</div>
    			
    				<!-- menu row ends -->





    				<!-- MIDDLE CONTENT -->
	    			<!-- middle content row begins -->
	    			<div class="row">

	    				<div class="col-md-3 nopaddingxs">

	    					<div class=".about-content">
	    						<div class="mimenu mimenublack fuentes1" >

	    							<h4><span class="submenu-title"><b>BIENVENIDO</b></span><span class="fa arrow"></span></h4>
									<a> Por favor seleccione una categoría</a>

	    						</div>

	    					</div>
	    				</div>

	    				<!-- VIDEO BEGINS -->
	    				<div class="col-md-9 nopaddingxs">
	    					<div class='embed-container'>
	    						<iframe src="https://player.vimeo.com/video/158753818" 
	    							 frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen>	    								
	    						</iframe>
	    					</div>
	    				</div>
	    				<!-- VIDEO ENDS -->

	    			</div>
	    			<!-- middle content row ends -->





	    		</div>

    		</div>
    	</div>
    </section>

		




    <!-- MAIN CONTENT -->
	<section class="ds section_padding_25">
		<div class="container">
			<div class="row">

				<div class="col-md-3 nopaddingxs">
					<div class="widget widget_popular_entries">
						<ul class="media-list darklinks" style="padding:35px;">
							
							<li class="media">
								<div class="w-100 p-3 backnone">
									<p class="leftSubTitle">
										<a href="#">Cómo Retocar Piel</a>
									</p>
									<img class="img-responsive no-paddinggeneral" src="images/video_t1.jpg" alt="">												
								</div>
							</li>

							<li class="media">
								<div class="w-100 p-3 backnone">
									<p class="leftSubTitle">
										<a href="#">Cambia el fondo</a>
									</p>
									<img class="img-responsive no-paddinggeneral" src="images/video_t2.jpg" alt="">												
								</div>
							</li>

							<li class="media">
								<div class="w-100 p-3 backnone">
									<p class="leftSubTitle">
										<a href="#">Colorea la piel</a>
									</p>
									<img class="img-responsive no-paddinggeneral" src="images/video_t3.jpg" alt="">												
								</div>
							</li>
							
						</ul>
					</div>
				</div>

				<div class="col-md-9">
					<div class="entry-content">
					<h3>Mauricio Arouesty</h3>
						<p class="big-first-letter">
							Fotógrafo mexicano que ha trabajado para agencias de modelos y campañas publicitarias en la CDMX, Guadalajara, Monterrey, Los Ángeles, Miami y París.
							<br><br>Ha impartido workshops a más de 400 fotógrafos de todo el mundo.							
							<br><br>Su método para retocar fotos en 10 minutos fue creado gracias a la fuerte carga de trabajo que lo obligaba a entregar sus fotos de un día para otro.							 
							<br><br>Después de descubrir que algunos fotógrafos tardan más de 6 horas en editar una foto y sabedor de que el tiempo es el principal activo de un fotógrafo es que decide compartir sus conocimientos de edición a todo aquel que lo necesite.
						</p>
					</div>
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
<?php
}//si no hay sesión
else{
    //se redirecciona
    header ('location: sistema/index.html');
}
?>