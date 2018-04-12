<script type="text/javascript">
function mostrar( obj , x){
var container = document.getElementById("describe1") ;
if (obj[ obj.selectedIndex ].value == 1 ) {
container.innerHTML = ' <input type="text" class="form-control required" name="nombre" id="first-name" placeholder="Nombre de la categoria"> ';
} else if (obj[ obj.selectedIndex ].value == 2 ) {
container.innerHTML = ' <input type="text" class="form-control required" name="nombre" id="first-name" placeholder=""> ';
}else if (obj[ obj.selectedIndex ].value == 3 ) {
container.innerHTML = ' <input type="text" class="form-control required" name="nombre" id="first-name" placeholder="aaa"> ';
}

}


function pagoOnChange(sel) {
      if (sel.value=="transferencia"){
           divC = document.getElementById("nCuenta");
           divC.style.display = "";

           divT = document.getElementById("nTargeta");
           divT.style.display = "none";

      }else{

           divC = document.getElementById("nCuenta");
           divC.style.display="none";

           divT = document.getElementById("nTargeta");
           divT.style.display = "";
      }
}
</script>

<select name="tags" onchange="mostrar(this,1);" >
<option value="1">uno</option><!-- Si Selecciono uno-->
<option value="2">dos</option>
<option value="3">tres</option>
<option value="4">cuatro</option>
</select>

<form action="prueba2.php" method="post">
<div id="describe1"></div>
<input type="submit" name="a">
</form>


<div>
      <div>
           <SELECT NAME="pago" onChange="pagoOnChange(this)">
              <OPTION VALUE="transferencia">Transferéncia</OPTION>
              <OPTION VALUE="tarjeta">Pago con tarjeta</OPTION> 
           </SELECT>
      </div>
      <div id="nCuenta" style="display:none;">
           Nuestro numero de cuenta es: 000000000000000000000
      </div>
      <div id="nTargeta" style="display:;">
           <br>
           Numero*
           <br>
           <input type='text' name='nTarjeta'size='20' maxLength='60'>
           <br><br>
           Titular*
           <br>
           <input type='text' name='titularTarjeta'size='20' maxLength='60'>
           <br><br>
           Numero de seguridad*
           <input type='text' name='numeroSeguridad'size='3' maxLength='3'>
      </div>
</div>

 <!-- <?php // while ($row = $result1->fetch_assoc()){
                            ?>
                            <li><a href="#"><i class="fa fa-angle-right"></i><span class="submenu-title">
                                <?php  
                                 
                           //     echo $row['nombre'];
                           //     
                            ?></span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><?php// echo "<a href='addsub.php?id=".$row['id']."'>"; ?><i class="fa fa-angle-double-right"></i><span class="submenu-title"></span> Nueva Sub Categoría</a></li>
                                    <?php // $sql3 = "SELECT * FROM subcat WHERE categoria= '".$row['id']."'"; $result2 = $conn->query($sql3); while ($rows = $result2->fetch_assoc()){ ?>
                                    <li><?php //echo "<a href='editsub.php?id=".$rows['id']."'>"; ?><i class="fa fa-angle-double-right"></i><span class="submenu-title"></span> <?php
                                          // echo $rows['nombre'];  ?></a></li>
                                    <?php }?>
                                    </ul>
                            </li><?php }?>-->