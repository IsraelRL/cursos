<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");
   $id=$_POST['id'];
      $firstname=$_POST['first-name'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $fecha=$_POST['pickup'];
    $cat="";  
  $fecha = date('Y-m-d', strtotime($fecha));
  foreach($_POST['cat'] as $selected){
   $cat.= $selected.", ";
  }

  
	$sql = "UPDATE usuarios SET usuario='$firstname', contrasena='$contrasena', nombre='$nombre', fecha_inicio='$fecha', permisos='$cat' WHERE  ID=$id;";

  
	if ($conn->query($sql) === TRUE) {
     header ('location: ../home.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close();
  ?>