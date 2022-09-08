<?php
	 include 'connectDB.php';
	 session_start();
	 $SKU = $_GET["ID"];
	 $user_name = $_SESSION['Username'];
	 $conDB = mysqli_connect($Server,$User,$Password,$Database);
	 $sql  = "DELETE FROM $user_name"."_Cart WHERE SKU='$SKU'";
	 mysqli_query($conDB,$sql);
	 mysqli_close($conDB);
	 header("location: shoppingcart.php");
	
?>

