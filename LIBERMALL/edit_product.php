<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>LIBERMALL</h1>
  <div class="container">
  <h2>商品信息修改</h2>
<?php
    include 'connectDB.php';
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$edit_ID = $_GET["ID"];
	if(isset($_POST["sbtEdit"]))
	{
		$SKU = $_POST["txtSKU"];
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];
		$inventory = $_POST["txtInventory"];
		$sql  = "UPDATE Products SET SKU='$SKU',Name='$name',Price='$price',Inventory='$inventory' WHERE SKU='$edit_ID'";
		mysqli_query($conDB,$sql);
	}
	else
	{
		$sql  = "SELECT Name, Price, Image, Inventory FROM Products WHERE SKU ='$edit_ID'";
	    $result = $conDB -> query($sql);
		if($row = mysqli_fetch_array($result)) 
		{
			$SKU = $edit_ID;
			$name = $row["Name"];
			$price = $row["Price"];
			$image = $row["Image"];
			$inventory = $row["Inventory"];

		}
	}
	mysqli_close($conDB);
?>
  <form action="" method="post" enctype="multipart/form-data">
    <label>商品编码:</label><br>
      <input type="text" name="txtSKU" value="<?php echo $SKU; ?>" class="text" required><br>
    <label>商品名:</label><br>
      <input type="text" name="txtName" value="<?php echo $name; ?>" class="text" required><br>
    <label>商品单价:</label><br>
      <input type="text" name="txtPrice" value="<?php echo $price; ?>" class="text" required><br>
	<label>现有库存:</label><br>
      <input type="text" name="txtInventory" value="<?php echo $inventory; ?>" class="text" required><br>
    <input type="submit" name="sbtEdit" value="提交" class="button">
  </form>
  <a href="view_product.php" class="no_underline"><input type="submit" name="back" value="返回" class="button"></a>
  </div>
</div>
<footer>
    © LIUYUAN
</footer>
</body>
</html>
