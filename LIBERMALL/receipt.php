<?php
    include 'connectDB.php';
	session_start();
    $user_name = $_SESSION['Username'];
    $SKU = $_GET["ID"];
    $conDB = mysqli_connect($Server,$User,$Password,$Database);
    $sql  = "UPDATE $user_name"."_Order SET State='已收货' WHERE ID='$SKU'";
    mysqli_query($conDB,$sql);
    mysqli_close($conDB);
    header("location: orderform.php");

?>