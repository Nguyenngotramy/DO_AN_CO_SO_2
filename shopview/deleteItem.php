<?php
session_start();
include('cartFunction.php');

if (isset($_SESSION['cart'])) {
    $pdID = $_POST['pdID'];
    deleteItem($pdID);
    $cartHTML = showCartItems();
    $total = total();
    $response = ['html' => $cartHTML, 'total' => $total];
    echo json_encode($response);
}
?>