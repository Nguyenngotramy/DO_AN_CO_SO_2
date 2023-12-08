<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="/https://www.flaticon.com/uicons/interface-icons/css/uicons-rounded-regular.css" rel="stylesheet">
  <link href="/your-path-to-uicons/css/uicons-rounded-bold.css" rel="stylesheet">
  <link href="/your-path-to-uicons/css/uicons-rounded-solid.css" rel="stylesheet">
  <link rel="stylesheet" href="../view/css/styleshop.css">
  <link rel="stylesheet" href="../view/css/stylecart.css">
  <link rel=" stylesheet" href="../view/css/checkout.css">
   <link rel=" stylesheet" href="../view/css/login_register.css">
   <script src="script.js"></script>
</head>

<body>

  <div id="wrapper" class="page-wrapper">
    <!-- <div id="header-social">
      <div>
        <div id="social-fty">
          <a href="#"><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
          <a href="#"><i class="fa-brands fa-twitter" style="color: #ffffff;"></i></a>
          <a href="#"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a>
        </div>

        <b>Free shipping on all orders over 1 milion </b>
        <ul id="icon-text-list">
          <a href="#">
            <li><span>CART</span></li>
          </a>
          <a href="#">
            <li><span>SEARCH</span></li>
          </a>
          <a href="#">
            <li><span>HELP</span></li>
          </a>
        </ul>
      </div>
    </div>

    <div id="menu-main">
      <div>
        <ul id="menu">
          <a href="#">
            <li><span>HOME</span></li>
          </a>
          <a href="#">
            <li><span id="choose">SHOP</span></li>
          </a>
          <a href="#">
            <li><span>PRODUCT</span></li>
          </a>
          <a href="#">
            <li><span>PRODUCT</span></li>
          </a>
          <a href="#">
            <li><span>PRODUCT</span></li>
          </a>
        </ul>
        <span id="header-text-logo">GODTHISM</span>
        <div id="menu-logo">
          <a href="#" id="first"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></a>
          <a href="#"><i class="fa-solid fa-bag-shopping" style="color: #000000;"></i></a>
          <a href="#"><i class="fa-regular fa-heart" style="color: #000000;"></i></a>
          <a href="#"><i class="fa-sharp fa-solid fa-rotate" style="color: #000000;"></i></a>
          <a href="#"><i class="fa-regular fa-user" style="color: #000000;"></i></a>
          <a href="#" id="last"><i class="fa-solid fa-bars" style="color: #000000;"></i></a>
        </div>
      </div>
    </div> -->
    <div>
      <?php include('../view/checkout.php') ?>
   </div>

    
   <div>
      <?php include('../view/login_register.php') ?>
   </div>
    <?php include('../view/header.php')?>
  
      
    <div id="title-cart">
      <ul>
        <a>
          <li id="choose"><span>HOME</span></li>
        </a>
        <a>
          <li><span>CART</span></li>
        </a>
      </ul>
      <h1>Cart</h1>
    </div>

    <div id="maincart">
      <div id="maincart-left">

        <div id="product-in-cart">
          <div id="divi-pic">
            <img src="img/37000208_OR_B-450x450.webp" />
            <div id="name-p-in-cart">
              <p>Product name</p>
              <p>$95.00 x <b>2</b></p>
            </div>
          </div>

          <div id="quantity-selector">
            <button id="quantity-button" onclick="decreaseQuantity()">-</button>
            <span id="quantity">1</span>
            <button id="quantity-button" onclick="increaseQuantity()">+</button>
          </div>

          <p id="price-p-in-cart">$95.00</p>
          <a href="#"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>

        </div>

        <div id="Coupo">
          <form action="" method="post">
            <input id="coupo-code" type="text" placeholder="Coupon code">
            <input id="submit" type="submit" value="Apply coupon">
          </form>
        </div>

      </div>


      <div id="maincart-right">
        <div id="contaner-cart-total">
          <div id="cart-total">
            <h2>Cart Total</h2>
            <div id="sub-total">
              <p>Sub total</p>
              <p>$290.00</p>
            </div>
            <div id="shipping">
              <span>Shipping</span>
              <div id="flat-race">
                <span>Flat race</span>
                <span><b>$25.00</b></span>
              </div>
              <div id="address">
                <span>Shipping to:</spanp>
                  <span>Thon Sen - Hoa Trach - Bo Trach - Quang Binh</span>
              </div>
              <div id="change-address">

                <a>
                  <li id="ch-address">Change address</li>
                </a>

                <div id="add-r" class="hidden">
                  <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                    <option value="" selected>Province/City</option>
                  </select>

                  <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                    <option value="" selected>District</option>
                  </select>

                  <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                    <option value="" selected>Ward</option>
                  </select>
                </div>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                <script>
                  var citis = document.getElementById("city");
                  var districts = document.getElementById("district");
                  var wards = document.getElementById("ward");
                  var Parameter = {
                    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
                    method: "GET",
                    responseType: "application/json",
                  };
                  var promise = axios(Parameter);
                  promise.then(function (result) {
                    renderCity(result.data);
                  });

                  function renderCity(data) {
                    for (const x of data) {
                      citis.options[citis.options.length] = new Option(x.Name, x.Id);
                    }
                    citis.onchange = function () {
                      district.length = 1;
                      ward.length = 1;
                      if (this.value != "") {
                        const result = data.filter(n => n.Id === this.value);

                        for (const k of result[0].Districts) {
                          district.options[district.options.length] = new Option(k.Name, k.Id);
                        }
                      }
                    };
                    district.onchange = function () {
                      ward.length = 1;
                      const dataCity = data.filter((n) => n.Id === citis.value);
                      if (this.value != "") {
                        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                        for (const w of dataWards) {
                          wards.options[wards.options.length] = new Option(w.Name, w.Id);
                        }
                      }
                    };
                  }
                </script>
                <div style="display: grid;">
                  <input id="Zipcode" type="text" placeholder="ZIP CODE" />
                  <input id="Update" type="submit" value="Update" />
                </div>
              </div>

            </div>
          </div>

          <div id="all-total">
            <p>Total</p>
            <p>$300.00</p>
          </div>
          <a href="#" id="P-to-checkout">
            <li>Proceed to check out</li>
          </a>

        </div>
      </div>
    </div>
    <!-- You may be interested In -->
    <div id="intersted-in">
      <h2>You may be interested In</h2>
      <div id="intersted">

        <div id="product-detail">
          <div id="image">
            <img src="img/37000208_OR_B-450x450.webp" alt="Không tín hiệu">
            <div id="icon-product">
              <a href="#"><i class="fa-regular fa-heart" style="color: #000000;"></i></a>
              <a href="#" id="hidden"><i class="fa-solid fa-rotate" style="color: #000000;"></i></a>
              <a href="#" id="hidden"><i class="fa-regular fa-eye" style="color: #000000;"></i></i></a>
            </div>
            <a href="#">
              <li id="readmore">Read more</li>
            </a>
          </div>
          <a href="">
            <li id="name-product">The Air Scoop-Neck Tee</li>
          </a>
          <p id="price-product">$95.00</p>
        </div>

        <div id="product-detail">
          <div id="image">
            <img src="img/37000208_OR_B-450x450.webp" alt="Không tín hiệu">
            <div id="icon-product">
              <a href="#"><i class="fa-regular fa-heart" style="color: #000000;"></i></a>
              <a href="#" id="hidden"><i class="fa-solid fa-rotate" style="color: #000000;"></i></a>
              <a href="#" id="hidden"><i class="fa-regular fa-eye" style="color: #000000;"></i></i></a>
            </div>
            <a href="#">
              <li id="readmore">Read more</li>
            </a>
          </div>
          <a href="">
            <li id="name-product">The Air Scoop-Neck Tee</li>
          </a>
          <p id="price-product">$95.00</p>
        </div>


      </div>
    </div>
    <script>
      const element = document.getElementById("ch-address");
      element.addEventListener("click", myFunction);

      function myFunction() {
        console.log("Click event triggered");
        const document1 = document.getElementById("add-r");
        document1.classList.toggle('visible');
        document1.classList.toggle('hidden');
      }
    </script>


    <div id="contact">
      <div id="phone">
        <h3>CUSTOMER SERVICES</h3>
        <h1>(+777) 450-15-415</h1>
        <p>Monday-Friday: 9:00-20:00</p>
      </div>
      <div id="email">
        <h3>NEWSLETTER</h3>
        <form action="" method="post">
          <input id="y-email" type="email" placeholder="Your-Email">
          <input id="submit" type="submit">
        </form>
        <h3>Sign up to get the latest on new Products, Promotions, Design news and more</h3>
      </div>
    </div>

  </div>


  </div>
  <script>
    let quantity = 1;

    function increaseQuantity() {
      quantity++;
      updateQuantity();
    }

    function decreaseQuantity() {
      if (quantity > 1) {
        quantity--;
        updateQuantity();
      }
    }

    function updateQuantity() {
      const quantityElement = document.querySelector('#quantity');
      quantityElement.textContent = quantity;
    }
  </script>
</body>

</html>