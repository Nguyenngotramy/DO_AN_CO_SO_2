<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
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
   <!-- <link href="/https://www.flaticon.com/uicons/interface-icons/css/uicons-rounded-regular.css" rel="stylesheet">
  <link href="/your-path-to-uicons/css/uicons-rounded-bold.css" rel="stylesheet">
  <link href="/your-path-to-uicons/css/uicons-rounded-solid.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="../view/css/styleshop.css">
   <link rel="stylesheet" href="../view/app.css">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
   <?php include('../view/header.php') ?>
   <div id="title-shop" style="margin-top: 84px;">
      <img src="../view/img/banner1_shop.png" alt="">
      <ul>
         <a>
            <li id="choose"><span>HOME</span></li>
         </a>
         <a>
            <li><span>SHOP</span></li>
         </a>
      </ul>
      <h1 style="left: 5.2%;">Shop</h1>
   </div>
   <div id="wrapper" class="page-wrapper" style="max-width: 100%; padding: 0 4%; display: grid;">
      <div id="mainshop">
         <div id="leftsidebar">
            <div id="FilterBy">
               <div id="By">
                  <label>Filter By Categories</label>
                  <a id="circal"><i class="fa-solid fa-minus" style="color: #000000;"></i></a>
               </div>
               <div id="disapp">
                  <?php
                  include('../model/categorydb.php');
                  $categoryList = showAllCategory();
                  foreach ($categoryList as $category) {
                     ?>
                     <div id="By">
                        <span>
                           <?php echo $category['categoryName'] ?>
                        </span>
                        <input type="checkbox" value="<?php echo $category['categoryName'] ?>" id="categoryName" class="selection categoryName-select">
                     </div>
                  <?php } ?>
               </div>
            </div>

            <div id="FilterByPrice">
               <div id="By" class="By">
                  <label>Filter By Price</label>
                  <a id="circal1"><i class="fa-solid fa-minus" style="color: #000000;"></i></a>
               </div>
               <div id="disapp1">
                  <input type="range" min="90" max="240" value="75" />
                  <div id="By">
                     <a href="#" id="filter">
                        <li>Filter</li>
                     </a>
                     <span id="price">PRICE: $90 — $240</span>
                  </div>
               </div>
            </div>

            <div id="FilterByColor">
               <div id="By">
                  <label>Filter by Color</label>
                  <a id="circal2"><i class="fa-solid fa-minus" style="color: #000000;"></i></a>
               </div>

               <div id="disapp2">
                  <?php
                  include('../model/productdb.php');
                  $colorList = getAllColor();
                  foreach ($colorList as $color) { ?>
                     <div id="By">
                        <div id="Filter_choose">
                           <div href="#" id="color" style="background: <?php echo $color['color'] ?>;"></div><span>
                              <?php echo $color['color'] ?>
                           </span>
                           
                        </div>
                        <input type="checkbox" value="<?php echo $color['color'] ?>" id="color" class="selection color-select">
                     </div>
                  <?php } ?>
               </div>
            </div>

            <div id="FilterBySize">
               <div id="By">
                  <label>Filter By Size</label>
                  <a id="circal3"><i class="fa-solid fa-minus" style="color: #000000;"></i></a>
               </div>
               <div id="disapp3">
                  <?php
                     $sizeList = getAllSize();
                     foreach($sizeList as $size) {
                  ?>
                  <div id="By">
                     <span><?php echo $size['size']?></span>
                     <input type="checkbox" value="<?php echo $size['size']?>" id="size" class="selection size-select">
                  </div>
                  <?php }?>
               </div>
            </div>
            
         </div>


         <div id="rightsidebar">
            <div id="bannershop">
               <img src="../view/img/banner.png" alt="">
               <div>
                  <a href="#">
                     <li id="choose">NOSE RINGS</li>
                  </a>
                  <h4>Free Shipping on over $50</h4>
                  <p>For the terms of the campaign, see the description page.</p>

                  <a href="#">
                     <li id="seemore">See More Products</li>
                  </a>

               </div>
            </div>

            <div id="Fastfilter">
               <p>Fast Filters:</p>
               <ul>
                  <a href="">
                     <li><i class="fa-solid fa-splotch fa-beat" style="color: #ffd500;"></i>FEATURED</li>
                  </a>
                  <a href="">
                     <li><i class="fa-solid fa-fire" style="color: #ff4000;"></i>BEST SELLER</li>
                  </a>
                  <a href="">
                     <li><i class="fa-solid fa-ranking-star" style="color: #4d8eff;"></i></i>TOP RATED</li>
                  </a>
                  <a href="">
                     <li><i class="fa-solid fa-bolt-lightning" style="color: #ffc800;"></i>ON SALE</li>
                  </a>
                  <a href="">
                     <li><i class="fa-solid fa-box-open" style="color: #523a1e;"></i>IN STOCK</li>
                  </a>
                  <a href="">
                     <li>SECLECT COLOR</li>
                  </a>
                  <a href="">
                     <li>SECLECT PATEN</li>
                  </a>

               </ul>
            </div>

            <div id="FilterShow">
               <p>Show 1-12 of 20 results</p>
            </div>
            <div id="product-shop" class="product-shop">
               

            </div>
            <script>
            $(document).ready(function(){
               filter_data();

               function filter_data() {
                  var action = 'getdata';
                  var categoryName = get_filter('categoryName-select');
                  var size = get_filter('size-select');
                  var color = get_filter('color-select');

                  $.ajax({
                     url: "getdata.php",
                     method: "POST",
                     data: {action:action, categoryName:categoryName, size:size, color:color},
                     success:function(data){
                        $('.product-shop').html(data);
                     }
                  });
               }

               function get_filter(class_name) {
                  var filter = [];
                  $('.'+class_name+':checked').each(function() {
                     filter.push($(this).val());
                     for($i=0; $i<=filter.length; $i++) {
                        console.log(filter[$i]);
                     }
                  })
                  return filter;
               }

               $('.selection').click(function(){
                  filter_data();
               })
            })
            </script>

            <div id="numberpage">
               <ul>
                  <li><a href="#" id="choose">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
               </ul>
            </div>

         </div>
      </div>



      <div id="cart-div-control" class="hidden">
         <div id="icon-controler">
            <a id="choose-exit"><i class="fa-solid fa-xmark" style="color: #000000;"></i></a>
            <div id="icon-controler-main">
               <a href="#" id="choose1"><i class="fa-solid fa-bag-shopping" style="color: #000000;"></i></a>
               <a href="#"><i class="fa-regular fa-heart" style="color: #000000;"></i></a>
               <a href="#"><i class="fa-sharp fa-solid fa-rotate" style="color: #000000;"></i></a>
            </div>
         </div>
         <div id="limit">
            <div id="text-limit">There products are limit, check out within</div>
            <div class="countdown">
               <div class="digit" id="minutes">5</div><label>:</label>
               <div class="digit" id="seconds">00</div>
            </div>
         </div>

         <div id="product-in-icon-cart">
            <div id="divi-pic">
               <img src="img/37000208_OR_B-450x450.webp" />
               <div id="name-p-in-cart">
                  <p>Product name</p>
                  <p>$95.00 x <b>2</b></p>
               </div>
            </div>
            <a href="#"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>

         </div>

         <div id="sub-total-in-div-cart">
            <p><b>Sub total</b></p>
            <p><b>$290.00</b></p>
         </div>

         <div id="Button-Viewcart-checkout">
            <a href="#" id="Viewcart">
               <li>View cart</li>
            </a>
            <a href="#" id="Viewcart">
               <li>Check out</li>
            </a>
         </div>

      </div>
   </div>
   <div>
      <?php include('../view/footer.php') ?>
   </div>
   <script>
      const element = document.getElementById("circal");
      element.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("disapp");
         document1.classList.toggle('visible');
         document1.classList.toggle('hidden');
      }
   </script>
   <script>
      const element1 = document.getElementById("circal1");
      element1.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("disapp1");
         document1.classList.toggle('visible');
         document1.classList.toggle('hidden');
      }
   </script>
   <script>
      const element2 = document.getElementById("circal2");
      element2.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("disapp2");
         document1.classList.toggle('visible');
         document1.classList.toggle('hidden');
      }
   </script>
   <script>
      const element3 = document.getElementById("circal3");
      element3.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("disapp3");
         document1.classList.toggle('visible');
         document1.classList.toggle('hidden');
      }
   </script>
   <!-- icon-cart -->
   <script>
      const element4 = document.getElementById("choose-cart");
      element4.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("cart-div-control");
         document1.classList.toggle('visible');
      }
      const element5 = document.getElementById("choose-exit");
      element5.addEventListener("click", myFunction);

      function myFunction() {
         const document1 = document.getElementById("cart-div-control");
         document1.classList.toggle('hidden');
      }
   </script>
   <script>
      let totalSeconds = 5 * 60;
      let minutesDisplay = document.getElementById('minutes');
      let secondsDisplay = document.getElementById('seconds');

      function updateDisplay() {
         let minutes = Math.floor(totalSeconds / 60);
         let seconds = totalSeconds % 60;

         minutesDisplay.textContent = minutes;
         secondsDisplay.textContent = seconds;
      }

      function countdownTimer() {
         if (totalSeconds <= 0) {
            clearInterval(countdown);
            return;
         }
         totalSeconds--;
         updateDisplay();
      }

      let countdown = setInterval(countdownTimer, 1000);
   </script>

   <!-- login- Register -->
   <div id="log-in-cart" class="hidden">
      <div style="display: flex;">
         <div id="right-icon-login">
            <a id="choose-exit-login"><i class="fa-solid fa-xmark" style="color: #000000;"></i></a>
            <span id="text-logo">GODTHISM</span>
         </div>

         <div id="left-form-login">
            <div id="title-login">
               <div id="tt-Signin">Sign in</div>
               <div id="tt-Register">Register</div>
            </div>
            <div id="form-login">
               <form action method="post">
                  <div id="Form-login-input">
                     <label>Email *</label>
                     <input id="user-email" type="email">
                  </div>
                  <div id="Form-login-input">
                     <label>Password *</label>
                     <input id="password" type="password">
                  </div>
                  <div id="checkbox-Remember">
                     <input type="checkbox" name id="remember">
                     <label> Remember me</label>
                  </div>
                  <div id="submit-login-main">
                     <input id="submit-login" type="submit" value="Login">
                  </div>
               </form>
               <a href id="Lostpass">Lost your password ?</a>
            </div>

            <div id="form-login1" class="hidden">
               <form action method="post">
                  <div id="Form-login-input">
                     <label> Username </label>
                     <input id="user-email" type="email">
                  </div>
                  <div id="Form-login-input">
                     <label> Email </label>
                     <input id="user-email" type="email">
                  </div>
                  <center> <label id="regis">A password will be sent
                        to your
                        email
                        address.</label><br>
                     <label id="regis">Your personal data will be
                        used to
                        support
                        your
                        experience throughout this website,
                        to manage access to your account, and for
                        other
                        purposes described in our privacy policy.</label>
                  </center>
                  <div id="submit-login-main">
                     <input id="submit-login" type="submit" value="Register">
                  </div>
               </form>

            </div>

         </div>
      </div>
   </div>
   <script>
      const element6 = document.getElementById("tt-Register");
      element6.addEventListener("click", myFunction);

      function myFunction() {
         const document61 = document.getElementById("form-login");
         const document62 = document.getElementById("form-login1");

         document61.classList.toggle('hidden')
         document62.classList.toggle('hidden');

      }
      const element7 = document.getElementById("tt-Signin");
      element7.addEventListener("click", myFunction);

      function myFunction() {
         const document71 = document.getElementById("form-login");
         const document72 = document.getElementById("form-login1");

         document71.classList.toggle('hidden')
         document72.classList.toggle('hidden');

      }
   </script>
   <script>
      const element8 = document.getElementById("choose-exit-login");
      element8.addEventListener("click", myFunction);

      function myFunction() {
         const document8 = document.getElementById("log-in-cart");
         document8.classList.toggle('hidden')


      }
      const element9 = document.getElementById("log-in-user");
      element9.addEventListener("click", myFunction);

      function myFunction() {
         const document9 = document.getElementById("log-in-cart");
         document9.classList.toggle('hidden')


      }
   </script>


</body>

</html>