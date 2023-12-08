<?php
include_once("../model/addProductDB.php");
include_once("../model/addProductDetailModel.php");
include_once("../model/addProductModel.php");


$AddPDB = new AddProductDB();

$action = filter_input(INPUT_POST, 'action');
if ($action == 'add_product') {
    
    $nameproduct = filter_input(INPUT_POST, 'nameproduct');
    $description = filter_input(INPUT_POST, 'description');  
    $Originproduct = filter_input(INPUT_POST, 'Originproduct');
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    
    if ($nameproduct == NULL || $description == NULL || $Originproduct == NULL || $categoryID === false) {
        $error = "Invalid product data. Check all fields and try again.";
    } else {
        $product = new Product();
        $product->setProductName($nameproduct);
        $product->setDescription($description);
        $product->setOrigin($Originproduct);
        $product->setCategoryID($categoryID);

        // Add the Product object to the database
        $AddPDB->addProduct($product);
    
        $success = "Product added successfully!";
        
        header("Location: ../view/addProducts.php");
        exit();
    }
}
?>
