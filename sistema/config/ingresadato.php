<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$firstname=$_POST['first-name'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $fecha=$_POST['pickup'];
    $cat="1"; 	
	$fecha = date('Y-m-d', strtotime($fecha));


	$sql = "INSERT INTO usuarios (usuario, contrasena, nombre, permisos, fecha_inicio, estado) VALUES ". "('".$firstname. "', '". $contrasena . "', '". $nombre . "', '". $cat . "', '". $fecha . "', '". '1'."')";
  echo $cat ;

 if ($conn->query($sql) === TRUE) {
     header ('location: ../home.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close(); ?>