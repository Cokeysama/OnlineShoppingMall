<?php
    $Server  = "localhost";

	$User = "root";

	$Password = "";

	$Database = "libermall_db";
	
	function insert($file,$Server,$User,$Password,$Database){
		$_sql = file_get_contents($file);
		$_arr = explode(';', $_sql);
		$_mysqli = mysqli_connect($Server,$User,$Password,$Database);
		$_mysqli->query("set names utf8;");
		foreach ($_arr as $_value) {
			$_mysqli->query($_value.';');
		}
		$_mysqli->close();
		$_mysqli = null;
	}		
?>

