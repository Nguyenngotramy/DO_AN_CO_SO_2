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
    include('../view/header.php')
        ?>

    <div id="checkout">
        <div style="display: flex; flex-direction: column;">
            <ul>
                <li>HOME</li>
                <li>CHECKOUT</li>
            </ul>
            <span style="font-size: 25px; font-weight: bold; margin-left: 40px;">Checkout</span>
        </div>
    </div>
    <?php
    include('../model/productdb.php');
    include('cartFunction.php');
    $orderID = $_GET['orderID'];
    $orderInfor = getOrderInfor($orderID);
    $checkoutList = showCheckoutList();
    ?>
    <div id="information">
        <div id="message">
            <span>Thank you. Your order has been received.</span>
        </div>
        <div id="order-infor">
            <ul>
                <li class="element">
                    <span>Order number:</span><br>
                    <b style="margin-top: -15px;">
                        <?php echo $orderID ?>
                    </b>
                </li>
                <li class="element">
                    <span>Date:</span><br>
                    <b style="margin-top: -15px;">
                        <?php echo $orderInfor['date'] ?>
                    </b>
                </li>
                <li class="element">
                    <span>Total: </span><br>
                    <b style="margin-top: -15px;">$144.00</b>
                </li>
                <li class="element">
                    <span>Payment method:</span><br>
                    <b style="margin-top: -15px;">Direct bank transfer</b>
                </li>
            </ul>
        </div>
        <div id="bank-details" style="margin-top: 50px;">
            <b style="font-size: 20px;">Our bank details</b><br>
            <b style="margin-top: 10px;">Serene</b>
            <ul>
                <li>Bank: TPBank</li>
                <li>Account Number: 06242901501</li>
                <li>Account Owner: Nguyen Tran Ha Nhi</li>
            </ul>
        </div>

        <div id="order-details">
            <b style="font-size: 20px;">Order details</b><br>
            <table>
                <tr>
                    <td style="font-weight: bold;">Product</td>
                    <td style="font-weight: bold;">Total</td>
                </tr>
                <?php foreach ($checkoutList as $p) { ?>
                    <tr>
                        <td style="color: black">
                            <?php echo $p[2] ?> <span>x
                                <?php echo $p[4] ?>
                            </span>
                        </td>
                        <td style="color: black">$
                            <?php echo ($p[3] * $p[4]) ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <?php
                    $total = total();
                    $total = str_replace(',', '', $total);
                    $total = filter_var($total, FILTER_VALIDATE_FLOAT);
                    ?>
                    <td>Subtotal:</td>
                    <td>$
                        <?php echo $total ?>
                    </td>
                </tr>
                <tr>
                    <td>Shipping:</td>
                    <td>$25.00</td>
                </tr>
                <tr>
                    <td>Payment method:</td>
                    <td>Direct bank transfer</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>
                        <?php echo ($total + 25) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    unset($_SESSION['cart']);
    ?>
    <?php
    include('../view/footer.php')
        ?>
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