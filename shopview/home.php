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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Manrope&display=swap" rel="stylesheet">
    <script src='main.js'></script>
    <script src="script.js"></script>
    <link rel=" stylesheet" href="css/checkout.css">
   <link rel=" stylesheet" href="css/login_register.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body style="background-image: url('../view/image/background.png');">

    <?php include('../view/header.php') ?>
    <div id="introduce">
        <div class="left">
            <img src="../view/image/snapedit_1700049236578.jpg">
            <button>See More</button>
        </div>
        <div class="right">
            <img src="../view/image/370282530_356790323516987_6916764082966319400_n.png">
        </div>
    </div>

    <div id="policy">
        <div class="elements">
            <span class="material-symbols-outlined" style="font-size: 50px; margin-bottom: -15px;">payments</span><br>
            <span>Amazing Value Every Day</span>
            <span class="details">Items prices that fit your budget</span>
        </div>
        <div class="elements">
            <span class="material-symbols-outlined"
                style="font-size: 50px; margin-bottom: -15px;">workspace_premium</span><br>
            <span>Successful Customer Service</span>
            <span class="details">We work with a focus on 100% customer satisfaction.</span>
        </div>
        <div class="elements">
            <span class="material-symbols-outlined"
                style="font-size: 50px; margin-bottom: -15px;">credit_card</span><br>
            <span>All Payment Methods</span>
            <span class="details">Don't bother with payment details.</span>
        </div>
        <div class="elements">
            <span class="material-symbols-outlined"
                style="font-size: 50px; margin-bottom: -15px;">local_shipping</span><br>
            <span>Completely free shipping
            </span>
            <span class="details">We'll handle the shipping.
            </span>
        </div>
    </div>

    <div id="show">
        <div id="special">
            <?php
            include('../model/categorydb.php');
            $categoryList = showAllCategory();
            ?>
            <div class="elements">
                <img src="../view/image/chibe1.png">
                <div class="infor">
                    <b style="font-size: 13px; letter-spacing: 3px;">RINGS</b><br>
                    <b>Free Shipping On Over $50</b><br>
                    <span>My job is to bring out in people what they wouldn't dare do themselves</span><br>
                </div>
                <div class="btnSeeMore">
                    <a href="shop.php?categoryid=1">See More Products</a>
                </div>
            </div>

            <div class="elements">
                <div id="right">
                    <div class="earrings">
                        <img src="../view/image/chibe2.png">
                        <div class="infor">
                            <b style="font-size: 13px; letter-spacing: 3px;">EARRINGS</b><br><br>
                            <b>Free Shipping On Over $50</b><br>
                        </div>
                        <div class="btnSeeMore">
                            <a href="shop.php?categoryid=2">See More Products</a>
                        </div>
                    </div>
                    <div class="grid">
                        <div style="display: block;
                        overflow: hidden;">
                            <a href="shop.php?categoryid=3">
                                <img src="../view/image/chibe3.png">
                                <div class="infor" style="top: 55%">
                                    <b style="font-size: 13px; letter-spacing: 3px;">NECKLACES</b><br><br>
                                    <b>Free Shipping On Over $50</b><br>
                                </div>
                            </a>
                        </div>
                        <div style="display: block;
                    overflow: hidden;">
                            <a href="shop.php?categoryid=4">
                                <img src="../view/image/chibe4.png">
                                <div class="infor" style="top: 55%; left: 55%;">
                                    <b style="font-size: 13px; letter-spacing: 3px;">BRACELETS</b><br><br>
                                    <b>Free Shipping On Over $50</b><br>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="catalogues">
            <?php
            foreach ($categoryList as $category) {
                $quantity = countQuantityInCategory($category['categoryID']);
                ?>
                <div class="elements">
                    <div class="circle">
                        <span>
                            <?php echo $quantity ?>
                        </span>
                    </div>
                    <img src='<?php echo $category['categoryImage'] ?>'><br>
                    <span style="text-transform: uppercase; font-weight: bold; font-size: 20px">
                        <?php echo $category['categoryName'] ?>
                    </span>
                </div>
            <?php } ?>
        </div>
        <span style="font-size: 32px; display: flex; justify-content: center; font-weight: bold;">Featured
            Products</span><br>
        <span style="float: right;">See All ></span><br>
        <div class="featured-products">
            <?php
            include('../model/productdb.php');
            $productList = showAllProduct();
            foreach ($productList as $product) {
                ?>
                <div class="product">
                    <div class="product-box">
                        <img src="<?php echo $product['image'] ?>">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore" href="product-detail.php?productID=<?php echo $product['productID']?>">Read more</a>
                    </div>
                    <div style="height: 50px">
                        <b>
                            <?php echo $product['productName'] ?>
                        </b><br>
                    </div>
                    <span">$
                        <?php echo $product['price'] ?></span>
                </div>
            <?php } ?>
        </div>
    </div>


    <div id="slogan">
        <span>Back to the past</span><br>
        <p>You can hide so much behind theatrics, and I don't need to do that any more. My relationships with producers
            or photographers - these are relationships that took years!</p>
        <button>See All</button>
    </div>
    <div>
      <?php include('checkout.php') ?>
   </div>

    
   <div>
      <?php include('login_register.php') ?>
   </div>

    <?php include('../view/footer.php') ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../view/app.js"></script>
</body>

</html>