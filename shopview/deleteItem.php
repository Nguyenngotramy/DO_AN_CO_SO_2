<?php
session_start();
include('cartFunction.php');

if (isset($_SESSION['cart'])) {
    $pdID = $_POST['pdID'];
    $color = $_POST['productColor'];
    $size = $_POST['productSize'];
    deleteItem($pdID, $color, $size);
    $cartHTML = showCartItems();
    $total = total();
    $count = countCart();
    $response = ['html' => $cartHTML, 'total' => $total, 'count' => $count];
    echo json_encode($response);
}
?>