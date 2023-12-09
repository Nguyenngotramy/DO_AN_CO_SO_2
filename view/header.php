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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
</head>

<body>
    <?php require('../database/connecttemp.php')?>
    <div id="header">
        <div class="elements">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <span style="font-weight: bold; font-size: 13px;">FREE SHIPPING ON ALL ORDERS OVER 75$!</span>
        <div class="elements">
            <span>CART</span>
            <span>SEARCH</span>
            <span>HELP</span>
        </div>
    </div>

    <div id="menu">
        <div class="elements">
            <a>HOME</a>
            <a style="display: flex;">CATALOGUES <span class="material-symbols-outlined"
                    style="margin: 1px;">expand_more</span></a>
            <a style="display: flex;" href="../shopview/shop.php">SHOP</a>
            <a>FEEDBACK</a>
        </div>
        <b style="font-size: 25px; margin-left: -10%;">CONBONGLONGXIEN</b>
        <div class="elements">
            <i class="material-symbols-outlined">search</i>
            <div>
                <div class="circle">1</div>
                <i onclick="myFunctionCheckout()" class="material-symbols-outlined" >shopping_bag</i>
            </div>
            <div>
                <div class="circle">1</div>
                <i class="material-symbols-outlined">favorite</i>
            </div>
            <i id="user-login" onclick="myFunctionLoginForm()" class="fa-regular fa-user" style="font-size: 23px"></i>
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