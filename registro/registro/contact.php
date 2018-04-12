<?php
//error_reporting(E_ALL); ini_set('display_errors', '1');
ob_start();
session_start();
require("../../sistema/config/connect_db.php");
//metemos todo en una sesión y redireccionamos a las formas correspondientes
$_SESSION['todos'] = $_REQUEST;
echo $_SESSION['todos'];
//let's save all the user's info

$name = $_SESSION['todos']['name'];
$pass = $_SESSION['todos']['pass'];
$usuario = $_SESSION['todos']['usuario'];
$email = $_SESSION['todos']['email'];
$tel = $_SESSION['todos']['phone'];
$fecha = date('Y-m-d');
$fecha = date('Y-m-d', strtotime($fecha));

	$sql = "INSERT INTO usuarios ( usuario, contrasena, nombre, fecha_inicio, estado, permisos, email, tel) VALUES ". "('".$usuario. "', '". $pass . "', '". $name . "', '". $fecha . "', '2', '1', '". $email . "', '". $tel ."')";
  echo $sql ;

 if ($conn->query($sql) === TRUE) {
     header ('location: ../home.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close(); 
	if($_POST['optradio'] === 'oxxo'){
	  header('Location: ../contact_oxxo.php');
	} else if ($_POST['optradio'] === 'tarjeta') {
	  header('Location: contact_tarjeta.php');
	}

	?>