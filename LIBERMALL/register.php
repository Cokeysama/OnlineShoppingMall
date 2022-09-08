<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> LIBERMALL </title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>LIBERMALL</h1>
<div class="container">
    <form action="reg.php" method="post">
		<h2>注册</h2>
		<div class="imgcontainer">
	        <img src="images/avatar1.jpg" alt="Avatar" class="avatar">
	    </div>
		<label> 用户名: </label>
		<input type="text" name="txtUsername" class="text"  required><br>
		<label> 密码: </label>
		<input type="password" name="txtPassword" class="text"  required><br>
		<label> 姓: </label>
		<input type="text" name="txtFirstname" class="text"  required><br>
		<label> 名: </label>
		<input type="text" name="txtLastname" class="text"  required><br>
		<label> 邮箱: </label>
		<input type="text" name="txtEmail" class="text"  required><br>
		<label> 年龄: </label><br>
		<select name="cmbAge" class="combobox" >
		<?php
		    for($n=1;$n<=100;$n++)
			    echo "<option value='".$n."'>".$n."</option>";
		?>
		</select>
		<br><br>
		<label> 性別: </label><br>
		<input type="radio" name="rbtGender" value="男" class="radio" required> 男
		<input type="radio" name="rbtGender" value="女" class="radio" required> 女
		<!-- hidden text for role -->
		<input type="hidden" name="txtRole" value="user"><br><br>
		<input type="submit" value="注册" id="btnReg" class="button">
		<p align="center">已有账号?<a href="index.php">登录</a></p>
	</form>
</div>
<footer>© LIUYUAN</footer>
</body>
</html>
