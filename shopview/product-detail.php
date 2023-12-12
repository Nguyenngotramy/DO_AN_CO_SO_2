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

    <link rel=" stylesheet" href="../view/css/checkout.css">
    <link rel=" stylesheet" href="../view/css/login_register.css">
    <script src="script.js"></script>

    <script src="../view/productdetails.js"></script>

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
                    <img src="<?php echo $image['image'] ?>" id="<?php echo $image['id'] ?>" onclick="getMainImage(id)">
                <?php } ?>
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
                <span id="productName" name="product-name" style="font-size: 30px; font-weight: bold; margin: 20px 0 -10px 0;">
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
                        <button class="size" value="<?php echo $size ?>">
                            <?php echo $size ?>
                        </button>
                    <?php } ?>
                </div>
                <span name="price" style="font-size: 20px; margin: 30px 0;">Price: $<span id="price"><?php echo ($productInfor['price']) ?></span></span>
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
                            <input type="text" value="1" id="quantity">
                            <button name="cal" onclick="quantity('plus')">+</button>
                        </div>
                        <a class="btnAdd" onclick="myFunctionCheckout()" data-page="<?php echo ($productInfor['productID']) ?>">Add to Cart</a>
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
            <?php
            include('getInforData.php');
            $description = json_encode(descriptionProduct($productInfor), JSON_HEX_QUOT);
            $encodedDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

            $additionInfor = json_encode(additionInfor($colors, $sizes), JSON_HEX_QUOT);
            $encodedAdditionInfor = htmlspecialchars($additionInfor, ENT_QUOTES, 'UTF-8');

            ?>
            <ul class="ul-main">
                <li name="option" id="description" onclick="show('description', <?php echo $encodedDescription ?>)">
                    Description
                </li>
                <li name="option" id="add-inf" onclick="show('add-inf', <?php echo $encodedAdditionInfor ?>)">Additional
                    Information</li>
                <li name="option" id="review" onclick="show('review')">Review</li>
            </ul>
        </div>
        <div class="show-infor" id="show-infor">
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    console.log(<?php echo $description ?>);
                    show('description', <?php echo $description ?>);
                    //Hề hước vl đéo hiểu???
                });
            </script>
        </div>





        <div id="also-like">
            <span style="font-size: 25px; font-weight: bold;">Viewers Also Liked</span>
            <span style="float: right;">See All ></span><br>
            <div class="featured-products">
                <?php
                $productList = showAllProduct();
                foreach ($productList as $product) {
                    ?>
                    <div class="product">
                        <a href="product-detail.php?productID=<?php echo $product['productID'] ?>"
                            style="text-decoration: none; color: black">
                            <div class="product-box">
                                <img src="<?php echo $product['image'] ?>">
                                <span class="material-symbols-outlined">
                                    favorite
                                </span>
                                <a class="readmore"
                                    href="product-detail.php?productID=<?php echo $product['productID'] ?>">Read
                                    more</a>
                            </div>
                        </a>
                        <a href="product-detail.php?productID=<?php echo $product['productID'] ?>"
                            style="text-decoration: none; color: black">
                            <div style="height: 50px">
                                <b>
                                    <?php echo $product['productName'] ?>
                                </b><br>
                            </div>
                        </a>
                        <span>$<?php echo $product['price'] ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div>
        <?php include('../view/checkout.php') ?>
    </div>


    <div>
        <?php include('../view/login_register.php') ?>
    </div>
    <?php include('../view/footer.php') ?>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.btnAdd', function (e) {
        e.preventDefault();
        // let $data = $(this).closest('.row');
        // let $image = $data.find('img').attr('src');
        // let $name = $data.find('h4').text();
        // let $priceText = $data.find('h5').text();
        // let $price = $priceText.replace("$", "");
        // let $pdID = $(this).data('page');
        // let $quantity = 1;
        let $pdID = $(this).data('page');
        let $image = document.getElementById('mainimg').src;
        let $productName = document.getElementById('productName').textContent;
        let $price = document.getElementById('price').textContent;
        let $quantity = document.getElementById('quantity').value;
        // console.log($pdID);
        // console.log($image);
        // var $colorOption; 
        // var $sizeOption;

        // var colorOptions = document.querySelectorAll('.color');
        // colorOptions.forEach(function(colorOptionElement) {
        // colorOptionElement.addEventListener('click', function() {
        //     var selectedColor = window.getComputedStyle(colorOptionElement).backgroundColor;
        //     colorOption = selectedColor;
        // });

        // var sizeOptions = document.querySelectorAll('.size');
        // sizeOptions.forEach(function(sizeOptionElement) {
        //     sizeOptionElement.addEventListener('click', function() {
        //     var selectedSize = window.getComputedStyle(sizeOptionElement).value;
        //     sizeOption = selectedSize;
        // });
    // });
        $.ajax({
            type: "POST",
            url: "addCart.php",
            data: {
                pdID: $pdID,
                image: $image,
                productName: $productName,
                price: $price,
                quantity: $quantity
                // color: $colorOption;
                // size: $sizeOption;
            },
            dataType: 'json',
            success: function (data) {
                var cartHTML = data.html;
                var total = data.total;
                $('#list').html(cartHTML);
                $('#total').html(total);
                // console.log(data);
            }
        });


    });
</script>

<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        let $pdID = $(this).data('page');
        console.log('click!');
        console.log($pdID);
        $.ajax({
            type: "POST",
            url: "deleteItem.php",
            data: {
                pdID: $pdID,
            },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                var cartHTML = data.html;
                var total = data.total;
                $('#list').empty();
                $('#list').html(cartHTML);
                $('#total').html(total);
            }
        });

    });
</script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../view/app.js"></script>
</body>

</html>