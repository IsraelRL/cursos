<?php
ob_start();
session_start();

  require("../config/connect_db.php");
  $idvid=$_GET['id'];
  $idsub=$_GET['idsub'];
  $nombrecoment = $_SESSION['name'];
  $idusuariocoment = $_SESSION['id'];
  $coment=$_POST['comment'];

  	
	$sql = "INSERT INTO comentarios (nombre, comentario, idvideo, idusuario) VALUES ". "('".$nombrecoment. "', '". $coment . "', '". $idvid . "', '". $idusuariocoment ."')";

 if ($conn->query($sql) === TRUE) {
     header ('location: ../../videosub.php?id='.$idvid.'&idsub='.$idsub);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}






	$conn->close(); ?>