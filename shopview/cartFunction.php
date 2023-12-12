<?php
    function showCartItems() {
        $cartHTML = '';
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $pd) {
                if (is_array($pd)) {
                    $cartHTML .= '<div id="product-in-icon-cart">
                    <div id="divi-pic">
                       <img src="'.$pd[1].'" />
                       <div id="name-p-in-cart">
                          <p>'.$pd[2].'</p>
                          <p>$'.$pd[3].' x <b>'.$pd[4].'</b></p>
                       </div>
                    </div>
                    <a class="delete" data-page="'.$pd[0].'"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
              
                 </div>';
                }
            }
        }
        return $cartHTML;
    }

    function total() {
        $total = 0;
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $pd) {
                if (is_array($pd)) {
                    $tien = 0;
                    $tien = $pd[3]*$pd[4];
                    $total += $tien;
                }
            }
            $total = number_format($total, 2);
            return $total;
        }
    }
    
    function deleteItem($pdID){
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productKey => $p) {
            if (is_array($p)) {
                if ($p[0] === $pdID) {
                    unset($_SESSION['cart'][$productKey]);
                }

            }
        }
    }
}
?>