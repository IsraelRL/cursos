<?php

  require("../config/connect_db.php");

    $id=$_GET['id'];
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

  
	$sql = "UPDATE reserva SET tiempoinicio='$date1', tiempofinal='$date2', lugarinicio='$lugarinicio', lugarfin='$lugarfin', Nombre='$Nombre', telefono='$telefono', edad='$edad', mail='$mail', dir='$dir', ciudad='$ciudad', cp='$cp' WHERE  id=$id;";

  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../verreservacion.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>