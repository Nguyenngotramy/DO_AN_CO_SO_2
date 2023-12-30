<?php
include_once("../model/addProductDB.php");
include_once("../model/ProductAdminDB.php");
include_once("../model/addProductDetailModel.php");
include_once("../model/addProductModel.php");
include_once("../model/register_loginDB.php");
include_once("../model/registerModel.php");
include_once("../model/Loss_passDB.php");
include_once("../admin/editProduct.php");
include_once("sendGmail.php");
$AddPDB = new AddProductDB();
$UpdatePDB = new ProductAd();
$Regislogin = new Register_login();
$Lossp = new LossPassDB();
$SendGmail = new sendGmail();

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
            
       
        header("Location: ../admin/addProducts.php");
        exit();
    } 
}

if ($action == 'register_user'){
    $userName = filter_input(INPUT_POST,'Username');
    $email = filter_input(INPUT_POST,'Email');
    $passwordf = filter_input(INPUT_POST,'Password');
    $password = password_hash( $passwordf, PASSWORD_DEFAULT);
    if ($userName == NULL || $email == NULL || $password == NULL){
        $error = "Invalid product data. Check all fields and try again.";
    } else {
        $user = new UserRegister();
        $user->setUsername($userName);
        $user->setEmail($email);
        $user->setPassword($password);
        $Regislogin->register($user);
        $mess = "Register sucess!!";
    }
    
    header("Location: ../shopview/shop.php");
    exit();
}
if ($action == 'login') {
    $email = filter_input(INPUT_POST, 'emaillogin');
    $password = filter_input(INPUT_POST, 'pwlogin');
    session_start();
    ob_start();
    $result =  $Regislogin->getInfor($email);
    $pw = $result[0]['password'];
    if (password_verify($password,$pw )) {
  
    $role = $result[0]['role'];
  
    if ($role == 1) {
        $_SESSION['role'] = $role;
        header('location: ../admin/addProducts.php');
    } else {
        $_SESSION['role'] = $role;
        $_SESSION['userID'] = $result[0]['userID'];
        $_SESSION['userName'] = $result[0]['userName'];
        header('location: ../shopview/shop.php');
    }
    $user_id = isset($_SESSION['userID']) ? $_SESSION['userID'] : 'guest';
    if (isset($_COOKIE['cart_' . $user_id])) {
        $cartJson = $_COOKIE['cart_' . $user_id];

        // Đọc thông tin giỏ hàng từ cookie
        $cart = json_decode($cartJson, true);

        // Lưu thông tin giỏ hàng vào session
        $_SESSION['cart'] = $cart;
    }
}
}
if($action == 'losspw'){
    $email = filter_input(INPUT_POST, 'Emaillosspw');
    $result = $Lossp->getEmailToCheck($email);
    if($result == 0){
        echo "Email not found";
        }else{
            $newpasswordf = substr(md5 (rand(0,900000)),0,8);
            $newpassword = password_hash(  $newpasswordf, PASSWORD_DEFAULT);
            $Lossp->changePassword($email,$newpassword);
            $SendGmail->SendGmailToChangePassword($email,$newpasswordf);
            header('location: ../shopview/home.php');
            exit();
}
}

if ($action == 'edit_product') {
    // Validate product information
    $id = filter_input(INPUT_POST, 'productid', FILTER_VALIDATE_INT);
    $nameproduct = filter_input(INPUT_POST, 'nameproduct');
    $description = filter_input(INPUT_POST, 'description');
    $Originproduct = filter_input(INPUT_POST, 'Originproduct');
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);

    if ($nameproduct === NULL || $description === NULL || $Originproduct === NULL || $categoryID === false) {
        $error = "Invalid product data. Check all fields and try again.";
    } else {
        // Update product
        $product = new Product();
        $product->setProductName($nameproduct);
        $product->setDescription($description);
        $product->setOrigin($Originproduct);
        $product->setCategoryID($categoryID);
        $UpdatePDB->UpdateProduct($product, $id);


        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
        
        $productdetail1 = new ProductDetail();
      
        $productdetail1->setWeight($weight);
        $productdetail1->setQuantity($quantity);
        $productdetail1->setPrice($price);
        $UpdatePDB->UpdateWQPDetail( $productdetail1,$id);

        // Validate product details
        $variousDetails = filter_input(INPUT_POST, 'variousDetails', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        if (!is_array($variousDetails)) {
            $error = "Invalid product details. Check all fields and try again.";
        } else {
            foreach ($variousDetails as $detail) {
                $materialID = filter_var($detail['materialID'], FILTER_VALIDATE_INT);
                $sizeID = filter_var($detail['sizeID'], FILTER_VALIDATE_INT);
                $colorID = filter_var($detail['colorID'], FILTER_VALIDATE_INT);
                $idvarious = filter_var($detail['variousid'], FILTER_VALIDATE_INT);

                if ($materialID === false || $sizeID === false || $colorID === false || $idvarious === false) {
                    $error = "Invalid product details. Check all fields and try again.";
                    break; // Exit the loop if any detail is invalid
                }

                // Update product details
                $productdetail = new ProductDetail();
                $productdetail->setProductID($id);
                $productdetail->setMaterialID($materialID);
                $productdetail->setSizeID($sizeID);
                $productdetail->setColorID($colorID);
                $UpdatePDB->UpdateProductDetail($productdetail, $idvarious);
            }

            header('location: ../admin/productlist.php');
            exit(); // Ensure script termination after header redirection
        }
    }
}
?>


?>
