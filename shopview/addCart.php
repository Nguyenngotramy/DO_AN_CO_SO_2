<?php
    include('cartFunction.php');
    session_start();
    // $expireTime = 60 * 60; // 1 hour
    // session_set_cookie_params($expireTime); 
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $sessionId = session_id();
    }
    $pdID = $_POST['pdID'];
    $image = $_POST['image'];
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $product = [$pdID, $image, $productName, $price, $quantity, $color, $size];
    
    $productExists = false;
    foreach ($_SESSION['cart'] as $productKey => $p) {
        if (is_array($p)) {
            if ($p[0] == $product[0] && $p[5] == $product[5] && $p[6] == $product[6]) {
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
    $count = countCart();
    $response = ['html' => $cartHTML, 'total' => $total, 'count' => $count];
    echo json_encode($response);
?>