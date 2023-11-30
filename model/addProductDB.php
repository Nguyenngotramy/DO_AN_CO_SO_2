<?php

include_once("../database/connecttemp.php");
include_once("../model/addProductDetailModel.php");
include_once("../model/addProductModel.php");

class AddProductDB {
    public static function addProduct($product) {
       global $db;
        $productID = $product->getProductID();
        $productName = $product->getProductName();
        $description = $product->getDescription();
        $origin = $product->getOrigin();
        $categoryID = $product->getCategoryID();

        $query = 'INSERT INTO products
                     (productName, description, origin, categoryID)
                  VALUES
                     (:productName, :description, :origin, :categoryID)';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':productName', $productName);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':origin', $origin);
            $statement->bindValue(':categoryID', $categoryID);
            
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
            
            $statement->closeCursor();
        } catch (Exception $e) {
            // Xử lý lỗi theo nhu cầu của bạn
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function addProductDetail($product) {
        global $db;
        $productID = $product->getProductID();
        $material = $product->getMaterial();
        $size = $product->getSize();
        $color = $product->getColor();
        $weight = $product->getWeight();
        $quantity = $product->getQuantity();
        $price = $product->getPrice();

        $query = 'INSERT INTO productdetails
                     (productID, material, size, color, weight, quantity, price)
                  VALUES
                     (:productID, :material, :size, :color, :weight, :quantity, :price)';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':productID', $productID);
            $statement->bindValue(':material', $material);
            $statement->bindValue(':size', $size);
            $statement->bindValue(':color', $color);
            $statement->bindValue(':weight', $weight);
            $statement->bindValue(':quantity', $quantity);
            $statement->bindValue(':price', $price);
            
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
            
            $statement->closeCursor();
        } catch (Exception $e) {
            // Xử lý lỗi theo nhu cầu của bạn
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
