<?php

  require("../config/connect_db.php");

  	$id=$_GET['id'];



  $sql3 = "SELECT * FROM reserva WHERE id= '".$id."'";
  echo $sql3;
    $result = $conn->query($sql3);
    $row = $result->fetch_assoc();

    $sql2 = "UPDATE reserva SET estado='aprobado' WHERE id=".$id;
    
	if (TRUE && $conn->query($sql2) === TRUE) {
     header ('location: ../verreservacion.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  $conn->close();
  ?>