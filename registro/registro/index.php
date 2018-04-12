<html>
    <head>
    <title>Alta Usuario - Arouesty</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Validar contraseña -->
        <script type="text/javascript">
          function passwordMatch() {
            var password, password2;

            password = document.getElementById('pass');
            password2 = document.getElementById('pass2');

            password.onchange = password2.onkeyup = passwordMatch;

          
                if(password.value !== password2.value)
                    password2.setCustomValidity('Las contraseñas no coinciden.');
                else
                    password2.setCustomValidity('');
            }
        </script>
</head>
    
<body>
    <div class="container">
                    <!-- FORMA -->     
      <form method="post" action="contact.php">

          <div class="controls" style="margin-top: 15px;">

              <strong>LLENE LOS CAMPOS:</strong>
              <br><br>
              <h4>Datos Personales</h4>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_name">Nombre Completo *</label>
                          <input id="form_name" type="text" name="name" class="form-control" placeholder="Nombre *" required="required" data-error="El nombre es requerido">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_email">Email *</label>
                          <input id="form_email" type="email" name="email" class="form-control" placeholder="Email *" required="required" data-error="Se requiere un email válido">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      
                      <div class="form-group">
                          <label for="form_email">Usuario *</label>
                          <input id="form_email" type="text" name="usuario" class="form-control" placeholder="Usuario *" required="required" data-error="Se requiere un email válido">
                          <div class="help-block with-errors"></div>
                      </div>
                   </div>
                      
              </div>
              <div class="row">
                  <div class="col-md-6">
                      
                      <div class="form-group">
                          <label for="form_email">Contraseña *</label>
                          <input id="pass" type="password" name="pass" class="form-control" required="required" data-error="Se requiere un email válido">
                          <div class="help-block with-errors"></div>
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label for="form_phone">Repetir Contraseña *</label>
                          <input id="pass2" type="password" name="pass2" class="form-control" required="required" data-error="Se requiere un número de teléfono válido">
                          <div class="help-block with-errors"></div>
                      </div>
                  </div>
              </div>

              <!-- METODO DE PAGO -->
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                      <h4>Forma de Pago</h4>
                          <div class="radio">
                            <label><input type="radio" name="optradio" value="tarjeta" checked>Pago con tarjeta de crédito o débito (todas las tarjetas)</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="optradio" value="oxxo">Pago en efectivo en OXXO</label>
                          </div>                                        
                      </div>
                  </div>
              </div>

              
                              
                      </div>
                  </div>
                  
              </div>

              <div class="row">
                  <!--
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="form_message">¿Tiene algún comentario, duda o pregunta?</label>
                          <textarea id="form_message" name="message" class="form-control" placeholder="Gracias por sus comentarios" rows="4"></textarea>
                      </div>
                  </div>
                  -->
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send" style="font-weight: bold;" value="COMPLETAR PEDIDO" onClick="passwordMatch()">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <p class="text-muted"><strong>*</strong> Estos campos son requeridos.
                          <br><br>
                      Servicio proporcionado por <strong>Gente21 Digital Holdings</strong></p>
                  </div>
              </div>
          </div>

      </form>

     </div>

   </body>
</html>
