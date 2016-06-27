<?php

session_start();

if(! isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$p_sid = isset($_GET['p_sid']) ? intval($_GET['p_sid']) : 0;
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;

if( $p_sid ) {

    if( $qty ){
        $_SESSION['cart'][$p_sid] = $qty;
    } else {
        unset($_SESSION['cart'][$p_sid]);
    }
}

echo json_encode( $_SESSION['cart'] );



