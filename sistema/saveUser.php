<?php
session_start();
//si hay una sesión
if (isset($_SESSION['name']) && isset($_POST['userId']) && isset($_POST['email'])){
    //se muestra el contenido de la página web
    require("config/connect_db.php");

    $sql = "UPDATE usuarios SET nombre = '".$_POST['name']."' WHERE id = ".$_POST['userId']." AND usuario = '".$_POST['email']."'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['name'] = $_POST['name'];
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }

}

?>