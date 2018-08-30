<?php
include 'config.php';

$usercode = isset($_POST['usercode']) ? $_POST['usercode'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$address  = isset($_POST['address'])  ? $_POST['address']  : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$height   = isset($_POST['height'])   ? $_POST['height']   : '';
$weight   = isset($_POST['weight'])   ? $_POST['weight']   : '';
$remark   = isset($_POST['remark'])   ? $_POST['remark']   : '';


// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "INSERT INTO person(usercode, username, address, birthday, height, weight, remark) VALUES ('$usercode', '$username', '$address', '$birthday', '$height', '$weight', '$remark') ";

// 執行 SQL
if(mysqli_query($link, $sqlstr))
{
   $new_uid = mysqli_insert_id($link);    // 傳回剛才新增記錄的 auto_increment 的欄位值
   
   $msg = '資料已新增!!!!!!!!<br/>';
   $msg .= '<a href="display.php?uid=' . $new_uid . '">詳細</a>';
}
else
{
   $msg = '資料無法新增!!!!!!!!';
   $msg .= '<hr>' . $sqlstr . '<hr>' . mysqli_error($link);
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

{$msg}
</body>
</html>
HEREDOC;

echo $html;
?>
