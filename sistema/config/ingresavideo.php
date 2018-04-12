<?php
ob_start();
?>
<?php

  require("../config/connect_db.php");

  	$nombre=$_POST['nombre'];
    $frame=$_POST['frame'];
    $desc=$_POST['desc'];
    if (isset($_POST['subcat'])){
    $subcat=$_POST['subcat'];
    }else $subcat=null;
    if (isset($_POST['subsubcat'])){
    $subsubcat=$_POST['subsubcat'];
    }else $subsubcat=null;
  

	$sql = "INSERT INTO video (nombre, frame, subcategoria, subsub, descr) VALUES ". "('".$nombre. "', '". $frame . "', '". $subcat . "', '".$subsubcat."', '".$desc."')";
  echo $sql ;

 if ($conn->query($sql) === TRUE) {
     header ('location: ../vercat.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

  
	$conn->close(); ?>