<?php
	 include 'connectDB.php';
	 $delete_ID = $_GET["ID"];
	 $conDB = mysqli_connect($Server,$User,$Password,$Database);
	 $sql  = "DELETE FROM `Order` WHERE Ordernumber  ='$delete_ID'";
	 mysqli_query($conDB,$sql);
	 mysqli_close($conDB);
	 header("location: view_order.php");
	
?>