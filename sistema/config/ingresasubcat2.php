<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$firstname=$_POST['nombre'];
    $cat= $_POST['subcat'];
	$sql = "INSERT INTO subsubcat (nombre, subcat) VALUES ". "('".$firstname. "', '". $cat. "')";
  echo $cat ;

 if ($conn->query($sql) === TRUE) {
     header ('location: ../vercat.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close(); ?>