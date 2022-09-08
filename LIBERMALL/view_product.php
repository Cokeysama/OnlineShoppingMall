<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>LIBERMALL</h1>
  <div class="container_main">
    <h2> 商品信息管理 </h2>
    <div align="center">
      <a href="main_admin.php" class="no_underline"><input type="submit" name="home" class="button4" value="返回"></a>
      <a href="new_product.php" class='no_underline'><input type='submit' value="添加新商品" class="button4"></a>
    </div>
    <table class="AdminTable">
      <thead>
        <tr>
          <th>商品编码</th>
          <th>商品名</th>
          <th>单价</th>
          <th>图片</th>
          <th>库存</th>
          <th>操作</th>
        </tr>
      </thead>
<?php
  include("connectDB.php");
  $conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT SKU, Name, Price, Image, Inventory FROM Products";
	$result = $conDB -> query($sql);
  while ($row = mysqli_fetch_array($result)) 
  {
    echo "<tr>
            <td>".$row['SKU']."</td>
            <td>".$row['Name']."</td>
            <td>".$row['Price']."</td>
            <td><img src='images/".$row['Image']."' class='prodimage'></td>
            <td>".$row['Inventory']."</td>
            <td>
              <a href='edit_product.php? ID=".$row['SKU']."' class='no_underline'>  <input type='submit' value='修改' class='button2'> </a>
              <a href='delete_product.php? ID=".$row['SKU']."' class='no_underline'>  <input type='submit' value='删除' class='button2'> </a>
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
