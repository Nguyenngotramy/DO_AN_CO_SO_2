<?php

class Product{
    private $productID;
    private $productName;
    private $description;
    private $origin;
    private $categoryID;
    public function __construct(){
        $this->productID = "";
        $this->productName = "";
        $this->description = "";
        $this->origin = "";
        $this->categoryID =0;
   }
    //getter and setters
    public function getProductID(){
        return $this->productID;
    }
    public function setProductID($value){
        $this->productID = $value;
    }
    public function getProductName(){
        return $this->productName;
    }
    public function setProductName($value){
        $this->productName = $value;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($value){
        $this->description = $value;
    }
    public function getOrigin(){
        return $this->origin;
    }
    public function setOrigin($value){
        $this->origin = $value;
    }
    public function getCategoryID(){
        return $this->categoryID;
    }
    public function setCategoryID($value){
        $this->categoryID = $value;
    }
}

?>