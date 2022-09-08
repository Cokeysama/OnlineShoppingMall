<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIBERMART</title>
<link rel="stylesheet" href="css/ShoppingCart.css" />
<script src="js/jquery-3.4.1.js"></script>
</head>
<body>
<?php
    include 'connectDB.php';
	session_start();
	$username = $_SESSION['Username'];
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT SKU, Amount FROM $username"."_Cart";
	$result_1 = $conDB -> query($sql);
	for($n = 0;$row_1=$result_1->fetch_assoc();$n++)
	{
	    $SKU[$n] = $row_1['SKU'];
		$Amount[$n] = $row_1['Amount'];
		$sql  = "SELECT Name, Price, Image FROM Products WHERE SKU='$SKU[$n]'";
		$result_2 = $conDB -> query($sql);
		$row_2=$result_2->fetch_assoc();
		$name[$n] = $row_2['Name'];;
		$price[$n] = $row_2['Price'];
		$image[$n] = $row_2['Image'];

	}

	mysqli_close($conDB);
?>
<!-------------------------------------------------->
<div class="row ">
	<table class="ShopCartTable" >
		<thead>
			<tr>
				<th class="products">
					<span class="Leftproducts">商 品</span>
				</th>
				<th>单 价</th>
				<th>数 量</th>
				<th>小 计</th>
				<th>操 作</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for($i=0;$i<$n;$i++)
			{
				echo '<tr>
					    <td  class="products">
						  <span class="productimg">
						    <img class="Img" src="images/'.$image[$i].'" />
						  </span>
						  <span class="productname">
						    <h2 class="Name">'.$name[$i].'</h2>
						  </span>
						</td>
						<td class="Price">'.$price[$i].'</td>
						<td>
						  <i class="reduceBtn" aria-hidden="true">-</i>
						  <span class="Input"><input type="text" class="numInput" value="'.$Amount[$i].'" ></span>
						  <i class="addBtn" aria-hidden="true">+</i>
						</td>
						<td>
						  <p class="totalPrice">¥'.$price[$i]*$Amount[$i].'</p>
						</td>
						<td>
						  <p class="delete""><a href="delete_cart.php?ID='.$SKU[$i].'" class="cart">删除</a></p>
						</td>
					  </tr>';
			}
			?>
		</tbody>
	</table>
	<div class="row tablefooter">
		<span class="servicenum">合 计<span class="totalAmount"><?php echo($n); ?></span>商 品</span>
		<span class="totalclassPoin">金 额：<span class="totalMoney"></span></span>
		<span onclick="" class="SettlementBtn"><a href="order.php">结算</a></span>
	</div>
</div>
<!-------------------------------------------------->
<script type="text/javascript">
function alter(){
	var totalPrice = new Array();
	var totalAmount = 0;
	var totalMoney = 0;
	<?php
	    for($i=0;$i<$n;$i++){
		    echo "totalPrice[$i] = $(\".numInput\").eq($i).val()*$price[$i];
				  $(\".totalPrice\").eq($i).html('¥'+totalPrice[$i]);
				  totalMoney += totalPrice[$i];";
		}
    ?>
	$(".totalMoney").html('¥'+totalMoney);
	$.ajax({
        type: 'GET',
        url: "cartsave.php",
        data: {
			<?php
				for($i=0;$i<$n;$i++)
				echo "$i: $(\".numInput\").eq($i).val(),";
			?>}
        });	

}
$(function(){
	for(i=0;i<$(".numInput").length;i++){
		$(".reduceBtn").eq(i).click({i:i},function(n){
			var i = n.data.i;
			var amount = $(".numInput").eq(i).val()-1;
			if(amount > 0)
			    $(".numInput").eq(i).val(amount);
			alter();		
		});
		$(".addBtn").eq(i).click({i:i},function(n){
			var i = n.data.i;
			var amount = $(".numInput").eq(i).val();
			amount++;
			$(".numInput").eq(i).val(amount);
			alter();
		});		
	}
	$('input').bind('input propertychange', alter);
});
</script>
</div>
</body>
</html>