<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$id=$_GET['id'];

    $sql2 = "UPDATE usuarios SET estado='1' WHERE id=".$id;
    
	if (TRUE && $conn->query($sql2) === TRUE) {
     header ('location: ../home.php');
  } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }

  $conn->close();
  ?>