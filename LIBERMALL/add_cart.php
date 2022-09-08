<?php
    include 'connectDB.php';
    session_start();
    $SKU = $_GET["ID"];
    $user_name = $_SESSION['Username'];
    $conDB = mysqli_connect($Server,$User,$Password,$Database);
    $sql  = "SELECT SKU, Amount FROM $user_name"."_Cart";
    $result = $conDB -> query($sql);
    $exist = FALSE;
    while($row=$result->fetch_assoc()){
        if($row["SKU"] == $SKU){
            $exist = TRUE;
            $amount = $row["Amount"]+1;
            $sql  = "UPDATE $user_name"."_Cart SET Amount='$amount' WHERE SKU='$SKU'";
            mysqli_query($conDB,$sql);
        }
    }
    if($exist == FALSE){
        $sql = "INSERT INTO $user_name"."_Cart(SKU,Amount) VALUES('$SKU','1')";
        mysqli_query($conDB,$sql);
    }
    mysqli_close($conDB);
    header("location: shoppingcart.php");
?>
