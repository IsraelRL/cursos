<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$id=$_GET['idc'];
    $idvid=$_GET['id'];
    $subcat=$_GET['subcat'];
    $nombrecoment = $_SESSION['name'];
    $idusuariocoment = $_SESSION['id'];
    $coment=$_POST['comment'];


    $sql2 = "DELETE FROM comentarios WHERE id= ".$id;
	
    echo $sql2;
	if ($conn->query($sql2) === TRUE) {
      header ('location: ../../video.php?id='.$idvid.'&subcat='.$subcat);
  } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
  $conn->close();
  
  ?>