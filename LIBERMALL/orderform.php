<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> LIBERMALL </title>
<link rel="stylesheet" href="css/orderform.css" />
</head>
<body>
<!-------------------------------------------------->
<?php
    include 'connectDB.php';
	session_start();
	$user_name = $_SESSION['Username'];
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
    $sql  = "SELECT Ordernumber, Date FROM `Order` WHERE Username='$user_name'";
    $result_1 = $conDB -> query($sql);
    while($row_1=$result_1->fetch_assoc())
    {
        $ordernumber = $row_1['Ordernumber'];
        $date = $row_1['Date'];
        echo '</tbody>
                  </table>
                  <table class="formTable" >
		            <thead>
			            <tr>
				            <th class="products">
                                <span class="Leftproducts">订单号：'.$ordernumber.'</span>
                                <span class="Leftproducts">'.$date.'</span>
				            </th>
				            <th>单 价</th>
				            <th>数 量</th>
				            <th>总 价</th>
				            <th>状 态</th>
			            </tr>
		            </thead>
                  <tbody>';
        $sql = "SELECT SKU, Amount, Price, State FROM $user_name"."_Order WHERE Ordernumber='$ordernumber'";
        $result_2 = $conDB -> query($sql);
        while($row_2=$result_2->fetch_assoc())
        {
            $SKU = $row_2['SKU'];
            $Amount = $row_2['Amount'];
            $price = $row_2['Price'];
            $state = $row_2['State'];
            $sql  = "SELECT Name, Image FROM Products WHERE SKU='$SKU'";
		    $result_3 = $conDB -> query($sql);
		    $row_3=$result_3->fetch_assoc();
		    $name = $row_3['Name'];;
            $image = $row_3['Image'];
            echo '<tr>
                <td  class="products">
                    <span class="productimg">
                        <img class="Img" src="images/'.$image.'" />
                    </span>
                    <span class="productname">
                        <h2 class="Name">'.$name.'</h2>
                    </span>
                </td>
                <td class="Price">'.$price.'</td>
                <td>
                    <p class="Amount">'.$Amount.'</p>
                </td>
                <td>
                    <p class="totalPrice">¥'.$price*$Amount.'</p>
                </td>
                <td>
                    <p class="state">'.$state.'</p>';
            if($state == "已发货")
                echo '<p class="received"><a href="receipt.php?SKU='.$SKU.'" class="cart">确认收货</a></p>';
            echo '</td></tr>';
            
        }
    }
    mysqli_close($conDB);
?>