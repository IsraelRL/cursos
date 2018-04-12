<?php
//die("TEST");
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();


if(!$_SESSION['todos']){
  die("Wrong gateway.");
}

$_SESSION['datosTarjeta'] = $_POST;


$line_items = array();
$line_items_text = '';
$count = 1;

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

$to1 = $_SESSION['todos']['email'];
  $subject1 = "Recibo de solicitud de producto";
  $txt1 = "Recibo de solicitud de producto por Tarjeta";
  $headers1 = "From: contacto@arouesty.com" . "\r\n" .
  "CC: ".$_SESSION['todos']['email'];

  

  $to2 = "fenixixis@hotmail.com";
  $subject2 = "Recibo de solicitud de producto";
  $txt2 = "Recibo de solicitud de producto por oxxo";
  $headers2 = "From: contacto@arouesty.com" . "\r\n" .
  "CC: fenixixis@hotmail.com";

//let's clear out the products so that the user can start over if needed
unset($_SESSION['products']);

//calcula
$total = 20;

$totalui = number_format(20);
//se agregan centavos a la cantidad (así lo quiere conekta)
$total = intval($total) * 100;

$reference = time();
$errors = array();

if ($_SESSION['datosTarjeta']['conektaTokenId']){

    //--------------------------------------PAGO POR TARJETA COMIENZA
    require_once("../lib/Conekta.php");
    \Conekta\Conekta::setApiKey("key_yzf6njS7nHPW7ynmqHbLzg");
    \Conekta\Conekta::setApiVersion("2.0.0");

    //primero agarramos el customer
    try {
        $customer = \Conekta\Customer::create(
            array(
              "name" => $_SESSION['todos']['name'],
              "email" => $_SESSION['todos']['email'],
              "phone" => $_SESSION['todos']['phone'],
              "payment_sources" => array(
                array(
                    "type" => "card",
                    "token_id" => $_SESSION['datosTarjeta']['conektaTokenId']
                )
              )//payment_sources
            )//customer
        );
    } catch (\Conekta\ProccessingError $error){
        array_push($errors, "ERROR 101:".$error->getMesage());
    } catch (\Conekta\ParameterValidationError $error){
        array_push($errors, "ERROR 102:".$error->getMessage());
    } catch (\Conekta\Handler $error){
        array_push($errors, "ERROR 103:".$error->getMessage());
    }

    //luego intentamos la orden

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
          ), //shipping_lines
          /**/
          "currency" => "MXN",
          "customer_info" => array(
            "customer_id" => $customer['id']
          ), //customer_info
          
          "shipping_contact" => array(
            "phone" => $customer['phone'],
            "receiver" => $customer['name'],
            "address" => array(
              "street1" => $_SESSION['todos']['direccion'],
              "city" => $_SESSION['todos']['city'],
              "state" => $_SESSION['todos']['city'],
              "country" => "MX",
              "postal_code" => $_SESSION['todos']['cp'],
              "residential" => true
            )//address
          ), //shipping_contact
          /**/
          "metadata" => array(
            "reference" => $reference, 
            "more_info" => "BRANDS 2 PAGE"
            ),
          "charges" => array(
              array(
                  "payment_method" => array(
                    "payment_source_id" => $customer['default_payment_source_id'],
                    "type" => "card"
                  )//payment_method
              ) //first charge
          ) //charges
        )//order
      );


    //vamos creando un array con errores
    } catch (\Conekta\ProccessingError $error){
        array_push($errors, "ERROR 201:".$error->getMesage());
    } catch (\Conekta\ParameterValidationError $error){
        array_push($errors, "ERROR 202:".$error->getMessage());
    } catch (\Conekta\Handler $error){
        array_push($errors, "ERROR 203:".$error->getMessage());
    }

} else {
    die("Didn't get the required info to continue :O");
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

        <title>&iexcl;Solo paga el env&iacute;o!, pago por tarjeta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">          
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='custom.css' rel='stylesheet' type='text/css'>

        <!-- para el datepicker -->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" style="background-color: #FFF">

                    <h1 style="margin-bottom: 20px;">Has adquirido los productos: <br><a href="#"><?php echo $line_items_text; ?></a></h1>

                    <p class="lead">
                        <?php

                          if (count($errors) > 0){
                              echo "<strong>NO SE HA PODIDO COMPLETAR EL PAGO</strong><br><small>Por favor revise los datos de su tarjeta, al parecer son incorrectos.</small>";
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

                              echo "<strong>¡Felicidades!</strong><br><small>El pago se ha completado, recibirás un email como recibo por $".$totalui." MXN</small><br> Gracias por comprar con BRANDS MÉXICO.";
                              echo "<br><br><br>";
                          }

                        ?>
                    </p>

                </div>
            </div>
        </div>

    </body>
</html>


    
