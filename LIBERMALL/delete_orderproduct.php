<?php
    include 'connectDB.php';
	$delete_user = $_GET["ID1"];
    $delete_orderNo = $_GET["ID2"];
    $delete_SKU = $_GET["ID3"];
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "DELETE FROM $delete_user"."_Order WHERE SKU='$delete_SKU' AND Ordernumber='$delete_orderNo'";
    mysqli_query($conDB,$sql);
    $sql  = "SELECT * FROM $delete_user"."_Order WHERE Ordernumber='$delete_orderNo'";
    $rows = mysqli_query($conDB,$sql);
    if (mysqli_num_rows($rows) < 1)
    {
        $sql  = "DELETE FROM `Order` WHERE Ordernumber  = '$delete_orderNo'";
        mysqli_query($conDB,$sql);
    }
	 mysqli_close($conDB);
	 header("location: view_order.php");
	
?>