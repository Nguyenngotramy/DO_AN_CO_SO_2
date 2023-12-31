<?php
    include('../database/connecttemp.php');
    include('../model/productdb.php');
    session_start();
    $message = '';
    $userID = $_SESSION['userID'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $order_comments = $_POST['order-comments'];

    $orderID = createOrder($userID, $first_name, $last_name, $address, $phone, $order_comments);
    foreach($_SESSION['cart'] as $p) {
        $productDetailID = getProductDetail($p[0], $p[5], $p[6]);
        addCartIntoOrder($orderID, $productDetailID, $p[4]);
    }
    header("Location: checkoutSuccess.php?orderID=$orderID");
?>