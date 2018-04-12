<?php
session_start();
if(!$_SESSION['todos']){
  die("Wrong gateway.");
}
require("../../sistema/config/connect_db.php");


//--------------------------------------PAGO POR TARJETA COMIENZA
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

        <title>Arouesty Sistema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css" id="color-switcher-link">
        <link rel="stylesheet" href="../css/animations.css">
        <link rel="stylesheet" href="../css/fonts.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <!-- para el datepicker -->
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>

        <script type="text/javascript" >
          Conekta.setPublishableKey('key_IwTfsKsz2FrBPPxdnuntk9w');

          var conektaSuccessResponseHandler = function(token) {
            var $form = $("#card-form");
            /*
            console.log(">>EXITO!! datos:");
            console.log(token);
            return false;
            */
            //Inserta el token_id en la forma para que se envíe al servidor
            $form.append($("<input type='hidden' name='conektaTokenId' id='conektaTokenId'>").val(token.id));
            $form.get(0).submit(); //Hace submit
          };
          var conektaErrorResponseHandler = function(response) {
            var $form = $("#card-form");
            $form.find(".card-errors").text(response.message_to_purchaser);
            $form.find("button").prop("disabled", false);
          };

          //jQuery para que genere el token después de dar click en submit
          $(function () {
            $("#card-form").submit(function(event) {
              //event.preventDefault();
              var $form = $(this);
              // Previene hacer submit más de una vez
              $form.find("button").prop("disabled", true);
              Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
              return false;
            });
          });
        </script>

    </head>
    <body>
        <div id="canvas">
        <section class="ds section_padding_80 columns_padding_25">
        <div class="box_wrapper">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                    <h1 style="text-align: center">Pago</h1>

                                <div class="entry-content">
                                    <br>
                                    <h2>1. Ingresa Tarjeta Bancaria</h2>
                                    <h2>$499</h2>
                                    
                                    <br>
                                    <h3>Crea tu cuenta</h3>
                    <p class="lead">
                        Por favor llene la información de su tarjeta de crédito/débito
                    </p>

                    <form action="contact_tarjeta_validacion.php" method="POST" id="card-form" enctype="multipart/form-data">
                        <span class="card-errors" style="font-weight: bold; color: #F00;"></span>
                      
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre como aparece en su tarjeta</label>
                                        <input type="text" size="20" name='name' value="<?php echo $_SESSION['todos']['name']; ?>" class="form-control" data-conekta="card[name]">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de tarjeta de crédito</label>
                                        <input type="text" size="20" class="form-control" data-conekta="card[number]">
                                    </div>
                                </div>                            
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CVC <small>(tres últimos dígitos del reverso de la tarjeta)</small></label>
                                        <input type="text" size="4" class="form-control" maxlength="3" data-conekta="card[cvc]">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" class="col-md-3">
                                        <label>Mes expiración</label>
                                        <select class="form-control" data-conekta="card[exp_month]">
                                            <?php for ($i=1; $i <= 12; $i++) { 
                                                $mes = "".$i;
                                                if($i < 10){
                                                    $mes = "0".$i;
                                                }
                                                echo "<option value='".$mes."'>".$mes."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group" class="col-md-3">
                                        <label>Año expiración</label>
                                        <select class="form-control" data-conekta="card[exp_year]">
                                            <?php
                                                $thisyear = date("Y");
                                                for ($i=$thisyear; $i < ($thisyear + 25); $i++) { 
                                                    $ano_dos_digitos = $i - 2000;
                                                    echo "<option value='".$ano_dos_digitos."'>".$i."</option>";
                                                }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="form_message">Este es un sitio seguro, validado por tecnología SSL</label>
                                    <br>
                                    <img src="../lib/ssl.png" style="max-width: 100%; padding: 15px; text-align: center;">
                                    <br>
                                    <small>
                                        <ul>
                                            <li>En el momento de completar el pago, se hará el cargo a su tarjeta de crédito o débito y 
                                            su reservación quedará hecha</li>
                                            <li>Revise su carpeta de SPAM si no recibe una notificación por correo en unos minutos.</li>
                                        </ul>
                                    </small>
                                    <br>
                                    <?php
                                        $total = 1;
                                    ?>
                                    <br>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <span class="card-errors" style="font-weight: bold; color: #F00;"></span>
                                    <!--<button type="submit">Crear token</button>-->
                                    <input type="submit" class="btn btn-success btn-send" style="font-weight: bold;" value="Completar el pedido">
                                </div>
                            </div>

                    </form>
                    </div>

                </div>
            </div>
        </div>
        </section>

    </body>
</html>


    
