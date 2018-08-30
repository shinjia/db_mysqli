<?php
include 'config.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;


// 連接資料庫
$link = db_open();

$sqlstr = "SELECT * FROM person WHERE uid=" . $uid;
$result = mysqli_query($link, $sqlstr);

if($row=mysqli_fetch_array($result))
{
   $uid      = $row['uid'];
   $usercode = $row['usercode'];
   $username = $row['username'];
   $address  = $row['address'];
   $birthday = $row['birthday'];
   $height   = $row['height'];
   $weight   = $row['weight'];
   $remark   = $row['remark'];

   $data = <<< HEREDOC
   <form action="edit_save.php" method="post">
      <p>代碼：<input type="text" name="usercode" value="{$usercode}"></p>
      <p>姓名：<input type="text" name="username" value="{$username}"></p>
      <p>地址：<input type="text" name="address"  value="{$address}"></p>
      <p>生日：<input type="text" name="birthday" value="{$birthday}"></p>
      <p>身高：<input type="text" name="height"   value="{$height}"></p>
      <p>體重：<input type="text" name="weight"   value="{$weight}"></p>
      <p>備註：<input type="text" name="remark"   value="{$remark}"></p>
      <input type="hidden" name="uid" value="{$uid}">
      <input type="submit" value="送出">
   </form>
HEREDOC;
}
else
{
   $data = '找不到資料';
}

db_close($link);


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

<h2 align="center">修改資料</h2>

{$data}

</body>
</html>
HEREDOC;

echo $html;
?>
