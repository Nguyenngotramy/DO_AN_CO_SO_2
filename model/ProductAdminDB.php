<?php
include_once("../database/connecttemp.php");
include_once("../model/addProductModel.php");
include_once("../model/addProductDetailModel.php");
class ProductAd{
     function getListProduct(){
        global $db;
        $query = 'SELECT products.productID,products.productName, products.description,products.origin, categories.categoryName
        FROM products 
        INNER JOIN categories on products.categoryID = categories.categoryID
        ORDER BY products.productID ASC';
        $statement = $db->prepare($query);
        $statement->execute();
        $ListProduct = $statement->fetchAll();
        $statement->closeCursor();
        return $ListProduct;
    }
    function Listimg($id){
        global $db;
        $query= 'SELECT image FROM `productimages` WHERE productID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $imageList = $statement->fetchAll();
        $statement->closeCursor();
        return $imageList;
    }
    function getPrice($id){
        global $db;
        $query= 'SELECT price FROM `productdetails` WHERE productID = :id limit 1';
        $statement = $db->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $price = $statement->fetchColumn(); 
    $statement->closeCursor();
    return $price;
    }
    function getProductByID($id){
        global $db;
        $query='SELECT products.productID,products.productName, products.description,products.origin,categories.categoryID, categories.categoryName
        FROM products 
        INNER JOIN categories on products.categoryID = categories.categoryID
         WHERE productID = :id ';
        $statement = $db->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $productByID = $statement->fetch(PDO::FETCH_ASSOC); 
    $statement->closeCursor();
    return $productByID;
    }
    function getVariousByID($id){
        global $db;
        $query = 'SELECT productdetails.id, material.materialID,size.sizeID ,color.colorID, material.materialName,size.size, color.color
        FROM productdetails 
        INNER JOIN material on productdetails.materialID = material.materialID
         INNER JOIN size on productdetails.sizeID = size.sizeID 
         INNER JOIN color on productdetails.colorID = color.colorID 
         WHERE productdetails.productID= :id ';
         $statement = $db->prepare($query);
          $statement->bindValue(":id",$id);
          $statement->execute();
          $various = $statement->fetchAll();  
      $statement->closeCursor();
      return $various;
    }
    function getWeightQuantitypriceID($id){
        global $db;
        $query = 'SELECT  productdetails.weight,productdetails.quantity,productdetails.price
        FROM productdetails 
         WHERE productdetails.productID= :id';
         $statement = $db->prepare($query);
          $statement->bindValue(":id",$id);
          $statement->execute();
          $various = $statement->fetch(PDO::FETCH_ASSOC); 
      $statement->closeCursor();
      return $various;
    }



    public static function UpdateProduct($product, $id) {
        global $db;
    
        $productName = $product->getProductName();
        $description = $product->getDescription();
        $origin = $product->getOrigin();
        $categoryID = $product->getCategoryID();
    
        $query = 'UPDATE `products`
                  SET `productName` = :productName, `description` = :description, `origin` = :origin, `categoryID` = :categoryID
                  WHERE `productID` = :id';
    
        try {
    
            $statement = $db->prepare($query);
            $statement->bindValue(':productName', $productName);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':origin', $origin);
            $statement->bindValue(':categoryID', $categoryID);
            $statement->bindValue(':id', $id);
    
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
    
            $db->commit();
            $statement->closeCursor();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public static function UpdateProductDetail($product, $id) {
        global $db;
    
        $productID = $product->getProductID();
        $materialID = $product->getMaterialID();
        $sizeID = $product->getSizeID();
        $colorID = $product->getColorID();
    
        $query = 'UPDATE `productdetails` 
                  SET `materialID` = :materialID, `sizeID` = :sizeID, `colorID` = :colorID 
                  WHERE `id` = :id AND `productID` = :productID
                  ORDER BY `productdetails`.`id` ASC ';
    
        try {
            $statement = $db->prepare($query);
    
            $statement->bindValue(':materialID', $materialID);
            $statement->bindValue(':sizeID', $sizeID);
            $statement->bindValue(':colorID', $colorID);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':productID', $productID);
    
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
    
            $statement->closeCursor();
        } catch (Exception $e) {
            // Handle the error (log, redirect, etc.) instead of echoing it directly
            echo 'Error: ' . $e->getMessage();
        }
    }
    public static function UpdateWQPDetail($product,$id) {
        global $db;
        $weight = $product->getWeight();
        $quantity = $product->getQuantity();
        $price = $product->getPrice();

        $query = 'UPDATE `productdetails` SET`weight`=:weight,`quantity`=:quantity,`price`=:price WHERE  `productID`=:id';
        
        try {
            $statement = $db->prepare($query);
         
            $statement->bindValue(':weight', $weight);
            $statement->bindValue(':quantity', $quantity);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':id', $id);
            
            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }
            
            $statement->closeCursor();
        } catch (Exception $e) {
            // Xử lý lỗi theo nhu cầu của bạn
            echo 'Error: ' . $e->getMessage();
        }
     }

    //  public static function Updateimg($product,$id) {
    //     global $db;
    //     $weight = $product->getWeight();
    //     $quantity = $product->getQuantity();
    //     $price = $product->getPrice();

    //     $query = 'UPDATE `productimages` SET `image`=:img WHERE `id`=1 AND `productID`=1';
        
    //     try {
    //         $statement = $db->prepare($query);
         
    //         $statement->bindValue(':weight', $weight);
    //         $statement->bindValue(':quantity', $quantity);
    //         $statement->bindValue(':price', $price);
    //         $statement->bindValue(':id', $id);
            
    //         if (!$statement->execute()) {
    //             throw new Exception('Error executing SQL statement.');
    //         }
            
    //         $statement->closeCursor();
    //     } catch (Exception $e) {
    //         // Xử lý lỗi theo nhu cầu của bạn
    //         echo 'Error: ' . $e->getMessage();
    //     }
    //  }
    
    function deleteProduct($idProduct){
        global $db;
        
        $query ='DELETE FROM `products` WHERE ProductID = :id; DELETE FROM productdetails WHERE ProductID = :id';
    }

}