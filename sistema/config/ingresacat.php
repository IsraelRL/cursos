<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$firstname=$_POST['nombre'];
    
	$sql = "INSERT INTO categorias (nombre) VALUES ". "('".$firstname. "')";
  echo $cat ;

 if ($conn->query($sql) === TRUE) {
     header ('location: ../home.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close(); ?>