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
        $AddPDB->addProduct($product);

      
        $productIDResult = $AddPDB->getIDproduct($nameproduct, $description, $Originproduct, $categoryID);

        if ($productIDResult !== null && is_array($productIDResult) && isset($productIDResult['productID'])) {
            $productIDVariable = $productIDResult['productID'];

            if ($productIDVariable) {
                $success = "Product added successfully!";
            
                
                foreach ($_POST['variants'] as $variant) {
                    $materialID = $variant['material_id'];
                    $sizeID = $variant['size_id'];
                    $colorID = $variant['color_id'];
            
                        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT);
                        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
                        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
            
                        if ($materialID === false || $sizeID === false || $colorID === false || $weight === false || $quantity === false || $price === false) {
                            throw new Exception("Invalid product data. Check all fields and try again.");
                        }
            
                        $productdetail = new ProductDetail();
                        $productdetail->setProductID($productIDVariable);
                        $productdetail->setMaterialID($materialID);
                        $productdetail->setSizeID($sizeID);
                        $productdetail->setColorID($colorID);
                        $productdetail->setWeight($weight);
                        $productdetail->setQuantity($quantity);
                        $productdetail->setPrice($price);
                        $AddPDB->addProductDetail($productdetail);
                        $uploadDir = 'C:/xampp/htdocs/DO_AN_CO_SO_2/view/img/';
                        $uploadedFileName = $_FILES['img']['name'];
                        $uploadPath = $uploadDir . $uploadedFileName;
                        
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadPath)) {
                            // File đã được tải lên thành công, thêm vào cơ sở dữ liệu
                            $img = new Productimg();
                            $img->setIdProduct($productIDVariable);
                            $img->setImg($uploadedFileName);  // Lưu tên file, không phải đường dẫn đầy đủ
                        
                            $AddPDB->uploadimg($img);
                        } else {
                            // Quá trình tải lên không thành công, xử lý lỗi nếu cần
                            echo "Upload failed!";
                        }
                        
                    }
                } else {
                    throw new Exception("Invalid variants data. Check all fields and try again.");
                }
            } else {
                throw new Exception("Invalid product data. Check all fields and try again.");
            }
            
       
        header("Location: ../view/addProducts.php");
        exit();
    } 
}

?>
