<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>LIBERMALL</h1>
  <div class="container_main_view_user">
    <h2>用户信息管理</h2>
    <div align="center">
      <a href="main_admin.php" class="no_underline"><input type="submit" name="home" class="button4" value="返回"></a>
      <a href="register.php" class='no_underline'><input type='submit' value="添加新用户" class="button4"></a>
	</div>
	<table class="AdminTable">
            <thead>
  		      <tr>
  			    <th>用户名</th>
  			    <th>密码</th>
  			    <th>姓名</th>
  			    <th>邮箱</th>
  			    <th>年龄</th>
  			    <th>性别</th>
  			    <th>操作</th>
			  </tr>
            </thead>
<?php
  	include("connectDB.php");
  	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT Username, Name, Email, Age, Gender, Password FROM Account";
	$result = $conDB -> query($sql);
  	while ($row = mysqli_fetch_array($result)) {
  		echo "<tr>
  			    <td>".$row['Username']."</td>
  			    <td>".$row['Password']."</td>
  			    <td>".$row['Name']."</td>
  			    <td>".$row['Email']."</td>
  			    <td>".$row['Age']."</td>
  			    <td>".$row['Gender']."</td>
				<td>
				  <a href='edit_user.php? ID=".$row['Username']."' class='no_underline'> <input type='submit' value='修改' class='button2'> </a>
				  <a href='delete_user.php? ID=".$row['Username']."' class='no_underline'><input type='submit' value='删除' class='button2'> </a>
				</td>
  			  </tr>";
  		}
  		echo "</table>";
?>
   
  </div>
  <footer>
  ©LIUYUAN
  </footer>
</body> 
</html>
