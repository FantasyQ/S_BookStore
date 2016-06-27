<?php

require("connection.php");

$result = array(
    'success' => 0,
    'msg' => '沒有參數'
);

if( !isset($_POST['l_email']) or !isset($_POST['l_password'])) {
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit();
}


$sql = sprintf("SELECT `sid`, `name`, `email`, `mobile`, `address` FROM `members` WHERE `email`=%s AND `password`=%s",
    GetSQLValueString($_POST['l_email'], 'text'),
    GetSQLValueString(sha1($_POST['l_password']), 'text')
);

$rs = mysql_query($sql, $conn) or die(mysql_error());

if(mysql_num_rows($rs)==1) {
    $row = mysql_fetch_assoc($rs);
    $_SESSION['user'] = $row;
    $result['success'] = 1;
    $result['msg'] = '登入成功';
} else {
    $result['msg'] = '電子郵件或密碼錯誤';
};

echo json_encode($result['msg'], JSON_UNESCAPED_UNICODE);





