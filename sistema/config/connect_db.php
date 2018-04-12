<?php  
		/*$active_record = TRUE;
$db["default"]["hostname"] = "localhost";
$db["default"]["username"] = "gentecom_cityadm";
$db["default"]["password"] = "cityadm";
$db["default"]["database"] ="gentecom_cityadmin";
$db["default"]["dbdriver"] = "mysqli";
		$db["default"]["dbprefix"] = "";
		$db["default"]["pconnect"] = TRUE;
		$db["default"]["db_debug"] = FALSE;
		$db["default"]["cache_on"] = FALSE;
		$db["default"]["cachedir"] = "";
		$db["default"]["char_set"] = "utf8";
		$db["default"]["dbcollat"] = "utf8_general_ci";
		$db["default"]["swap_pre"] = "";
		$db["default"]["autoinit"] = TRUE;
		$db["default"]["stricton"] = FALSE;
		*/
		$servername = "localhost";
		$user = "gentecom_arouest";
		$password = "arouesty";
		$dbname = "gentecom_arouesty2";
		// Create connection
		$conn = new mysqli($servername, $user, $password, $dbname);
		$conn->set_charset("utf8");
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	
?>