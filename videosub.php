<?php
//si hay una sesión
session_start();
//si hay una sesión
if (isset($_SESSION['name'])){
    //se muestra el contenido de la página web
    require("sistema/config/connect_db.php");
    $nombrecoment = $_SESSION['name'];
    $idusuariocoment = $_SESSION['id'];

	$id=$_GET['id'];
	$idsub = $_GET['idsub'];
    // output data of each row
    $sql = "SELECT * FROM categorias";
    $result1 = $conn->query($sql);
    $sql1 = "SELECT * FROM subsubcat WHERE id=".$idsub;
    $result = $conn->query($sql1);

    $sqlcom = "SELECT * FROM comentarios WHERE idvideo=". $id. " ORDER BY fecha DESC";
     $resultcom = $conn->query($sqlcom);
     $cont=0;
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

	


	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
            


			<!-- template sections -->

			<!-- HEADER -->
			<?php include 'header.php'; ?>

			<section class="ds section_padding_10 about-content">
				<div class="container">
					<div class="row">

					    <br>
						<div class="col-sm-12">

							<!-- eof main nav -->
							<article class="post format-small-image with_background">

							
								<div class="side-item content-padding">
                                    <div class="row">
                                    <nav>
										<div class="col-sm-1" style=" background-image: url('images/fondo.jpg'); height: 40px; width: 152px;">
										<a href="index.php"> <p style="vertical-align: middle; margin-top: 8px" align="center">INICIO</p></a>
										</div>
										<?php  while ($row1 = $result1->fetch_assoc()){ ?>
										<div class="col-sm-1" style=" background-image: url('images/fondo.jpg'); height: 40px; width: 141px;">
										<a href="categoria.php?id=<?php echo $row1['id'] ?>"> <p style="vertical-align: middle; margin-top: 8px" align="center"> <?php echo $row1['nombre'] ?></p></a>
										</div>
										<?php 
											}
										?>

										

							      </nav>
							      </div>
									<div class="row">
                                  
										<div class="col-md-4">

											<div class=".about-content">
												<div class="mimenu">
														<?php  while ($row = $result->fetch_assoc()){ ?>
						                           <h4><span class="submenu-title">
						                                <?php  
						                                 
						                                echo $row['nombre']; 
						                            ?></span><span class="fa arrow"></span></h4>
						                                
						                                    
						                                     <?php
						                                     $sql3 = "SELECT * FROM video WHERE subsub = ".$idsub; 
						                                    $result2 = $conn->query($sql3);
						                                     while ($rows = $result2->fetch_assoc()){ ?>
						                                    <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='videosub.php?id=".$rows['id']."&idsub=".$idsub."'>"; ?><span class="submenu-title"></span><img src="img/p.png" width="20"> <?php
						                                           echo $rows['nombre']; 
						                                            ?></a><br>

						                                    <?php }?>
						                                   
						                            <?php }?>
													</div>
												

												

											</div>
										</div>

										<div class="col-md-8">
											<div class="item-media entry-thumbnail">
											<?php
												$sql2 = "SELECT * FROM video WHERE id = ".$id;
					                            $result = $conn->query($sql2); 

					                            $r = $result->fetch_assoc();
					                            	if ($r['subsub']== $idsub) {
					                            	
												  		echo $r['frame']. "<br><br>";
												  
											     }
											?>
													
											</div>
										</div>

									</div>
								</div>

							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="ds section_padding_80 columns_padding_25">
				<div class="container">
					<div class="row">


						<div class="col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4">

							<article>
								

								<div class="entry-content">
									<p class="big-first-letter">
										<?php echo $r['descr']. "<br><br>"; ?>
									</p>
								
								</div>
							
							</article>

							

							<div class="comments-area" id="comments">
							<h3>Comentarios</h3>
								<ol class="comment-list">
								<?php  
								while ($rowcom = $resultcom->fetch_assoc()){
									
								$cont++;
								if ($rowcom['idusuario'] == $idusuariocoment && $rowcom['idvideo'] == $id){

								echo '<li class="comment even thread-even depth-1 parent" style="margin-left: 30px;">
										<article class="comment-body media">
											
											<div class="media-body ls">
												<span class="reply">
													<a class="theme_button color1" href="#">
														<i class="rt-icon2-arrow-back-outline"></i>
													</a>
												</span>
												<div class="comment-meta darklinks">
													<a class="author_url" rel="external nofollow" href="#">'. $rowcom['nombre'] .' </a>
													<br>
													<span class="comment-date">
														<time datetime="2015-11-08T15:05:23+00:00" class="entry-date">'. $rowcom['fecha'] .' </time>
													</span>
												</div>
												<p>'. $rowcom['comentario'] .' </p><br><br>
												<p align="right"><a href="sistema/config/borrarcomsub.php?id='.$id.'&idsub='.$idsub .'&idc='.$rowcom['id'] .'">Borrar</a></p>
											</div>
										</article>
										<!-- .comment-body -->
										<!-- .children -->
									</li>';
								}else{
									echo '<li class="comment even thread-even depth-1 parent" style="margin-right: 30px;">
										<article class="comment-body media">
											
											<div class="media-body ls">
												<span class="reply">
													<a class="theme_button color1" href="#">
														<i class="rt-icon2-arrow-back-outline"></i>
													</a>
												</span>
												<div class="comment-meta darklinks">
													<a class="author_url" rel="external nofollow" href="#">'. $rowcom['nombre'] .' </a>
													<br>
													<span class="comment-date">
														<time datetime="2015-11-08T15:05:23+00:00" class="entry-date">'. $rowcom['fecha'] .' </time>
													</span>
												</div>
												<p>'. $rowcom['comentario'] .' </p>
											</div>
										</article>
										<!-- .comment-body -->
										<!-- .children -->
									</li>';
								}
								
							}
							if ($cont == 0) {
								echo "no hay comentarios";
							}

								 ?>
									
									
									
									<!-- #comment-## -->

									
									<!-- #comment-## -->

									
								</ol>
								<!-- .comment-list -->
							</div>
							<!-- #comments -->

							<div class="comment-respond" id="respond">
							<?php echo "<form class='comment-form' id='commentform' method='post' action='sistema/config/comentsub.php?id=".$id."&idsub=".$idsub ."'>"; ?>

									<div class="row columns_padding_5">
										
										<div class="col-md-12"><h3>Escribir</h3>
											<p class="comment-form-chat">
												<label for="comment" class="sr-only">Comentarios</label>
												<!-- <i class="rt-icon2-pencil3"></i> -->
												<textarea aria-required="true" rows="8" cols="45" name="comment" id="comment" class="form-control with-icon" placeholder=""></textarea>

												<i class="rt-icon2-pen"></i>
											</p>
										</div>
									</div>
									<p class="form-submit">
										<button type="submit" id="submit" name="submit" class="theme_button wide_button color1">Enviar</button>
										<button type="reset" id="reset" class="theme_button inverse">Limpiar</button>
									</p>
								</form>
							</div>
							<!-- #respond -->

						</div>
						<!--eof .col-sm-8 (main content)-->


						<!-- sidebar -->
						<aside class="col-sm-5 col-md-4 col-lg-4 col-sm-pull-7 col-md-pull-8 col-lg-pull-8">



							<div class="with_background with_padding">

								<div class="widget widget_popular_entries">

									<h3 class="widget-title">Popular</h3>
									<ul class="media-list darklinks">
										<li class="media">
											<a class="media-left" href="blog-single-right.html">
												<img class="media-object" src="images/recent_post1.jpg" alt="">
											</a>
											<div class="media-body">
												<p>
													<a href="#">Como Retocar Piel</a>
												</p>
											</div>
										</li>

										<li class="media">
											<a class="media-left" href="blog-single-right.html">
												<img class="media-object" src="images/recent_post2.jpg" alt="">
											</a>
											<div class="media-body">
												<p>
													<a href="#">Cambia el fondo</a>
												</p>
											</div>
										</li>

										<li class="media">
											<a class="media-left" href="blog-single-right.html">
												<img class="media-object" src="images/recent_post3.jpg" alt="">
											</a>
											<div class="media-body">
												<p>
													<a href="#">Colorea la Piel</a>
												</p>
											</div>
										</li>

										
									</ul>
								</div>

							</div>

							
							<div class="with_background with_padding">
								<div class="widget widget_banner">

									<div class="vertical-item content-absolute ds">
										<div class="item-media">
											<img src="images/models_square/01.jpg" alt="">
										</div>
										<div class="item-content">
											<span class="main_bg_color">
												
											</span>
											<h2>
												Anunciate
												<br> Aquí
											</h2>
										</div>
										<div class="media-links">
											<a href="#" class="abs-link"></a>
										</div>
									</div>

								</div>
							</div>



						</aside>
						<!-- eof aside sidebar -->

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