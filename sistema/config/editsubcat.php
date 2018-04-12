<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");
   $id=$_POST['id'];
      $firstname=$_POST['nombre'];

  
	$sql = "UPDATE subcat SET nombre='$firstname' WHERE  ID=$id;";

  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../vercat.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>