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
	$subcat=$_GET['subcat'];
    // output data of each row
    $sql = "SELECT * FROM categorias";
    $result1 = $conn->query($sql);
    $sql1 = "SELECT * FROM subcat WHERE id=".$subcat;
    $result = $conn->query($sql1);

    //Tres personas y dos patitos murieron para sacar este query ;( RIP	
	$sqlcom = "SELECT e.nombre AS parent_name, e.id AS parent_id, e.comentario AS comment, e.fecha AS fecha, e.idvideo AS idvideo, e.idusuario AS idusuario, ";
	$sqlcom .= "r.comentario AS comment, r.id AS id, r.nombre AS child_name, r.nombre AS nombre, r.fecha AS fecha, r.idvideo AS idvideo, r.idusuario AS idusuario ";
	$sqlcom .= "FROM comentarios r ";
	$sqlcom .= "LEFT JOIN comentarios e ON e.id = r.idpadre ";
	$sqlcom .= "WHERE e.idvideo = 34 OR r.idvideo = ".$id." ";
	$sqlcom .= "ORDER BY COALESCE(parent_id, r.id), r.id";
	

    $resultcom = $conn->query($sqlcom);
    $cont=0;

    //check if user's avatar image exists
    function checkAvatar($idUsuario){
    	$userimg = 'uploads/t600/'.$idUsuario.'.jpg';
		if (!file_exists($userimg)) {
		    $userimg = 'images/useranon.jpg';
		}
		return $userimg;
    }
    
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


<!-- COMMON WITH SUBCAT BEGINS -->
			<section class="ds section_padding_10 about-content top10">
    			<div class="container">
    		
    				<!-- menu row begins -->
    				<div class="row">			
    					<div class="col-sm-3 nopaddingxs gray75 menuheight padding12 fuentes">
    						videos
    					</div>

    					<div class="col-sm-9 nopaddingxs gray75">

    						<!-- eof main nav -->
							<div class="container">
								<div class="row">
									<div class="col-md-auto buttonmenu menuheight fuentes">
										<a href="index.php"><b>INICIO</b></a>
									</div>
									<?php  while ($row1 = $result1->fetch_assoc()){ ?>
									<div class="col-md-auto buttonmenu menuheight fuentes">
										<a href="categoria.php?id=<?php echo $row1['id'] ?>" class="<?php if(intval($_SESSION['catId']) == intval($row1['id'])){ echo "currentsection"; } ?>">
											<b><?php echo $row1['nombre'] ?></b>
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



	    			<!-- upper content row begins -->
	    			<div class="row">

	    				<div class="col-md-3 nopaddingxs">

	    					<div class=".about-content">
	    						<div class="mimenu mimenublack fuentes1">

	    							<?php  while ($row = $result->fetch_assoc()){  ?>
	    							<h5 style="letter-spacing: .110em;">
	    								<b><?php  

	    								echo $row['nombre'];

	    								?></b></span><span class="fa arrow"></span></h5>

	    								<?php 

	    								$sql5 = "SELECT * FROM subsubcat WHERE subcat= '".$subcat."'";
	    								$result5 = $conn->query($sql5); 
	    								while ($row3 = $result5->fetch_assoc()){
	    									if ($row3['nombre'] == "") {

	    									}else echo "&nbsp;&nbsp;&nbsp;&nbsp; <a href='subsubcat.php?id=".$id."&idsub=".$row3['id']."'>".$row3['nombre'].'</a><br>';

	    								} ?>

	    								<?php
	    								$sql3 = "SELECT * FROM video WHERE subcategoria = ".$subcat; 
	    								$result2 = $conn->query($sql3);
	    								while ($rows = $result2->fetch_assoc()){ ?>
	    								<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='video.php?id=".$rows['id']."&subcat=".$subcat ."'>"; ?><span class="submenu-title"></span><img src="img/ico.png" width="10"> <?php
	    								echo $rows['nombre'];  ?></a><br>

	    								<?php } 

	    							} ?>
	    						</div>

	    					</div>
	    				</div>


<!-- COMMON WITH SUBCAT ENDS -->


										<!-- VIDEO BEGINS -->
										<div class="col-md-9 nopaddingxs bg-dark">
											<div class="item-media entry-thumbnail">
											<?php
												$sql2 = "SELECT * FROM video WHERE id = ".$id;
					                            $result = $conn->query($sql2); 

					                            $r = $result->fetch_assoc();
					                            	if ($r['subcategoria']== $subcat) {
					                            	
												  		echo $r['frame']. "<br><br>";
												  		$idv = $r['id'];
												  		
												  
											     }
											?>
													
											</div>
										</div>
										<!-- VIDEO ENDS -->

									</div>
								</div>

							</article>
						</div>
					</div>
				</div>
			</section>

			

			<section class="ds columns_padding_25">
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


						<div class="col-md-9" style="margin-top:-30px;">
							<article class="bottom30">
								<div class="entry-content fuentes1" style="letter-spacing: .110em; margin-bottom: 20px; padding-bottom: 0px;">
									<p>
										<?php echo $r['descr']. "<br><br>"; ?>
									</p>
								</div>
							</article>


							<!-- #comments -->
							<div class="container nopaddingxs" style="margin-top:30px !important;">
								<div class="row">
							    	<div class="col-md-2">
										<img src="<?php echo checkAvatar($_SESSION['id']); ?>" id="avatar" alt="Avatar" class="avatar">
							    	</div>
							    	<div class="col-md-10">
										<?php echo "<form class='comment-form' id='commentform' method='post' action='sistema/config/coment.php?id=".$idv."&subcat=".$subcat ."'>"; ?>
										<p class="comment-form-chat">
											<label for="comment" class="sr-only">Comentarios</label>
											<!-- <i class="rt-icon2-pencil3"></i> -->
											<textarea 
												aria-required="true" 
												rows="3" 
												cols="45" 
												name="comment" 
												id="comment" 
												class="form-control with-icon entry-content" 
												placeholder="Agregar un comentario..."></textarea>
											<i class="rt-icon2-pen"></i>
										</p>
										<p class="form-submit">
											<button type="submit" id="submit" name="submit" class="theme_button wide_button inverse floatright">Enviar</button>
											<!--
											<button type="reset" id="reset" class="theme_button inverse">Limpiar</button>
											-->
										</p>
										</form>
							    	</div>
							    </div>
							</div>
							<!-- #respond -->

							

							<div class="comments-area fuentes1" id="comments">
							<!--
							<h3>Comentarios</h3>
							-->
								<ol class="comment-list">
								<?php
								//print_r($rowcom = $resultcom->fetch_assoc());
									while ($rowcom = $resultcom->fetch_assoc()){

										$cont++;
										if ($rowcom['idusuario'] == $idusuariocoment && $rowcom['idvideo'] == $id){

											$margin = 0;
											$answer = '';
											if(intval($rowcom['parent_id']) != 'NULL'){
												$margin = 30;
												$answer = 'display: none;';
											}

											echo '<li class="even thread-even depth-1 parent" style="margin-left: '.$margin.'px;">
												<article class="media">

													<div class="container" id="cont_'.$rowcom['id'].'">
														<div class="row">
															<div class="col-md-2">
																<img src="'.checkAvatar($rowcom['idusuario']).'" id="avatar" alt="Avatar" class="avatar">
															</div>
															<div class="col-md-10 comment-meta darklinks">
																<a class="author_url" rel="external nofollow" href="#">'. $rowcom['nombre'] .' </a> <time datetime="2015-11-08T15:05:23+00:00" class="entry-date">'. date("d/m/Y", strtotime($rowcom['fecha'])) .' </time>
																<p class="commentcolor">'. $rowcom['comment'] .' </p>
																<p style="float:right; cursor: pointer; '.$answer.'" onclick="$.newComment('.$rowcom['id'].')"><small>[RESPONDER]</small></p>
																
																<!-- FORMA DE ENVÍO COMIENZA -->
																<form class="comment-form" method="post" action="sistema/config/coment.php?id='.$idv.'&subcat='.$subcat.'&isAnswer=1&answerTo='.$rowcom['id'].'" style="display:none;" id="box_'.$rowcom['id'].'">																
																	<p class="comment-form-chat">
																		<label for="comment" class="sr-only">Comentarios</label>
																		<!-- <i class="rt-icon2-pencil3"></i> -->
																		<textarea 
																			aria-required="true" 
																			rows="3" 
																			cols="45" 
																			name="comment" 
																			id="comment" 
																			class="form-control with-icon entry-content" 
																			placeholder="Agregar un comentario...">@'.$rowcom['nombre'].' </textarea>
																	</p>
																	<p class="form-submit">
																		<button type="submit" id="submit" name="submit" class="theme_button wide_button inverse floatright">Enviar</button>
																	</p>
																</form>
																<!-- FORMA DE ENVÍO TERMINA -->

															</div>
														</div>
													</div> 
													
												</article>
												<!-- .comment-body -->
												<!-- .children -->
											</li>';
										} else {

											$margin = 0;
											$answer = '';
											if(is_numeric($rowcom['parent_id'])){
												$margin = 30;
												$answer = 'display: none;';
											}

											echo '<li class="even thread-even depth-1 parent" style="margin-left: '.$margin.'px;">
												<article class="media">

													<div class="container" id="cont_'.$rowcom['id'].'">
														<div class="row">
															<div class="col-md-2">
																<img src="'.checkAvatar($rowcom['idusuario']).'" id="avatar" alt="Avatar" class="avatar">
															</div>
															<div class="col-md-10 comment-meta darklinks">
																<a class="author_url" rel="external nofollow" href="#">'. $rowcom['nombre'] .' </a> <time datetime="2015-11-08T15:05:23+00:00" class="entry-date">'. date("d/m/Y", strtotime($rowcom['fecha'])) .' </time>
																<p class="commentcolor">'. $rowcom['comment'] .' </p>
																<p style="float:right; cursor: pointer; '.$answer.'" onclick="$.newComment('.$rowcom['id'].')"><small>[RESPONDER]</small></p>
																
																<!-- FORMA DE ENVÍO COMIENZA -->
																<form class="comment-form" method="post" action="sistema/config/coment.php?id='.$idv.'&subcat='.$subcat.'&isAnswer=1&answerTo='.$rowcom['id'].'" style="display:none;" id="box_'.$rowcom['id'].'">																
																	<p class="comment-form-chat">
																		<label for="comment" class="sr-only">Comentarios</label>
																		<!-- <i class="rt-icon2-pencil3"></i> -->
																		<textarea 
																			aria-required="true" 
																			rows="3" 
																			cols="45" 
																			name="comment" 
																			id="comment" 
																			class="form-control with-icon entry-content" 
																			placeholder="Agregar un comentario...">@'.$rowcom['nombre'].' </textarea>
																	</p>
																	<p class="form-submit">
																		<button type="submit" id="submit" name="submit" class="theme_button wide_button inverse floatright">Enviar</button>
																	</p>
																</form>
																<!-- FORMA DE ENVÍO TERMINA -->

															</div>
														</div>
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
									
								</ol>
								<!-- .comment-list -->
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
	<script type="text/javascript">

		//jQuery style functions
		jQuery.newComment = function newComment(boxId) {
			console.log('>>ES: '+boxId);
			$( "#box_"+boxId ).slideDown( "fast", function() {
				
			});
		}
	</script>

</body>


</html>
<?php
}//si no hay sesión
else{
    //se redirecciona
    header ('location: sistema/index.html');    
}
?>