<?php

class Color{
    private $IDcolor;
    private $color;
    public function __construct( ){
    $this->IDcolor = "";
    $this->color = "";
    }
    public function getIDcolor(){
        return $this->IDcolor;
    }
    public function getColor(){
        return $this->color;
    }
    public function setIDcolor($IDcolor){
        $this->IDcolor = $IDcolor;
    }
    public function setColor($color){
        $this->color = $color;
    }


}
class Material{
    private $materialID;
    private $materialName;

    public function __construct(){
        $this->materialID = 0;
        $this->materialName = "";
    }
    public function getIDmaterial(){
        return $this->materialID;
    }
    public function getMaterialName(){
        return $this->materialName;
    }
    public function setMaterialName($materialName){
        $this->materialName = $materialName;
    }
  public function setMaterialID($materialID){
    $this->materialID = $materialID;
}
}
class Size{
    private $sizeID;
    private $sizeName;
    public function __construct(){
        $this->sizeID = 0;
        $this->sizeName = "size";
    }
    public function getSizeID(){
        return $this->sizeID;
    }
    public function setSizeID($sizeID){
        $this->sizeID = $sizeID;
    }
    public function setSizeName($sizeName){
        $this->sizeName = $sizeName;
    }
    public function getSize(){
        return $this->sizeName;
}
}
?>