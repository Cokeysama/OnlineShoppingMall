<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>LIBERMALL</h1>
<?php
	include 'connectDB.php';
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	if(isset($_POST["sbtNew"]))
	{
		$SKU = $_POST["txtSKU"];
		$name = $_POST["txtName"];
		$price = $_POST["txtPrice"];
		$inventory = $_POST["txtInventory"];
		$file = $_FILES["image"];
        $image = $file['name'];
		$target = "images/".basename($image);
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		$sql = "INSERT INTO Products(SKU,Name,Price,Image,Inventory) VALUES('$SKU','$name','$price','$image','$inventory')";
		mysqli_query($conDB,$sql);
		header("Location: view_product.php");
	}
	mysqli_close($conDB);
    
?>
	<div class="container">
		<h2>添加商品</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<label>商品编码:</label><br>
				<input type="text" name="txtSKU" class="text" required><br>
			<label>商品名:</label><br>
				<input type="text" name="txtName" class="text" required><br>
			<label>商品单价:</label><br>
				<input type="text" name="txtPrice" class="text" required><br>
			<label>现有库存:</label><br>
				<input type="text" name="txtInventory" class="text" required><br><br>
				<input type="hidden" name="size" value="1000000" >
				<label class="text" >
					上传图片
				<input type="file" name="image">
				</label><br><br>
			<input type="submit" name="sbtNew" value="提交" class="button">
		</form>
			<a href="view_product.php" class="no_underline"><input type="submit" name="back" value="返回" class="button"></a>
	</div>
	<footer>
	©LIUYUAN
	</footer>
</body>
</html>
