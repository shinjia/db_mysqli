<?php
include 'config.php';

$uid      = isset($_POST['uid'])      ? $_POST['uid']      : '';

$usercode = isset($_POST['usercode']) ? $_POST['usercode'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$address  = isset($_POST['address'])  ? $_POST['address']  : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$height   = isset($_POST['height'])   ? $_POST['height']   : '';
$weight   = isset($_POST['weight'])   ? $_POST['weight']   : '';
$remark   = isset($_POST['remark'])   ? $_POST['remark']   : '';

// 連接資料庫
$link = db_open();

$sqlstr  = "UPDATE person SET ";
$sqlstr .= "usercode='$usercode', ";
$sqlstr .= "username='$username', ";
$sqlstr .= "address ='$address' , ";
$sqlstr .= "birthday='$birthday', ";
$sqlstr .= "height  ='$height'  , ";
$sqlstr .= "weight  ='$weight'  , ";
$sqlstr .= "remark  ='$remark' ";  // 注意最後欄位沒有逗號
$sqlstr .= "WHERE uid=" . $uid;


if(mysqli_query($link, $sqlstr))
{
   $msg = '資料已修改完畢!!!!!!!!';
   $msg .= '<br><a href="display.php?uid=' . $uid . '">詳細</a>';
}
else
{
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
