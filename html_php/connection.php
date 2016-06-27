<?php
//$hostname_conn = "mysql.2freehosting.com";
//$database_conn = "u485025864_sbook";
//$username_conn = "u485025864_admin";
//$password_conn = "Tb308308";
//
//$hostname_conn = "sql309.yabi.me";
//$database_conn = "yabi_18273948_sBookstore";
//$username_conn = "yabi_18273948";
//$password_conn = "Tb308308";

$hostname_conn = "localhost";
$database_conn = "s_bookstore";
$username_conn = "fantasyq";
$password_conn = "admin";
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_query("SET NAMES utf8");

mysql_select_db($database_conn, $conn);

if(! isset($_SESSION)){
    session_start();
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
    if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    switch ($theType) {
        case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "long":
        case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
    }
    return $theValue;
}
