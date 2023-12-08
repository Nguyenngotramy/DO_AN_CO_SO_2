<?php
 class ProductDetail{
    private $productID;
    private $materialID;
    private $sizeID;
    private $colorID;
    private $weight;

    private $quantity;
    private $price;

    public function __construct(){
        $this->productID = 0;
        $this->materialID = 0;
        $this->sizeID = 0;
        $this->colorID = 0;
        $this->weight = 0;
        $this->quantity = 0;
        $this->price = 0;
    }
    public function getProductID(){
        return $this->productID;
    }
    public function setProductId($productID){
        $this->productID = $productID;
    }
    public function getMaterialID(){
        return $this->materialID;
        }
    public function setMaterialID($materialID){
        $this->materialID=$materialID;
    }
    public function getSizeID(){
        return $this->sizeID;
    }
    public function setSizeID($sizeID){
        $this->sizeID=$sizeID;
        }
     public function getColorID(){
        return $this->colorID;
        }
    public function setColorID($colorID){
        $this->colorID=$colorID;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function setWeight($weight){
        $this->weight=$weight;
    }
    public function getQuantity(){
        return $this->quantity;
        }
    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }
     
    public function getPrice(){
        return $this->price;
        }
    public function setPrice($price){
        $this->price=$price;
    }
    
       


 }

  class Productimg{
    private $idProduct;
    private $img;

    public function __construct(){
        $this->idProduct = 0;
        $this->img = "";
    }
    public function getIdProduct(){
        return $this->idProduct;
    }
    public function setIdProduct($idProduct){
        $this->idProduct=$idProduct;
    }
    public function getImg(){
        return $this->img;
    }
    public function setImg($img){
        $this->img=$img;
    }

 }