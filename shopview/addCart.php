<?php
    include('cartFunction.php');
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $pdID = $_POST['pdID'];
    $image = $_POST['image'];
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    // $color = $_POST['color'];
    // $size = $_POST['size'];
    // $product = [$pdID, $image, $productName, $price, $quantity, $color, $size];
    
    $product = [$pdID, $image, $productName, $price, $quantity];
    $productExists = false;
    foreach ($_SESSION['cart'] as $productKey => $p) {
        if (is_array($p)) {
            if ($p[0] == $product[0]) {
                $_SESSION['cart'][$productKey][4]++;
                $productExists = true;
                break;
            }
        }
    }
    if (!$productExists) {
        $_SESSION['cart'][] = $product;
    }
    // var_dump($_SESSION['cart'] );
    $cartHTML = showCartItems();
    $total = total();
    $response = ['html' => $cartHTML, 'total' => $total];
    echo json_encode($response);
?>