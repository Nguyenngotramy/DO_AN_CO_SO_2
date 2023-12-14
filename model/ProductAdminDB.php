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
        $query= 'SELECT price FROM `productdetails` where productID = :id limit 1';
        $statement = $db->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $price = $statement->fetchColumn(); // Fetch the price as a single value
    $statement->closeCursor();
    return $price;
    }

}