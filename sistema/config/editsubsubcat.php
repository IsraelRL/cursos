<?php
ob_start();


  require("connect_db.php");
      $id=$_POST['id'];
      $firstname=$_POST['nombre'];
      $cat = $_POST['cat'];
  
	$sql = "UPDATE subsubcat SET nombre='$firstname', subcat='$cat' WHERE  ID=$id;";
	
  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../vercat.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>