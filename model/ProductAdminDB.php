<?php
include_once("../database/connecttemp.php");
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
        $query = 'SELECT material.materialID,size.sizeID ,color.colorID, material.materialName,size.size, color.color
        FROM productdetails 
        INNER JOIN material on productdetails.materialID = material.materialID
         INNER JOIN size on productdetails.sizeID = size.sizeID 
         INNER JOIN color on productdetails.colorID = color.colorID 
         WHERE productdetails.productID= :id';
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
    
    function deleteProduct($idProduct){
        global $db;
        
        $query ='DELETE FROM `products` WHERE ProductID = :id; DELETE FROM productdetails WHERE ProductID = :id';
    }

}