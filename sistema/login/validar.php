<?php  session_start();?>
<?php 
	require("../config/connect_db.php");
	$username=$_POST['mail'];
	$pass=$_POST['pass'];
	$sql2 = "SELECT * FROM usuarios";
	$result = $conn->query($sql2);
	$total_num_rows = $result->num_rows;
    // output data of each row

	    while($row = $result->fetch_assoc()) {	
	        if($username==$row['usuario'] && $pass==$row['contrasena'] && $row['permisos']==""){
				
				 $valid=1;
				
			break;
			}else if($username==$row['usuario'] && $pass==$row['contrasena']&& $row['permisos']!=""){
				
				 
					$valid=0;
					break;
				
				}else $valid=-1;
			
				 }
	    
				 if ($row['estado']=='2') {
				 	$valid = 2;
				 }
	    if ($valid==1) {
	    	$_SESSION['name']=$row['nombre'];
	    	$_SESSION['categorias']=$row['permisos'];
	    	$_SESSION['email']=$row['usuario'];
	    	echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='../home.php'</script>";
		    }else if ($valid==0) {
		    	 $_SESSION['id']=$row['id'];
		    	 $_SESSION['name']=$row['nombre'];
		    	 $_SESSION['categorias']=$row['permisos'];
		    	 $_SESSION['email']=$row['usuario'];
				echo "<script>location.href='../../index.php'</script>";				
			}else if ($valid==2) {
		    	 echo '<script>alert("USUARIO NO AUTORIZADO, FAVOR DE CONTACTAR AL ADMINISTRADOR")</script> ';
			
				echo "<script>location.href='../index.html'</script>";				
			}else{
				echo '<script>alert("USUARIO O CONTRASEÑA INCORRECTOS")</script> ';
			
				echo "<script>location.href='../index.html'</script>";
			}

			
		
?>
