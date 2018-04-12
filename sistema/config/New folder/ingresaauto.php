<?php

  require("../config/connect_db.php");


  	$Nombre=$_POST['nombre'];
  	$cantidad=$_POST['cantidad'];
 
 
 
	$sql = "INSERT INTO auto (nombre, cantidad) VALUES ". "('". $Nombre . "', ' " . $cantidad . "')";
  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../verauto.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>