<?php

  require("../config/connect_db.php");

  	$id=$_GET['id'];



  $sql3 = "SELECT * FROM reserva WHERE id= ".$id;
  
    $result = $conn->query($sql3);
    $row = $result->fetch_assoc();

    $sql2 = "UPDATE reserva SET estado='finalizado' WHERE id=".$id;

    $sql = "SELECT * FROM auto WHERE nombre = '".$row['auto']."'";
    $result1 = $conn->query($sql);
    $row1 = $result1->fetch_assoc();
    
    $car = $row1['id'];
    $cant = $row1['cantidad'] + 1;
    

  $sql = "UPDATE auto SET cantidad=".$cant." WHERE id=".$car;
  
	
  
	if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
     header ('location: ../verreservacion.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  ?>