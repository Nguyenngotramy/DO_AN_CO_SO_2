<?php
    function countProduct() {
        global $db;
        $query = 'SELECT COUNT(*) FROM `products`';
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->fetchColumn();
        $statement->closeCursor();
        return $count;
    }

    function showAllProduct() {
        global $db;
        $query = 'SELECT products.productID, products.productName, products.categoryID, productimages.image, productdetails.price
        FROM products
        INNER JOIN productimages ON products.productID = productimages.productID
        INNER JOIN productdetails ON products.productID = productdetails.productID
        GROUP BY products.productID;';
        $statement = $db->prepare($query);
        $statement->execute();
        $productList = $statement->fetchAll();
        $statement->closeCursor();
        return $productList;
    }

    function showProductPage($start, $limit) {
        global $db;
        $query = "SELECT * FROM `products` LIMIT $start, $limit";
        $statement = $db->prepare($query);
        // $statement->bindValue(1, $start);
        // $statement->bindValue(2, $limit);
        $statement->execute();
        $productList = $statement->fetchAll();
        $statement->closeCursor();
        return $productList;
    }

    function showInforOfProduct($productID) {
        global $db;
        $query = 'SELECT products.*, productdetails.weight, productdetails.price
        FROM products
        INNER JOIN productdetails on products.productID = productdetails.productID
        WHERE products.productID = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $productID);
        $statement->execute();
        $productInfor = $statement->fetch();
        $statement->closeCursor();
        return $productInfor;
    }

    function showDetails($productID) {
        global $db;
        $query = 'SELECT products.productID, productdetails.materialID, size.size, color.color,  productdetails.quantity
        FROM products
        INNER JOIN productdetails on products.productID = productdetails.productID
        INNER JOIN color on productdetails.colorID = color.colorID
        INNER JOIN size on productdetails.sizeID = size.sizeID
        WHERE products.productID = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$productID);
        $statement->execute();
        $productDetails = $statement->fetchAll();
        $statement->closeCursor();
        return $productDetails;
    }

    function showImage($productID) {
        global $db;
        $query = 'SELECT * FROM `productimages` WHERE productID = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$productID);
        $statement->execute();
        $imageList = $statement->fetchAll();
        $statement->closeCursor();
        return $imageList;
    }

    function getAllColor() {
        global $db;
        $query = 'SELECT color.color
        FROM productdetails
        inner JOIN color on productdetails.colorID = color.colorID
        GROUP by color.color';
        $statement = $db->prepare($query);
        $statement->execute();
        $colorList = $statement->fetchAll();
        $statement->closeCursor();
        return $colorList;
    }

    function getAllSize() {
        global $db;
        $query = 'SELECT size.size
        FROM productdetails
        inner JOIN size on productdetails.sizeID = size.sizeID
        GROUP by size.size';
        $statement = $db->prepare($query);
        $statement->execute();
        $sizeList = $statement->fetchAll();
        $statement->closeCursor();
        return $sizeList;
    }

    function createOrder($userID, $firstName, $lastName, $address, $phoneNumber, $orderNotes) {
        global $db;
        $orderID = 0;
        $query = 'INSERT INTO `order`(`userID`, `firstName`, `lastName`, `address`, `phoneNumber`, `orderNotes`, `date`, `status`)
        VALUES (?,?,?,?,?,?, NOW(), 0)';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$userID);
        $statement->bindValue(2,$firstName);
        $statement->bindValue(3,$lastName);
        $statement->bindValue(4,$address);
        $statement->bindValue(5,$phoneNumber);
        $statement->bindValue(6,$orderNotes);
        $statement->execute();
        $orderID = $db->lastInsertId();
        $statement->closeCursor();
        return $orderID;
    }

    function addCartIntoOrder($orderID, $productDetailID, $quantity) {
        global $db;
        $query = 'INSERT INTO `orderdetails`(`idOrder`, `idProductDetails`, `quantity`) VALUES (?,?,?)';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$orderID);
        $statement->bindValue(2,$productDetailID);
        $statement->bindValue(3,$quantity);
        $statement->execute();
        $statement->closeCursor();
    }

    function getProductDetail($productID, $color, $size) {
        global $db;
        $productDetailID = 0;
        $query = 'SELECT id FROM `productdetails`
        INNER JOIN size on size.sizeID = productdetails.sizeID
        INNER JOIN color on color.colorID = productdetails.colorID
        WHERE productdetails.productID = ? and size.size = ? and color.color = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$productID);
        $statement->bindValue(2,$size);
        $statement->bindValue(3,$color);
        $statement->execute();
        $productDetailID = $statement->fetchColumn();
        $statement->closeCursor();
        return $productDetailID;
    }

    function getOrderInfor($orderID) {
        global $db;
        $query = 'SELECT * FROM `order` WHERE idOrder = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1,$orderID);
        $statement->execute();
        $orderInfor = $statement->fetch();
        return $orderInfor;
    }
?>