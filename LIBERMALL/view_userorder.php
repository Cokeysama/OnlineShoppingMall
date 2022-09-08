<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php
  include("connectDB.php");
  $username = $_GET["ID1"];
  $ordernumber = $_GET["ID2"];
  $conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT SKU, Amount, Price, State FROM $username"."_Order WHERE Ordernumber='$ordernumber'";
	$result = $conDB -> query($sql);
?>
</head>
<body>
  <h1>LIBERMALL</h1>
  <div class="container_main">
    <h2> 订单管理 </h2>
     <div align="center">
        <a href="view_order.php" class="no_underline"><input type="submit" name="home" class="button4" value="返回"></a>
        <a href="delete_order.php? ID=<?php echo $ordernumber;?>" class='no_underline'><input type='submit' value="删除此订单" class="button4"></a>
      <div>
    <table class="AdminTable">
    <thead>
      <tr>
        <th>商品编号 </th>
        <th>数量</th>
        <th>单价</th>
        <th>状态</th>
        <th>操作</th>
      </tr>
    </thead>
<?php
  while ($row = mysqli_fetch_array($result)) 
  {
    echo "<tr>
            <td>".$row['SKU']."</td>
            <td>".$row['Amount']."</td>
            <td>".$row['Price']."</td>
            <td>".$row['State']."</td>
            <td>
              <a href='edit_order.php? ID1=".$username."&ID2=".$ordernumber."&ID3=".$row['SKU']."' class='no_underline'>  <input type='submit' value='修改' class='button2'></a>
              <a href='delete_orderproduct.php? ID1=".$username."&ID2=".$ordernumber."&ID3=".$row['SKU']."' class='no_underline'><input type='submit' value='删除' class='button2'> </a>
            </td>
          </tr>";

    }
    echo "</table>";
  ?>
  </div>
   <footer>
   ©LIUYUAN
  </footer>
</body>
</html>