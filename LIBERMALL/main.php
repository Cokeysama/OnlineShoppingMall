<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" src="main.js"></script>
</head>
<body>
<div class="header">
	<div class="logo">
		<h1>LIBERMALL</h1>
	</div>
	<div class="auth">
		<ul>
		    <li><a href="orderform.php">我的订单</a></li>
			<li><a href="shoppingcart.php">购物车</a></li>
			<li><a href="logout.php">注销</a></li>
		</ul>
	</div>
</div>
	<!-------------------------------------------------->
<div class="content">
	<div class="banner">
		<img src="images/welcome.jpg" class="banner_img">
	</div>
	<div class="img_content">
		<ul>
		<?php
		    include 'connectDB.php';
			session_start();
			$user_name = $_SESSION['Username'];
			$conDB = mysqli_connect($Server,$User,$Password,$Database);
			$sql  = "SELECT SKU, Name, Price, Image FROM Products";
			$result = $conDB -> query($sql);
			mysqli_close($conDB);
			while($row = mysqli_fetch_array($result))
			echo '<li>
				    <img src="images/'.$row['Image'].'" class="img_li">
				    <div class="info">
					  <h3>'.$row['Name'].'</h3>
					  <div class="img_btn"> 
					    <div class="price">¥ '.$row['Price'].'</div>
					    <div class="btn">
					      <a href="add_cart.php?ID='.$row['SKU'].'" class="cart">
					        <img src="images/cart.svg">
					      </a>
					    </div>
					  </div>
				    </div>
				  </li>';
		?>
        </ul>		
	</div>
	<!-------------------------------------------------->
		<div class="page_nav">
			<ul>
				<li><a href="#">首页</a></li>
				<li><a href="#">上一页</a></li>

				<li><span class="first_page">1</span></li>

				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">...</a></li>
				<li><a href="#">98</a></li>
				<li><a href="#">99</a></li>

				<li><a href="#">下一页</a></li>
			</ul>
		</div>
		
	</div>
	<!-------------------------------------------------->
	<div class="footer">
		<p class="p2"><span>©LIIUYUAN</span></p>
	</div>
</body>
</html>

