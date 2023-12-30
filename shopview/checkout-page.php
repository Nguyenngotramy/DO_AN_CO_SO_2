<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Manrope&display=swap" rel="stylesheet">
    <script src='main.js'></script>
    <script src="checkout.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
    <?php
    session_start();
    ?>
    <div id="header">
        <div class="elements">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <span style="font-weight: bold; font-size: 13px; margin-left: 70px;">FREE SHIPPING ON ALL ORDERS OVER 75$!</span>
        <div class="elements">
            <span>CART</span>
            <span>SEARCH</span>
            <span>HELP</span>
        </div>
    </div>

    <div id="menu">
        <div class="elements" style="margin-right: 321px; margin-left: 10px">
            <a href>HOME</a>
            <a style="display: flex;">CATALOGUES <span class="material-symbols-outlined"
                    style="margin: 1px;">expand_more</span></a>
            <a style="display: flex;" href="../shopview/shop.php">SHOP</a>
            <a>FEEDBACK</a>
        </div>
        <b style="font-size: 25px;  margin-right: 420px" >SERENE</b>
        <div class="elements" style="width: 270px;">
            <i class="material-symbols-outlined">search</i>
            <div>
                <div class="circle">1</div>
                <i class="material-symbols-outlined">shopping_bag</i>
            </div>
            <div>
                <div class="circle">1</div>
                <i class="material-symbols-outlined">favorite</i>
            </div>
            <i class="fa-regular fa-user" style="font-size: 23px"></i>
            <i class="material-symbols-outlined">menu</i>
        </div>
    </div>

    <div id="checkout">
        <div style="display: flex; flex-direction: column;">
            <ul>
                <li>HOME</li>
                <li>CHECKOUT</li>
            </ul>
            <span style="font-size: 25px; font-weight: bold; margin-left: 40px;">Checkout</span>
        </div>
    </div>

    <span style="font-weight: bold; padding-left: 6%; font-size: 23px;">Billing details</span>
    <div id="billing-details">
        <div class="left">
            <label for="first-name">FIRST NAME *</label>
            <input type="text" id="first-name" name="requiredField">
            <label for="last-name">LAST NAME *</label>
            <input type="text" id="last-name" name="requiredField">
            <label for="address">ADDRESS *</label>
            <input type="text" id="address" placeholder="House number and street name" name="requiredField">
            <label for="phone">PHONE *</label>
            <input type="text" id="phone" name="requiredField">
            <label for="email">EMAIL ADDRESS *</label>
            <input type="text" id="email" name="requiredField">
            <div id="error-message">
                <div id="frame">

                </div>
            </div>
        </div>

        <div class="right">
            <label style="font-size: 14px; font-weight: bold; margin: 15px 0;">ORDER NOTES (OPTIONAL)</label>
            <textarea name="order_comments" class="input-text " id="order_comments"
                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
            <div id="your-order">
                <span style="font-weight: bold; margin-bottom: 20px; font-size: 20px;">Your order</span>
                <div class="order-list">
                    <?php
                        include('cartFunction.php');
                        $checkoutList = showCheckoutList();
                        // var_dump($checkoutList);
                        foreach($checkoutList as $p) {
                    ?>
                    
                    <!-- <div class="elements">
                        <div style="display: flex; align-items: center;">
                            <img
                                src="https://ninetheme.com/themes/goldsmith/wp-content/uploads/2021/10/37096318_PL_B-60x60.webp">
                            <span class="product-name">Faceted crystal hoop earrings </span>
                            <span style="font-size: 15px; font-weight: bold; color: grey;"> x 2</span>
                        </div>
                        <span style="font-size: 15px; color: grey;">$44.00</span>
                    </div> -->
                    
                    <div class="elements">
                        <div style="display: flex; align-items: center;">
                            <img
                                src="<?php echo $p[1]?>">
                            <span class="product-name"><?php echo $p[2]?></span>
                            <span style="font-size: 15px; font-weight: bold; color: grey;"> x <?php echo $p[4]?></span>
                        </div>
                        <span style="font-size: 15px; color: grey;">$<?php echo ($p[3]*$p[4])?></span>
                    </div> 
                    <?php }?>

                </div>

                <div class="subtotal" style="margin: 15px 0;">
                    <div style="display: flex; justify-content: space-between;">
                        <b>Subtotal</b>
                        <?php
                            $total = total();
                            $total = str_replace(',', '', $total);
                            $total = filter_var($total, FILTER_VALIDATE_FLOAT);
                        ?>
                        <span>$<?php echo $total?></span>
                    </div>
                </div>

                <div class="flat-rate">
                    <span>Shipping</span>
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <span>Flat rate:</span>
                        <span>$25.00</span>
                    </div>
                </div>
                <div class="total">
                    <span>TOTAL</span>
                    <span>$<?php echo($total+25)?></span>
                </div>
                <div class="payment">
                    <input type="radio" value="" name="payment" checked="checked" id="bank"><label for="bank">Direct
                        bank transfer</label>
                    <p style="color: grey;">Make your payment directly into our bank account. Please use your Order ID
                        as the payment
                        reference. Your order will not be shipped until the funds have cleared in our account.</p>
                    <input type="radio" value="" name="payment" id="cash"><label for="cash">Cash on delivery</label>
                    <p style="color: grey;">Pay with cash upon delivery.</p>
                </div>
                <div class="policy">
                    <p>Your personal data will be used to process your order, support your experience throughout this
                        website, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                </div>
                <div class="agree">
                    <input type="checkbox" id="agree" name="agree"> <label for="agree">I HAVE READ AND AGREE
                        TO THE WEBSITE <a style="text-decoration: underline;">TERMS AND CONDITIONS</a> *</label>
                </div>
                <input type="submit" value="Place order" onclick="validateForm()">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop()) {
                    $('#menu').addClass('menu-scroll');
                } else {
                    $('#menu').removeClass('menu-scroll');
                }
            })
        })
    </script>