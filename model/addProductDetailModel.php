<?
 class addProductDetail{
    private $productID;
    private $material;
    private $size;
    private $color;
    private $weight;

    private $quantity;
    private $price;

    public function __construct($productID,$material,$size,$color,$weight,$quantity,$price){
        $this->productID = $productID;
        $this->material = $material;
        $this->size = $size;
        $this->color = $color;
        $this->weight = $weight;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    public function getMaterial(){
        return $this->material;
        }
    public function setMaterial($material){
        $this->material=$material;
    }
    public function getSize(){
        return $this->size;
    }
    public function setSize($size){
        $this->size=$size;
        }
     public function getColor(){
        return $this->color;
        }
    public function setColor($color){
        $this->color=$color;
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