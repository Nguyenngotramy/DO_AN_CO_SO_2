<?php
    require_once("../database/connecttemp.php");
    if(isset($_POST['action'])) {
        global $db;
        $query = "SELECT products.productID, products.productName, products.categoryID, color.color, size.size, productimages.image, productdetails.price
        FROM products
        INNER JOIN categories ON categories.categoryID = products.categoryID
        INNER JOIN productimages ON products.productID = productimages.productID
        INNER JOIN productdetails ON products.productID = productdetails.productID
        INNER JOIN color ON color.colorID = productdetails.colorID
        INNER JOIN size ON size.sizeID = productdetails.sizeID
        WHERE products.productID is not NULL";
        if(isset($_POST['categoryName'])) {
            $categoryName_filter = implode("','", $_POST['categoryName']);
            $query .= " AND categories.categoryName IN ('".$categoryName_filter."')";
        }
        if(isset($_POST['color'])) {
            $color_filter = implode("','", $_POST['color']);
            $query .= " AND color.color IN ('".$color_filter."')";
        }
        if(isset($_POST['size'])) {
            $size_filter = implode("','", $_POST['size']);
            $query .= " AND size.size IN ('".$size_filter."')";
        }
        // echo $query;
        $query .= " GROUP BY products.productID";
        $statement = $db->prepare($query);
        $statement->execute();
        $productList = $statement->fetchAll();
        $result = $statement->rowCount();
        $output = '';
        if($result>0) {
        foreach($productList as $product) {
            $output .= '<div id="product-detail">
            <div id="image">
               <img src="'.$product['image'].'" alt="Không tín hiệu">
               <div id="icon-product">
                  <a href="#"><i class="fa-regular fa-heart" style="color: #000000;"></i></a>
                  <a href="#" id="hidden"><i class="fa-solid fa-rotate" style="color: #000000;"></i></a>
                  <a href="#" id="hidden"><i class="fa-regular fa-eye" style="color: #000000;"></i></i></a>
               </div>
               <a href="product-detail.php?productID='.$product['productID'].'">
                  <li id="readmore">Read more</li>
               </a>
            </div>
            <a href="">
               <li id="name-product">
               '.$product['productName'].'
               </li>
            </a>
            <p id="price-product">
            '.$product['price'].'
            </p>

         </div>';
        }
    } else {
        $output = 'Product not found!';
    }
        $statement->closeCursor();
        echo $output;
    }
?>