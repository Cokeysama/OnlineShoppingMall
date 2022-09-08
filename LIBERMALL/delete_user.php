<?php
	 include 'connectDB.php';
	 $delete_ID = $_GET["ID"];
	 $conDB = mysqli_connect($Server,$User,$Password,$Database);
	 $sql = "DROP TABLE $user_name"."_Order, $user_name"."_Cart";
	 mysqli_query($conDB,$sql);
	 $sql  = "DELETE FROM Account WHERE Username='$delete_ID'";
	 mysqli_query($conDB,$sql);
	 mysqli_close($conDB);
	 header("location: view_user.php");
?>
