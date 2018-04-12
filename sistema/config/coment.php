<?php
ob_start();
session_start();

require("../config/connect_db.php");
$idvid=$_GET['id'];
$subcat=$_GET['subcat'];
$nombrecoment = $_SESSION['name'];
$idusuariocoment = $_SESSION['id'];
$coment=$_POST['comment'];

$answerTo = 0;
if(isset($_GET['isAnswer']) && isset($_GET['answerTo'])){
  $answerTo = $_GET['answerTo'];
}

$sql = "INSERT INTO comentarios (nombre, comentario, idvideo, idusuario, idpadre) ";
$sql .= "VALUES ". "('".$nombrecoment. "', '". $coment . "', '". $idvid . "', '". $idusuariocoment ."', '". $answerTo ."')";

if ($conn->query($sql) === TRUE) {
  header ('location: ../../video.php?id='.$idvid.'&subcat='.$subcat);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); ?>