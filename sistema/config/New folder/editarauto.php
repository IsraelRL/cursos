<?php

  require("../config/connect_db.php");

    $id=$_POST['id'];
  	$nombre=$_POST['nombre'];
    $cantidad=$_POST['cantidad'];

  
	$sql = "UPDATE auto SET nombre='$nombre', cantidad='$cantidad' WHERE  ID=$id;";

  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../verauto.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>