<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />



<title>Gente21 | Gracias</title>

<link href="styles.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css" id="color-switcher-link">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>






<?php





if (strlen($_POST['profesion']) > 3){


	$message = "Datos del cliente: ".$_POST['']."\r\n";

	$message .= "Profesión: ".$_POST['profesion']."\r\n";

	$message .= "Nivel de Fotografía: ".$_POST['radio1']."\r\n";

	$message .= "Que equipo utiliza: ".$_POST['radio2']."\r\n";

	$message .= "Vive de la fotografía: ".$_POST['radio3']."\r\n";

	$message .= "Si pudiera vivir de la fotografía viviría de ella: ".$_POST['radio4']."\r\n";

	$message .= "Promedio de ingreso mensual: ".$_POST['radio5']."\r\n";

	$message .= "País: ".$_POST['pais']."\r\n";

	$message .= "Ciudad: ".$_POST['ciudad']."\r\n";

	$message .= "Habilidades que le gustaría aprender: ".$_POST['radio5']."\r\n";







	mail('rzazu.photography@gmail.com','Encuesta Arouesty', $message, "From: \"Encuesta Arouesty\" <rzazu.photography@gmail.com> \r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable\r\nContent-Disposition: inline\r\nReply-To:rzazu.photography@gmail.com\r\nCc:eduardo@gente21.com, mauricioarouesty@gmail.com ");

	

	mail($_POST['correo'], "Solicitud de Informacion WEB Gente21", "\r\nGracias por contactarnos. En breve nos comunicaremos\r\n\r\n".$message."\r\n\r\n\r\nWEB Gente21", "From: \"WEB Gente21\" <rzazu.photography@gmail.com> \r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable\r\nContent-Disposition: inline\r\n\r\n");

	





/*

		mail('ventas@gente21.com','Solicitud de Información WEB Gente21', $message, "From: \"Solicitud de Información WEB Gente21\" <ventas@gente21.com> \r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable\r\nContent-Disposition: inline\r\nReply-To: ventas@gente21.com\r\nBcc:hidrolalo@hotmail.com");

	

	mail($_POST['correo'], "Solicitud de Información WEB Gente21", "\r\nGracias por contactarnos. En breve nos comunicaremos\r\n\r\n".$message."\r\n\r\n\r\nWEB Gente21", "From: \"WEB Gente21\" <ventas@gente21.com> \r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable\r\nContent-Disposition: inline\r\n\r\n");

*/



}	







?>







</head>











<body>

<div id="canvas">
		<div id="box_wrapper">
            


			<!-- template sections -->

			<header class="page_header header_darkgrey columns_padding_0 table_section">
				<div class="container-fluid">
					
				</div>
			</header>

			

			<section class="ds section_padding_80 columns_padding_25">

<!-- COMIENZA DIV PRINCIPAL -->

<div style="width: 1000px; height:1100px; margin:0 auto 0 auto; margin-top:0px; position:relative"><!-- BUTS --><!-- politica --><!-- MENUo --><!-- GAlleria -->

<!-- footer -->

<div style="left: 350px; top:221px; width: 325px; position: absolute; color:#FFF; text-align:center; font-size:15px; height: 113px;"> <strong>Gracias, tus respuestas y comentarios nos ayudarán a mejorar la calidad en nuestros servicios. <br><br>En un momento se validaran tus datos y recibirás un correo para poder ingresar al sistema </strong><br><br>

  <br><br>

</div>


<div style="left: 442px; top:388px; width: 145px; position: absolute; color:#FFF; text-align:center; font-size:15px; height: 43px;"><a href="../sistema/index.html" style="width: 100%; text-align: center;"><button class="btn btn-success btn-send" style="font-weight: bold;"> Ingresar </button></a></div>

</div>



<!-- FOTOS-->

</div>



<!--CARTE -->

<!-- plus gros -->

<!-- Carros abajo -->

<!-- TERMINA DIV PRINCIPAL -->

</div>






</section>
</div>
</div>








</body>

</html>