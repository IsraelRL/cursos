<?php 

//si hay una sesión
session_start();

if(!isset($_SESSION['name']) || !isset($_SESSION['id'])){
	header('Location: ../index.php');
}

//print_r($_SESSION);

?><!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #1a1a1a;">
	<!--[if lt IE 9]>
        <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
    <![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>


	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<section class="ds section_padding_80 columns_padding_25">
				<div class="container">
					<div class="row">

						<div class="col-md-3">
							<img src="" id="avatar" alt="Avatar" style="border-radius: 50%; width: 100%; height: 100%;">
						</div>


						<div class="col-md-9">
							<article>
								<h1 style="text-align: left">INFO DEL USUARIO</h1>

								<div class="entry-content">
									<h4>
										Sube una foto que aparecerá en tu perfil, debe ser JPG.
									</h4>
								</div>					
							</article>                        

	                        <!-- PLUPLOAD BEGINS -->
	                        <div id="InsertImageDialog">
							    <div class="dialog-content">

							    	<div id="progress" style="color: #F6D015">
							    	</div>
							                        
							        <div id="container" style="margin-top: 30px;">
							                <button  id="btnUploadFile" onclick="return false;" class="bigbutton">
							                	Seleccionar foto
							                </button>  
							        </div>
							    </div>
							</div>
	                        <!-- PLUPLOAD ENDS IN MISERY ;( -->

	                        <hr style="width: 100%; height: 1px; background-color:#a0a0a0; margin-top: 35px;" />

	                        <form id="datosusuario">
	                        	<div id="is_saved" style="color: #F6D015">
							    </div>
	                        	<div class="form-group">
	                        		<label for="exampleInputEmail1">Nombre (o seudónimo)</label>
	                        		<input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $_SESSION['name']; ?>">
	                        		<small id="emailHelp" class="form-text text-muted">Este es el nombre que aparecerá en los post en donde participes.</small>
	                        	</div>
	                        	<button type="submit" class="theme_button wide_button inverse floatright" style="margin-top: 30px;">
	                        		Guardar
	                        	</button>
	                        </form>

	                        <hr style="width: 100%; height: 1px; background-color:#a0a0a0; margin-top: 35px;" />

	                        <a href="../index.php">[Volver al inicio]</a>

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
	<script src="../js/plupload.full.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			//let's check if the image for this user exists
			function reloadImg(){
				$.ajax({
				    url:'../uploads/t600/'+<?php echo $_SESSION['id']; ?>+'.jpg',
				    type:'HEAD',
				    error: function()
				    {
				        $("#avatar").attr("src",'../images/useranon.jpg');
				    },
				    success: function()
				    {
				        $('#avatar').hide();
				        $("#avatar").attr("src",'../uploads/t600/'+<?php echo $_SESSION['id']; ?>+'.jpg?uid='+Math.random());
				        $('#avatar').fadeIn(500);
				        
				    }
				});
				$('#progress').text('');
			}	

			var uploader = new plupload.Uploader({
			    browse_button: 'btnUploadFile', // you can pass in id...
			    url: "lib/upload.php",
			    runtimes: 'flash,html5,html4',
			    container: document.getElementById('container'), // ... or DOM Element itself
			    chunk_size: '128kb',
			    resize: { width: 600, height: 600, quality: 85 },
			    filters: {
			        max_file_size: '40mb',        
			        mime_types: [
			            { title: "Image files", extensions: "jpg" }
			        ]
			    },
			    // Flash settings
    			flash_swf_url: '../js/Moxie.swf',
    			multipart_params : {
			        userId : <?php echo $_SESSION['id']; ?>
			    },
			    init: {
			        PostInit: function () {
			        },

			        FilesAdded: function (up, files) {
			            // start uploading - we only accept one file
			            $('#progress').text("Espera un momento...");
			            uploader.start();
			        },

			        UploadProgress: function (up, file) {
			            $('#progress').text("Subiendo: " + file.percent + "% completo",3000);
			        },

			        Error: function (up, err) {
			            $('#progress').text("Error al subir imagen: " + err.code + ": " + err.message);
			        },


			        FileUploaded: function(up, file, response) {
			            uploader.removeFile(file);
			            var imageUrl = response.response;
			            if (imageUrl) {
			                console.log(">DONE");			                
			                reloadImg();
			            }                     
			        },
			        UploadComplete: function(up, files) {                        
			        }
			    }

			});

			//contact form
			$( "#datosusuario" ).submit(function( event ) {
				console.log('>>NOMBRE: '+$('#user_name').val());
				event.preventDefault();
				$.post( "../sistema/saveUser.php", {
						name: $('#user_name').val(),
						userId: <?php echo $_SESSION['id'] ?>,
						email: '<?php echo $_SESSION['email'] ?>'
					})
				  	.done(function( data ) {
				    	//alert( "Data Loaded: " + data );
				    	console.log("Saved!");

				    	$('#is_saved').html('!Se guardó tu nombre!<br><br>');
				});
				
			});

			//INIT
			reloadImg();
			uploader.init();

		});
	</script>

</body>


<!-- Mirrored from webdesign-finder.com/html/models/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jan 2018 07:59:16 GMT -->
</html>