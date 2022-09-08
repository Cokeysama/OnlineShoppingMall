<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LIBERMART</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	include 'connectDB.php';
	$conDB = mysqli_connect($Server,$User,$Password,$Database);
	$edit_ID = $_GET["ID"];
	if(isset($_POST["txtUsername"]))
	{
		$user_name = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$name = $_POST["txtFirstname"];
		$email = $_POST["txtEmail"];
		$age = $_POST["cmbAge"];
		$gender = $_POST["rbtGender"];
		$sql  = "UPDATE Account SET Username='$user_name',Password='$password',Name='$name',Email='$email',Age='$age',Gender='$gender' WHERE Username='$edit_ID'";
		mysqli_query($conDB,$sql);
	}
	else
	{
		$sql  = "SELECT Password, Name, Email, Age, Gender FROM Account WHERE Username='$edit_ID'";
	    $result = $conDB -> query($sql);
		if($row = mysqli_fetch_array($result)) 
		{
			$user_name = $edit_ID;
			$password = $row["Password"];
			$name = $row["Name"];
			$email = $row["Email"];
			$age = $row["Age"];
			$gender = $row["Gender"];

		}
	}
	mysqli_close($conDB);
?>
  <h1>LIBERMART</h1>
  <div class="container">
    <h2> 用户信息修改 </h2>
    <div class="imgcontainer">
	  <img src="images/avatar1.jpg" alt="Avatar" class="avatar">
	</div>

    <form action="" method="post">
	  <label>用户名:</label><br>
		<input type="text" name="txtUsername" value="<?php echo $user_name; ?>" class="text" required ><br>
	  <label>密码:</label><br>
		<input type="text" name="txtPassword" value="<?php echo $password; ?>" class="text" required><br>
	  <label>姓名:</label><br>
		<input type="text" name="txtFirstname" value="<?php echo $name; ?>" class="text" required><br>
	  <label>邮箱:</label><br>
		<input type="text" name="txtEmail" value="<?php echo $email; ?>" class="text" required><br>
	  <label>年龄:</label>
			<select name="cmbAge" class="combobox">
				<?php
				for($n=1;$n<=100;$n++) 
				{
					if ($n == $age) 
						echo "<option value='".$n."' selected>".$n."</option>";
					else 
						echo "<option value'".$n."'>".$n."</option>";
				}
				?>
			</select><br>
		<label>性别:</label><br>
			<?php
			if ($gender == "Female") {
				echo "<input type='radio' name='rbtGender' value='男' class='radio' required> 男";
				echo "<input type='radio' name='rbtGender' value='女' checked='checked' class='radio' required> 女";
			}
			else {
				echo "<input type='radio' name='rbtGender' value='男' checked='checked' class='radio' required> 男";
				echo "<input type='radio' name='rbtGender' value='女' class='radio' required> 女";
			}
			?><br>
		<input type="submit" name="sbtEdit" value="提交" class="button">
	</form>
	<a href="view_user.php" class="no_underline"><input type="submit" name="back" value="返回" class="button"></a>
</div>
	<footer>
    © LIUYUAN
  </footer>

</body>
</html>
