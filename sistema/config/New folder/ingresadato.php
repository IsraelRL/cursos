<?php

  require("../config/connect_db.php");

  	$tiempoinicio=$_POST['pick-up'];
    $tiempofinal=$_POST['drop-off'];
    $tiempoinicio.=" ".$_POST['pick-up1'];
    $tiempofinal.=" ".$_POST['drop-off1'];
  	$lugarinicio=$_POST['pickup-location'];
  	$lugarfin=$_POST['dropoff-location'];
  	$auto=$_POST['selected-car'];

  	$Nombre=$_POST['first-name'];
  	$apellido=$_POST['last-name'];

  	$telefono=$_POST['phone-number'];
  	$edad=$_POST['age'];
  	$mail=$_POST['email-address'];
  	$dir=$_POST['address'];
  	$ciudad=$_POST['city'];
  	$cp=$_POST['zip-code'];
  	$date1 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $tiempoinicio)));
  	$date1 = date('Y-m-d H:i:s', strtotime(str_replace('at', ' ', $tiempoinicio)));
  	$date2 = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $tiempofinal)));
  	$date2 = date('Y-m-d H:i:s', strtotime(str_replace('at', ' ', $tiempofinal)));
	$tiempoinicio = date('Y-m-d H:i:s', strtotime($tiempoinicio));
	$tiempofinal = date('Y-m-d H:i:s', strtotime($tiempofinal));

  $sql3 = "SELECT * FROM auto WHERE nombre= '".$auto."'";
    $result = $conn->query($sql3);
    $row = $result->fetch_assoc();
    $car = $row['id'];
    $cant = $row['cantidad'] - 1;
    if ($cant<=-1) {
      
        echo '<script>alert("LO SENTIMOS, ESE MODELO DE VEHÍCULO NO ESTÁ DISPONIBLE EN ESTOS MOMENTOS")</script> ';
      
        echo "<script>location.href='../addreservacion.php'</script>";
      }else{
	$sql = "INSERT INTO reserva (tiempoinicio, tiempofinal, lugarinicio, lugarfin, auto, Nombre, telefono, edad, mail, dir, ciudad, cp, estado) VALUES ". "('".$date1. "', '". $date2 . "', '". $lugarinicio . "', '". $lugarfin . "', '". $auto . "', '". $Nombre . " " . $apellido . "', '". $telefono . "', '". $edad . "', '". $mail . "', '". $dir . "', '". $ciudad . "', '". $cp. "', '". "pendiente')";

  $sql2 = "UPDATE auto SET cantidad=".$cant." WHERE id=".$car;
  
	if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
     header ('location: ../verreservacion.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
      echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}
  
	$conn->close();
  ?>