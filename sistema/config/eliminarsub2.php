<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$id=$_GET['id'];



    $sql2 = "DELETE FROM subsubcat WHERE id= ".$id;
	
  
	if ($conn->query($sql2) === TRUE) {
     header ('location: ../vercat.php');
  } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
  $conn->close();
  ?>