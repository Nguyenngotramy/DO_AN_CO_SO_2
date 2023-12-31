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
   <link rel=" stylesheet" href="../view/app.css">
   <link rel=" stylesheet" href="../view/css/checkout.css">
   <link rel=" stylesheet" href="../view/css/login_register.css">
   <script src="../view/script.js"></script>
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
                        <input type="checkbox" value="<?php echo $category['categoryName'] ?>" id="categoryName"
                           class="selection categoryName-select">
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
                        <input type="checkbox" value="<?php echo $color['color'] ?>" id="color"
                           class="selection color-select">
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
                  foreach ($sizeList as $size) {
                     ?>
                     <div id="By">
                        <span>
                           <?php echo $size['size'] ?>
                        </span>
                        <input type="checkbox" value="<?php echo $size['size'] ?>" id="size" class="selection size-select">
                     </div>
                  <?php } ?>
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
                     <li id="seemore" style="width: 40%">See More Products</li>
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
                     <li><i class="fa-solid fa-ranking-star" style="color: #4d8eff;"></i>TOP RATED</li>
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
                  <!--chỗ để hiện sp nè-->

            </div>
            <script>
               $(document).ready(function () {
                  filter_data();
                  var pageNumber;

                  function selectPage(link) {
                     pageNumber = link.dataset.page;
                     console.log(pageNumber);
                  }

                  function filter_data() {
                     var action = 'getdata';
                     var categoryName = get_filter('categoryName-select');
                     var size = get_filter('size-select');
                     var color = get_filter('color-select');
                     var page = pageNumber;
                     console.log(page);
                     $.ajax({
                        url: "getdata.php",
                        method: "POST",
                        data: { action: action, categoryName: categoryName, size: size, color: color, pageNumber: pageNumber},
                        success: function (data) {
                           $('.product-shop').html(data); // hiện sp ra chỗ div class product-shop
                        }
                     });
                  }

                  function get_filter(class_name) {
                     var filter = [];
                     $('.' + class_name + ':checked').each(function () {
                        filter.push($(this).val());
                        for ($i = 0; $i <= filter.length; $i++) {
                           console.log(filter[$i]);
                        }
                     })
                     return filter;
                  }

                  $('.selection').click(function () {
                     filter_data();
                  })

                  $('a.pageNumber').click(function () {
                     selectPage(this);
                     filter_data();
                  });
               })
            </script>

            <div id="numberpage" style="margin-top: 30px">
               <ul>
                  <?php
                  $limit = 12;
                  $count = countProduct();
                  $total_page = ceil($count / $limit);
                  for ($i = 1; $i <= $total_page; $i++) {
                     ?>
                     <li><a href="#" name="pageNumber" class="pageNumber" data-page="<?php echo $i ?>">
                           <?php echo $i ?>
                        </a></li>
                  <?php } ?>
               </ul>
            </div>

         </div>
      </div>



      <div>
         <?php include('../view/checkout.php') ?>
      </div>


      <div>
         <?php include('login_register.php') ?>
      </div>
   </div>
   <?php include('../view/footer.php') ?>

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

</body>

</html>