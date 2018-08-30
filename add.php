<?php

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<p><a href="index.php">回首頁</a></p>
<h2 align="center">新增資料</h2>

<form action="add_save.php" method="post">
  <p>代碼：<input type="text" name="usercode"></p>
  <p>姓名：<input type="text" name="username"></p>
  <p>地址：<input type="text" name="address"></p>
  <p>生日：<input type="text" name="birthday"></p>
  <p>身高：<input type="text" name="height"></p>
  <p>體重：<input type="text" name="weight"></p>
  <p>備註：<input type="text" name="remark"></p>
  <input type="submit" value="新增">
</form>
 
</body>
</html>
HEREDOC;

echo $html;
?>
