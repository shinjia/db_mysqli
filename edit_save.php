<?php
include 'config.php';

$uid = $_POST['uid'] ?? '';

$usercode = $_POST['usercode'] ?? '';
$username = $_POST['username'] ?? '';
$address  = $_POST['address']  ?? '';
$birthday = $_POST['birthday'] ?? '';
$height   = $_POST['height']   ?? '';
$weight   = $_POST['weight']   ?? '';
$remark   = $_POST['remark']   ?? '';

// 連接資料庫
$link = db_open();

$sqlstr  = "UPDATE person SET 
   usercode='$usercode',
   username='$username',
   address ='$address' ,
   birthday='$birthday',
   height  ='$height'  ,
   weight  ='$weight'  ,
   remark  ='$remark'
   WHERE uid= $uid ";    // 注意最後欄位沒有逗號


if(mysqli_query($link, $sqlstr)) {
   $msg = '資料已修改完畢!!!!!!!!';
   $msg .= '<br><a href="display.php?uid=' . $uid . '">詳細</a>';
}
else {
   $msg = '資料無法修改!!!!!!!';
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
