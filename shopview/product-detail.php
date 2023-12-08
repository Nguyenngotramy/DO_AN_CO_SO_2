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
<<<<<<< HEAD:view/product-detail.php
    <script src="product-detail.js"></script>
    <link rel=" stylesheet" href="css/checkout.css">
   <link rel=" stylesheet" href="css/login_register.css">
   <script src="script.js"></script>
=======
    <script src="../view/product-detail.js"></script>
>>>>>>> 81f816f6752a40b098be56a01fbbb2dcd3704f95:shopview/product-detail.php
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body style="background-image: none;">
    <?php include('../view/header.php') ?>

    <div id="product-frame">
        <div class="elements">
            <div class="product-images">
            <?php
                include('../model/productdb.php');
                $productID = $_GET['productID'];
                $imageList = showImage($productID);
                foreach ($imageList as $image) {
            ?>
                <img src="<?php echo $image['image']?>" id="<?php echo $image['id']?>" onclick="getMainImage(id)">
                <?php }?>
            </div>
        </div>
        <div class="elements" style="margin: 0 30px">
            <div class="main-image" id="main-image">
                <img src="<?php echo $imageList[0]['image'] ?>" id="mainimg">
            </div>
        </div>
        <div class="elements">
            <div class="detail">
                <ul name="path">
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="header.html">HOME</a></li>
                    <li><a href="header.html">HOME</a></li>
                </ul>
                <?php
                // $productID =  $_GET['productID'];
                
                
                $productInfor = showInforOfProduct($productID);
                $productDetails = showDetails($productID);
                $colors = array();
                $sizes = array();
                foreach ($productDetails as $detail) {
                    $color = $detail['color'];
                    $size = $detail['size'];
                    if (!in_array($color, $colors)) {
                        $colors[] = $color;
                    }
                    
                    if (!in_array($size, $sizes)) {
                        $sizes[] = $size;
                    }
                }
                ?>
                <span name="product-name" style="font-size: 30px; font-weight: bold; margin: 20px 0 -10px 0;">
                    <?php echo ($productInfor['productName']) ?>
                </span><br>
                <div class="inline">
                    <span class="material-symbols-outlined star">star</span>
                    <span class="material-symbols-outlined star">star</span>
                    <span class="material-symbols-outlined star">star</span>
                    <span class="material-symbols-outlined star">star</span>
                    <span class="material-symbols-outlined star">star</span>
                    <span style="margin-left: 15px; font-size: 14px">1 REVIEW</span>
                </div>
                <div class="status">
                    <span>Expired</span>
                </div>
                <p name="describe" style="color: gray; letter-spacing: 1px; font-size: 15px;">Safer For The Environment:
                    Our denim
                    factory partner recycles 98% of their water using reverse osmosis filtration and keeps byproducts
                    out of the environment by mixing them with concrete to create building materials.</p>
                <div class="inline">
                    <span style="font-size: 20px; margin-right: 10px;">Color</span>
                    <?php foreach ($colors as $color) { ?>
                        <div class="color" style="background-color: <?php echo $color; ?>;"></div>
                    <?php } ?>
                </div>
                <div class="inline" style=" margin-top: 20px">
                    <span style="font-size: 20px; margin-right: 20px;">Size</span>
                    <?php foreach ($sizes as $size) { ?>
                        <button class="size"><?php echo $size?></button>
                    <?php } ?>
                </div>
                <span name="price" style="font-size: 20px; margin: 30px 0;">Price: $</span>
                <div name="policy">
                    <div class="inline">
                        <a class="dialog-btn" href="#policy"><span class="material-symbols-outlined">
                                local_shipping
                            </span></a>
                        <a class="dialog-btn" href="#policy"><span>DELIVERY & RETURN
                            </span></a>
                    </div>
                    <div class="inline">
                        <a class="dialog-btn" href="#size-guide"><span class="material-symbols-outlined">
                                straighten
                            </span></a>
                        <a class="dialog-btn" href="#size-guide"><span>SIZE GUIDE</span></a>
                    </div>
                    <div class="inline">
                        <a class="dialog-btn" href="#"><span class="material-symbols-outlined">
                                calendar_month
                            </span></a>
                        <a class="dialog-btn" href="#"><span>
                                ESTIMATED DELIVERY:
                                NOV 20 NOV 24
                            </span></a>
                    </div>
                </div>
                <div id="policy" class="dialog" style="background-color: rgba(34, 34, 32, 0.304); ">
                    <div class="dialog-body">
                        <a href="#"><span class="material-symbols-outlined" style="margin-left: 100%;">
                                close
                            </span><br></a>
                        <span>Delivery & Return</span>
                        <p>We want you to be happy with your purchase and we apologize if it is not. For whatever reason
                            that you are not satisfied, we would be most happy to provide exchanges and returns for all
                            items purchased from us if the following conditions are met.</p>
                        <span>Rules</span>
                        <p>All exchanges and returns would need to be raised within 10 days of the invoice date for
                            Singaporeorders, and 20 days for overseas orders. For local deliveries, there is an option
                            to exchange at any of our boutiques within Singaporeor through our online portal at
                            www.company.com. All requests for returns however, would need to be strictly made online at
                            www.company.com for both local and overseas deliveries.</p>
                        <span>Interpretation and Definitions</span>
                        <p>All exchanges and returns would need to be raised within 10 days of the invoice date for
                            Singaporeorders, and 20 days for overseas orders. For local deliveries, there is an option
                            to exchange at any of our boutiques within Singaporeor through our online portal at
                            www.company.com. All requests for returns however, would need to be strictly made online at
                            www.company.com for both local and overseas deliveries.</p>
                    </div>
                </div>

                <div id="size-guide" class="dialog" style="background-color: rgba(34, 34, 32, 0.304); ">
                    <div class="dialog-body">
                        <a href="#"><span class="material-symbols-outlined" style="margin-left: 100%;">
                                close
                            </span><br></a>
                        <img src="image/size-guide.png">
                    </div>
                </div>

                <div class="frame">
                    <div class="inline">
                        <span class="material-symbols-outlined" style="color: rgb(178, 178, 2);">shopping_bag</span>
                        <span>65 people have this in their carts right now. It's running out!</span>
                    </div>
                </div>

                <div class="can-buy">
                    <div class="inline" style="border-bottom: 1px solid lightgrey; padding: 5px 20px;">
                        <div class="quantity">
                            <button name="cal" onclick="quantity('minus')">-</button>
                            <input type="text" value="0" id="quantity">
                            <button name="cal" onclick="quantity('plus')">+</button>
                        </div>
                        <button class="btnAdd">Add to Cart</button>
                        <span class="material-symbols-outlined" style="margin-left: 20px;">favorite</span>
                    </div>
                    <div class="inline" style="padding: 20px;">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span style="font-size: 13px; margin: 0 30px 0 10px; font-weight: bold;">2 - DAY DELIVERY</span>
                        <span>|</span>
                        <span style="font-size: 13px; margin-left: 30px;">Speedy and reliable parcek delivery!</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="more-infor">
        <div class="bar">
            <ul class="ul-main">
                <li name="option" id="description" onclick="show('description')">Description</li>
                <li name="option" id="add-inf" onclick="show('add-inf')">Additional Information</li>
                <li name="option" id="review" onclick="show('review')">Review</li>
            </ul>
        </div>
        <div class="show-infor" id="show-infor">
            <script>show('description')</script>
        </div>

        <div id="also-like">
            <span style="font-size: 25px; font-weight: bold;">Viewers Also Liked</span>
            <span style="float: right;">See All ></span><br>
            <div class="featured-products">
                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>
                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>

                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>
                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>
                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>
                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>
                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>
                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>
                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>

                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>
                <div class="product">
                    <div class="product-box">
                        <img src="image/ring.png">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <a class="readmore">Read more</a>
                    </div>
                    <span>Embossed hoop earrings</span><br>
                    <span>$144.00</span>
                </div>
            </div>
        </div>
    </div>
    <div>
      <?php include('checkout.php') ?>
   </div>

<<<<<<< HEAD:view/product-detail.php
    
   <div>
      <?php include('login_register.php') ?>
   </div>
    <?php include('footer.php') ?>
=======
    <?php include('../view/footer.php') ?>
>>>>>>> 81f816f6752a40b098be56a01fbbb2dcd3704f95:shopview/product-detail.php


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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../view/app.js"></script>
</body>

</html>