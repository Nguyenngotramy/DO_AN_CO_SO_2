<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="app.css">
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
    <script src="../view/script.js"></script>
    <script src="../view/sc.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
    <?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
    ob_start();
}

    ?>
    <?php require('../database/connecttemp.php');

    ?>

    <div id="header">
        <div class="elements">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <span style="font-weight: bold; font-size: 13px; margin-left: 69px;">FREE SHIPPING ON ALL ORDERS OVER
            75$!</span>
        <div class="elements">
            <span>CART</span>
            <span>SEARCH</span>
            <span>HELP</span>
        </div>
    </div>

    <div id="menu" style=" justify-content: space-between;">
    <!-- style="margin-right: 321px; margin-left: 10px" -->
        <div class="elements" >
            <a href="../shopview/home.php">HOME</a>
            <a href="#catalogues" style="display: flex;">CATEGORIES <span class="material-symbols-outlined"
                    style="margin: 1px;">expand_more</span></a>
            <a style="display: flex;" href="../shopview/shop.php">SHOP</a>
            <a>FEEDBACK</a>
        </div>
        <b style="margin-left: -210px; font-size: 25px">SERENE</b> 
        <!--  style="font-size: 25px; margin-right: 420px" -->
        <div class="elements" style="width: 270px;">
            <i class="material-symbols-outlined" style="margin-left: -170px">search</i>
            <div>
                <div class="circle" id="amount">
                </div>
                <i onclick="myFunctionCheckout()" class="material-symbols-outlined">shopping_bag</i>
               
                <!-- <i onclick=" myFunctionLoginFormSigned() " class="material-symbols-outlined">shopping_bag</i> -->
            </div>
            <div>
                <div class="circle">1</div>
                <i onclick="" class="material-symbols-outlined">favorite</i>
            </div>
            <?php

            if (isset($_SESSION['userName']) && ($_SESSION['userName'] != "")): ?>
                <a href="#" onclick="myFunctionLoginFormSigned()">
                    <?php echo $_SESSION['userName']; ?>
                </a>
                <i onclick="myFunctionNewPass()" class="material-symbols-outlined">lock</i>
                <a href="shop.php?exit">
                    <?php echo "Log out" ?>
                </a>
                <?php
                if (isset($_GET['exit'])) {
                    session_unset();
                    if (isset($_SESSION['userID'])) {
                        $user_id = $_SESSION['userID'];
                        setcookie('cart_' . $user_id, '', time() - 3600, '/');
                    }
                    header('Location: ../shopview/home.php');
                    exit();
                }
                ?>
            <?php else: ?>
                <i id="user-login" onclick="myFunctionLoginForm()" class="fa-regular fa-user" style="font-size: 23px"></i>
            <?php endif; ?>

            <i class="material-symbols-outlined">menu</i>
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