<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();


if($_SESSION['todos']){

	$line_items = array();
	$line_items_text = '';
	$count = 1;

	$to1 = $_SESSION['todos']['email'];
	$subject1 = "Recibo de solicitud de producto";
	$txt1 = "Recibo de solicitud de producto por oxxo";
	$headers1 = "From: contacto@arouesty.com" . "\r\n" .
	"CC: ".$_SESSION['todos']['email'];

	

	$to2 = "fenixixis@hotmail.com";
	$subject2 = "Recibo de solicitud de producto";
	$txt2 = "Recibo de solicitud de producto por oxxo";
	$headers2 = "From: contacto@arouesty.com" . "\r\n" .
	"CC: fenixixis@hotmail.com";

	//handle all products
	/*foreach ($_SESSION['products'] as $key => $value) {		
	    $item = array(
	    	"name" => $value['name']." (".$value['code'].")",
            "unit_price" => intval($value['selling_price']) * 100,
            "quantity" => intval($value['quantity']),
            "id" => $value['code']
	    );
	    $line_items_text .= $count.") ".$value['name']." ".$value['code']." - $".$value['selling_price']."c/u - ".$value['quantity']." piezas<br>";
	    $count ++;
	    $line_items[] = $item;	    
	}*/


	$_SESSION['datosTarjeta'] = $_POST;

	//calcula
	$total = 499;

	$totalui = number_format(499);
	//se agregan centavos a la cantidad (así lo quiere conekta)
	$total = intval($total) * 100;
	$expires = strtotime("+3 day");
	$reference_readable = '0';

	//die(">EXPIRA: ".$expires);

	$reference = $expires;
	$errors = array();
	$order;

	require_once("lib/Conekta.php");
	\Conekta\Conekta::setApiKey("key_yzf6njS7nHPW7ynmqHbLzg");
	\Conekta\Conekta::setApiVersion("2.0.0");



	try{
		$order = \Conekta\Order::create(
		array(
		 "line_items" => array(
		        array(
		          "name" => "Membresía Mensual",
		          "unit_price" => $total,
		          "quantity" => 1
		        )//first line_item
		      ), //line_items
		  "shipping_lines" => array(
		    array(
		      "amount" => 1,
		      "carrier" => "Gente21"
		    )
		  ), //shipping_lines - physical goods only
		  "currency" => "MXN",
		  "customer_info" => array(
		    "name" => $_SESSION['todos']['name'],
		    "email" => $_SESSION['todos']['email'],
		    "phone" => $_SESSION['todos']['phone']
		  ), //customer_info
		  "shipping_contact" => array(
		    "address" => array(
		      "street1" => "México",
		      "postal_code" => "20000",
		      "country" => "MX"
		    )//address
		  ), //shipping_contact - required only for physical goods
		  "charges" => array(
		      array(
		          "payment_method" => array(
		            "type" => "oxxo_cash",
		            "expires_at" => $expires
		          )//payment_method
		      ) //first charge
		  ) //charges
		)//order
		);
	} catch (\Conekta\ParameterValidationError $error){
		array_push($errors, "ERROR 202:".$error->getMessage());
	} catch (\Conekta\Handler $error){
		array_push($errors, "ERROR 203:".$error->getMessage());
	}

	//everything's good, let's send a few emails:
	if (count($errors) > 0){
          echo "<strong>NO SE HA PODIDO COMPLETAR EL PAGO</strong>";
          echo "<br><a href='contact_tarjeta.php'>Intentar de nuevo</a><br><br>";
          $errores = '';
          $datos = '';

          //errores
          for ($i=0; $i < count($errors); $i++) { 
            echo "<ul>";
            echo "<li>".$errors[$i]."</li>";
            echo "</ul>";
            $errores .= $errors[$i]."\r\n";
          }

          //info
          for ($i=0; $i < count($_SESSION['todos']); $i++) { 
            $datos .= $_SESSION['todos'][$i]."\r\n";
          }

          //enviar notificación de pago fallido a raul
          mail($to2,$subject2,"Pago Fallido",$headers2);
      } else {

      		$reference_readable = chunk_split($order->charges[0]->payment_method->reference, 4, ' ');

      		//datos de procesamiento:
      		$datos_oxxo = '';
      		$datos_oxxo .= "ID: ". $order->id."<br>";
      		$datos_oxxo .= "Payment Method:". $order->charges[0]->payment_method->service_name."<br>";
      		$datos_oxxo .= "Reference: ". $reference_readable."<br>";
      		$datos_oxxo .= "$". $order->amount/100 . $order->currency."<br>"; 
      		$datos_oxxo .= "<br><br>".$line_items_text;
          
          //enviar recibo al comprador y a Gente21
          try {
            
          	mail($to1,$subject1,$txt1,$headers1);
           
          } catch (Exception $e){
          	echo "ERROR 223: ".$e->getMessage();
          }

          //enviar recibo al proveedor
          try {
          		mail($to2,$subject2,$txt2,$headers2);
             
          } catch (Exception $e){
              echo "ERROR 231: ".$e->getMessage();
          }

          //echo "<strong>¡HAS ADQUIRIDO UNA PROMO!</strong><br><small>El pago se ha completado, recibirá un email como recibo $".$totalui." MXN</small><br> En unos segundos será redireccionado a la página de nuestro patrocinador";

      }


?>

<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91181849-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-91181849-1');
		</script>

		<link href="styles_oxxo.css" media="all" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" id="color-switcher-link">
		<link rel="stylesheet" href="css/animations.css">
		<link rel="stylesheet" href="css/fonts.css">
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<title>Arouesty Sistema</title>
	</head>
	<body>
	<div id="canvas">
		<div id="box_wrapper">
		<section class="ds section_padding_80 columns_padding_25">
		<div class="opps">
			<div class="opps-header">
				<div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
				<div class="opps-info">
					<div class="opps-brand"><img src="images/oxxopay_brand.png" alt="OXXOPay"></div>
					<div class="opps-ammount">
						<h3>Monto a pagar</h3>
						<h2>$ <?php echo $totalui; ?> <sup>MXN</sup></h2>
						<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
					</div>
				</div>
				<div class="opps-reference">
					<h3>Referencia</h3>
					<h1><?php echo $reference_readable; ?></h1>
				</div>
			</div>
			<div class="opps-instructions">
				<h3>Instrucciones</h3>
				<ol>
					<li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li>Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
					<li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li>Realiza el pago correspondiente con dinero en efectivo.</li>
					<li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<br><br>
				<p align="center"><a href="bienvenido.html" style="width: 100%; text-align: center;"><button class="btn btn-success btn-send" style="font-weight: bold;"> Siguiente </button></a></p><br><br><br><br><br>
			</div>
		</div>
		</section>
		</div>
		</div>	
	</body>
</html>

<?php


} else {
  die("Wrong gateway.");
}
//die("<br><br>>>PAGO POR OXXO");
?>