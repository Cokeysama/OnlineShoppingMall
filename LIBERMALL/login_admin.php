<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>LIBERMALL</h1>
<?php
    include 'connectDB.php';
    session_start();
    if(isset($_POST["btnSubmit"]))
    {
        $conDB = mysqli_connect($Server,$User,$Password,$Database);
	    $sql  = "SELECT AdminID, Password FROM Administrator";
	    $result = $conDB -> query($sql);
	    while($row=$result->fetch_assoc())
	    {
            if($row["AdminID"] == $_POST ["txtAdminID"])          //判断账号是否相符
            { 
                if($row["Password"] == $_POST ["txtPassword"])    //判断密码是否相符
		        {
			        mysqli_close($conDB);
			        header("location: main_admin.php");           //登录成功，进入主页面
			        exit;
		        }
                else
                {
			        $_SESSION['PasswordError'] = TRUE;            //密码错误
                    break;
                }                
            }
        }
        $_SESSION['AdminIDError'] = TRUE;                         //账号不存在
        mysqli_close($conDB);
    }
?>
<div class="container">
    <form action="#" method="post">
        <h2> 管理员 </h2>  
        <div class="imgcontainer">
            <img src="images/avatar2.jpg" alt="Avatar" class="avatar">
        </div>
        <label> 管理员账号: </label>
  	    <input type ="text" name="txtAdminID" class="text"  required>
        <label> 密码: </label>
        <input type="password" name="txtPassword" class="text"  required>
  <!-------------------------------------------------->
<?php
    if(@$_SESSION['PasswordError'] == TRUE){
        echo "<b>密码错误，请重新输入</b>";
        $_SESSION['PasswordError'] = FALSE;
    }
    else if(@$_SESSION['AdminIDError'] == TRUE){
        echo "<b>此管理员账号不存在</b>";
        $_SESSION['AdminIDError'] = FALSE;
    }
?>
  <!-------------------------------------------------->
        <input type="submit" name="btnSubmit" value="登录" class="button">
        <br><br><br>
        <p align="center"><a href = "index.php">我是用户</a></p>
  	</form>
</div>
<footer>©LIUYUAN</footer>
</body>
</html>