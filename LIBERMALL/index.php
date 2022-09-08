<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php
    include 'connectDB.php';
    insert("database/initialize_db.sql",$Server,$User,$Password,$Database);
    session_start();
?>
</head>
<body>
<h1>LIBERMALL</h1>
<div class="container">
    <form action="login.php" method="post">
        <h2> 登录 </h2>  
        <div class="imgcontainer">
            <img src="images/avatar1.jpg" alt="Avatar" class="avatar">
        </div>
        <label> 用户名: </label>
  	    <input type ="text" name="txtUsername" class="text"  required>
        <label> 密码: </label>
        <input type="password" name="txtPassword" class="text"  required>
  <!-------------------------------------------------->
<?php
    if(@$_SESSION['PasswordError'] == TRUE){
        echo "<b>密码错误，请重新输入</b>";
        $_SESSION['PasswordError'] = FALSE;
    }
    else if(@$_SESSION['UsernameError'] == TRUE){
        echo "<b>用户名不存在</b>";
        $_SESSION['UsernameError'] = FALSE;
    }
?>
  <!-------------------------------------------------->
        <input type="submit" name="btnSubmit" value="登录" class="button">
        <br><br><br>
        <p align="center"><a href = "register.php">注册</a>&emsp;<a href = "login_admin.php">我是管理员</a></p>
  	</form>
</div>
<footer>©LIUYUAN</footer>
</body>
</html>
