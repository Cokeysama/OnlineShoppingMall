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
  <h2>订单修改</h2>
<?php
    include 'connectDB.php';
    $edit_user = $_GET["ID1"];
    $edit_orderNo = $_GET["ID2"];
    $edit_SKU = $_GET["ID3"];
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	if(isset($_POST["sbtEdit"]))
	{
		$amount = $_POST["txtAmount"];
		$price = $_POST["txtPrice"];
		$state = $_POST["cmbstate"];
		$sql  = "UPDATE $edit_user"."_Order SET Amount='$amount',Price='$price',State='$state' WHERE Ordernumber='$edit_orderNo' AND SKU='$edit_SKU'";
		mysqli_query($conDB,$sql);
	}
	else
	{
		$sql = "SELECT Amount, Price, State FROM $edit_user"."_Order WHERE Ordernumber='$edit_orderNo' AND SKU='$edit_SKU'";
	    $result = $conDB -> query($sql);
		if($row = mysqli_fetch_array($result)) 
		{
			$amount = $row["Amount"];
			$price = $row["Price"];
			$state = $row["State"];
		}
	}
    mysqli_close($conDB);
?>
  <form action="" method="post" enctype="multipart/form-data">
    <label>编号:</label>
	  <input type="text" disabled="disabled" value="<?php echo $edit_SKU; ?>" class="text2">&emsp;
    <label>单价:</label>
      <input type="text" name="txtPrice" value="<?php echo $price; ?>" class="text2" required><br>
	<label>数量:</label>
      <input type="text" name="txtAmount" value="<?php echo $amount; ?>" class="text2" required>&emsp;
    <label>状态:</label>
      <select name="cmbstate" class="combobox2" >
        <option value='未发货' <?php if($state == '未发货') echo 'selected="selected"';?>>未发货</option>";
        <option value='已发货' <?php if($state == '已发货') echo 'selected="selected"';?>>已发货</option>";
        <option value='已收货' <?php if($state == '已收货') echo 'selected="selected"';?>>已收货</option>";
	  </select>
    <input type="submit" name="sbtEdit" value="提交" class="button">
  </form>
  <a href="view_order.php" class="no_underline"><input type="submit" name="back" value="返回" class="button"></a>
  </div>
</div>
<footer>
    © LIUYUAN
</footer>
</body>
</html>