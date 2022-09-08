<?php
  include 'connectDB.php';
  session_start();
  $user_name = $_SESSION['Username'];
  $conDB = mysqli_connect($Server,$User,$Password,$Database);
  $sql  = "SELECT SKU, Amount FROM $user_name"."_Cart";
  $result_1 = $conDB -> query($sql);
  $ordernumber = mt_rand(9999999,99999999);
  while($row_1=$result_1->fetch_assoc())
  {
      $SKU = $row_1['SKU'];
      $Amount = $row_1['Amount'];
      $sql  = "SELECT Price ,Inventory FROM Products WHERE SKU='$SKU'";
      $result_2 = $conDB -> query($sql);
      $row_2=$result_2->fetch_assoc();
      $price = $row_2['Price'];
      $inventory = $row_2['Inventory'];
      $date = date("Y-m-d");
      $inventory = $inventory - $Amount;
      $sql = "UPDATE Products SET Inventory='$inventory' WHERE SKU='$SKU'";
      mysqli_query($conDB,$sql);
      $sql = "INSERT INTO `Order`(Ordernumber,Username,Date) VALUES('$ordernumber','$user_name','$date')";
      mysqli_query($conDB,$sql);
      $sql = "INSERT INTO $user_name"."_Order(SKU,Amount,Price,State,Ordernumber) VALUES('$SKU','$Amount','$price','未发货','$ordernumber')"; 
      mysqli_query($conDB,$sql);
  }
  $sql = "truncate table  $user_name"."_Cart;"; 
  mysqli_query($conDB,$sql);
  echo '<script language="JavaScript">
	　　　    alert("下单成功");
	　　　    window.location = "orderform.php";
	　　　</script>';

?>
