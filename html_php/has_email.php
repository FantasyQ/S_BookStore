<?php
require("connection.php");

if( ! isset($_GET['email']) ) {
    exit();
}


$sql = sprintf("SELECT * FROM `members` WHERE `email`=%s",
    GetSQLValueString($_GET['email'], 'text')
);


$rs = mysql_query($sql, $conn) or die(mysql_error());

echo mysql_num_rows($rs);




