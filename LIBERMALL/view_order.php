<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LIBERMALL</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/main_table.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>LIBERMALL</h1>
  <div class="container_main">
    <h2> 订单管理 </h2>
    <div align="center">
      <a href="main_admin.php" class="no_underline"><input type="submit" name="home" class="button4" value="返回"></a>
    </div>
    <table class="AdminTable">
      <thead>
        <tr>
          <th>订单号</th>
          <th>用户名</th>
          <th>日期</th>
          <th>明细</th>
        </tr>
      </thead>
<?php
  include("connectDB.php");
  $conDB = mysqli_connect($Server,$User,$Password,$Database);
	$sql  = "SELECT Ordernumber, Username, Date FROM `Order`";
	$result = $conDB -> query($sql);
  while ($row = mysqli_fetch_array($result)) 
  {
    echo "<tr>
            <td>".$row['Ordernumber']."</td>
            <td>".$row['Username']."</td>
            <td>".$row['Date']."</td>
            <td><a href='view_userorder.php? ID1=".$row['Username']."&ID2=".$row['Ordernumber']."' class='no_underline'>  <input type='submit' value='查看' class='button2'> </a></td>
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