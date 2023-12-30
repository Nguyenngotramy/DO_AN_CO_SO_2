<div id="cart-div-control">
   <div id="icon-controler">
      <a id="choose-exit"><i onclick="myFunctionExit()" class="fa-solid fa-xmark" style="color: #000000;"></i></a>
      <div id="icon-controler-main">
         <div>
            <div class="circle" id="amount"></div>
            <i class="material-symbols-outlined">shopping_bag</i>
         </div>
         <div>
            <div class="circle">1</div>
            <i class="material-symbols-outlined">favorite</i>
         </div>
      </div>
   </div>
   <div id="limit">
      <div id="text-limit">There products are limit, check out within</div>
      <div class="countdown">
         <div class="digit" id="minutes">5</div><label>:</label>
         <div class="digit" id="seconds">00</div>
      </div>
   </div>
   <div id="list">
   <?php
         include('cartFunction.php');
         $cartList = showCartItems();
         echo $cartList;
      ?>
   </div>

   <div id="sub-total-in-div-cart">
      <p><b>Sub total</b></p>
      <p><b id="total"> </b></p>
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

<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        let $pdID = $(this).data('page');
        let $productColor = document.getElementById('productColor').textContent;
        let $productSize = document.getElementById('productSize').textContent;

        console.log($productColor);
        console.log($pdID);
        $.ajax({
            type: "POST",
            url: "deleteItem.php",
            data: {
                pdID: $pdID,
                productColor: $productColor, 
                productSize: $productSize
            },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                var cartHTML = data.html;
                var total = data.total;
                var count = data.count;
                $('#list').empty();
                $('#list').html(cartHTML);
                $('#total').html(total);
                $('#amount').html(count);
            }
        });

    });
</script>