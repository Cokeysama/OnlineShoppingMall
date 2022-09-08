<?php
	include 'connectDB.php';

	$user_name = $_POST["txtUsername"];                   //用户名
	$password = $_POST["txtPassword"];                    //密码
	$name = $_POST["txtFirstname"].$_POST["txtLastname"]; //姓名
	$email = $_POST["txtEmail"];                          //邮箱
	$age = $_POST["cmbAge"];                              //年龄
	$gender = $_POST["rbtGender"];                        //性别

	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	mysqli_select_db($conDB,"internet_shopping_db");
	$sql = "CREATE TABLE $user_name"."_Cart(SKU varchar(10) PRIMARY KEY,Amount int(10),
			FOREIGN KEY(SKU) REFERENCES Products(SKU) ON DELETE CASCADE ON UPDATE CASCADE) 
			ENGINE=InnoDB DEFAULT CHARSET=utf8";  //创建购物车
	mysqli_query($conDB,$sql);
	$sql = "CREATE TABLE $user_name"."_Order(SKU varchar(10),Amount int(10),Price float,State varchar(5),Ordernumber int(10),
			FOREIGN KEY(SKU) REFERENCES Products(SKU) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY(Ordernumber) REFERENCES `Order`(Ordernumber) ON DELETE CASCADE ON UPDATE CASCADE)
			ENGINE=InnoDB DEFAULT CHARSET=utf8";  //创建订单
	mysqli_query($conDB,$sql);
	$sql = "INSERT INTO account(Username,Password,Name,Age,Email,Gender) VALUES('$user_name','$password','$name','$age','$email','$gender')";  //写入用户数据
	mysqli_query($conDB,$sql);
	mysqli_close($conDB);
	echo '<script language="JavaScript">
	　　　    alert("注册成功");
	　　　    window.location = "index.php";  
	　　　</script>';
?>
