<?php
require("connection.php");

if( !isset($_POST['email']) or !isset($_POST['password'])) {
    exit();
}

$hash = sha1( $_POST['email']. uniqid() );

$sql = sprintf("INSERT INTO `members`(
`name`, `email`, `password`,
`create_at`, `last_login_at`,
`hash_code`) VALUES (
  %s, %s, %s,
  NOW(), NOW(),
  %s)",
    GetSQLValueString($_POST['name'], 'text'),
    GetSQLValueString($_POST['email'], 'text'),
    GetSQLValueString(sha1($_POST['password']), 'text'),

    GetSQLValueString($hash, 'text')
);

// echo $sql;
$rs = mysql_query($sql, $conn) or die(mysql_error());
?>

<?php
header("Location: shoppingTable.php");
?>
