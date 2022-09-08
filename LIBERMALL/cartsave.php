<?php
    include 'connectDB.php';
    session_start();
    $user_name = $_SESSION['Username'];
    $conDB = mysqli_connect($Server,$User,$Password,$Database);
    $sql  = "SELECT SKU, Amount FROM $user_name"."_Cart";
    $result = $conDB -> query($sql);
    for($i=0;$row=$result->fetch_assoc();$i++)
    {
        $SKU = $row["SKU"];
        $amount = $_GET["$i"];
        $sql  = "UPDATE $user_name"."_Cart SET Amount='$amount' WHERE SKU='$SKU'";
        mysqli_query($conDB,$sql);
    }
    mysqli_close($conDB);
?>
