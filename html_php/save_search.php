<?php
session_start();

$_SESSION['search'] = isset($_GET['search_input']) ? $_GET['search_input'] : '';

header("Location: search_list.php");

?>