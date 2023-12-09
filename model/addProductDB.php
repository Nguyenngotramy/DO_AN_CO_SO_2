<?php

include_once("../database/connecttemp.php");
include_once("../model/addProductDetailModel.php");
include_once("../model/addProductModel.php");
include_once("../model/varitiesModel.php");

class AddProductDB {
    public static function addProduct($product) {
        global $db;
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
   
public function getcoloritem() {
    global $db;
    
    $query = 'SELECT * FROM color';
    try {
        $statement = $db->prepare($query);
        
        // Execute the prepared statement
        $statement->execute();
        
        $colors = array();
        
        foreach ($statement as $result) {
            $color = new Color();
            $color->setIDcolor($result['colorID']);
            $color->setColor($result['color']);
            $colors[] = $color;
        }

        $statement->closeCursor();
        return $colors;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
public function getmaterialitem() {
    global $db;
    $query = 'SELECT * FROM material';
    try {
        $statement = $db->prepare($query);
        
        // Execute the prepared statement
        $statement->execute();
        
        $materials = array();
        
        foreach ($statement as $result) {
            $material = new Material();
            $material->setMaterialID($result['materialID']);
            $material->setMaterialName($result['materialName']);
            $materials[] = $material;
        }

        $statement->closeCursor();
        return $materials;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

public function getSizeitem() {
    global $db;
    
    $query = 'SELECT * FROM size';
    try {
        $statement = $db->prepare($query);
        
        // Execute the prepared statement
        $statement->execute();
        
        $sizes = array();
        
        foreach ($statement as $result) {
            $size = new Size();
            $size->setsizeID($result['sizeID']);
            $size->setsizeName($result['size']);
            $sizes[] = $size;
        }

        $statement->closeCursor();
        return $sizes;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    public static function addProductDetail($product) {
        global $db;

        $productID = $product->getProductID();
        $materialID = $product->getMaterialID();
        $sizeID = $product->getSizeID();
        $colorID = $product->getColorID();
        $weight = $product->getWeight();
        $quantity = $product->getQuantity();
        $price = $product->getPrice();

        $query = 'INSERT INTO productdetails ( productID, materialID, sizeID, colorID, weight, quantity, price)
         VALUES  (:productID, :materialID, :sizeID, :colorID, :weight, :quantity, :price)';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':productID', $productID);
            $statement->bindValue(':materialID', $materialID);
            $statement->bindValue(':sizeID', $sizeID);
            $statement->bindValue(':colorID', $colorID);
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
    

     public static function getIDproduct($productName, $description, $origin, $categoryID) {
        global $db;
    
        $query = 'SELECT productID FROM products WHERE productName = :productName AND description = :description AND origin = :origin AND categoryID = :categoryID';
    
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':productName', $productName);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':origin', $origin);
            $statement->bindValue(':categoryID', $categoryID);
    
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
    
            $row = $statement->fetch(PDO::FETCH_ASSOC); // Fetch as an associative array
            $statement->closeCursor();
    
            return $row;
        } catch (Exception $e) {
            // Log or handle the error appropriately
            echo 'Error: ' . $e->getMessage();
            return null;  // Return a specific value to indicate an error
        }
    }
    public static function uploadimg($image){
        global $db;
        $productID= $image->getIdProduct();
        $imageName = $image->getImg();
        $query = 'INSERT INTO productimages( productID, image) VALUES (:productID,:image)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':productID', $productID);
            $statement->bindValue(':image', $imageName);
            $statement->closeCursor();
            $statement->execute();
    } catch (Exception $e) {
    echo ''. $e->getMessage();
    }

}
}