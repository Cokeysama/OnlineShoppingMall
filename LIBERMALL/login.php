<?php
    include 'connectDB.php';
	session_start();
	$username = $_POST ["txtUsername"];
	$password = $_POST ["txtPassword"];
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT Username, Password FROM Account";  //从数据库中读取用户名和密码
	$result = $conDB -> query($sql);
	while($row=$result->fetch_assoc())
	{
		if($row["Username"] == $username)             //判断账号是否相符
		{
			if($row["Password"] == $password)          //判断密码是否相符
			{
			    mysqli_close($conDB);
			    header("location: main.php");          //登录成功，进入主页面
				$_SESSION['Username'] = $username;
				exit;
			}
			else
			{
				mysqli_close($conDB);
			    $_SESSION['PasswordError'] = TRUE;     //密码错误
			    break;
			}
		}
	}
	mysqli_close($conDB);
	$_SESSION['UsernameError'] = TRUE;                 //账号不存在
	header("location: index.php");
?>
