<?php
include_once("../model/addProductDB.php");
include_once("../model/addProductDetailModel.php");
include_once("../model/addProductModel.php");
include_once("../model/register_loginDB.php");
include_once("../model/registerModel.php");
include_once("../model/Loss_passDB.php");
include_once("sendGmail.php");
$AddPDB = new AddProductDB();
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
    $password = filter_input(INPUT_POST,'Password');
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
    $result =  $Regislogin->getInfor($email, $password);
    $role = $result[0]['role'];
    session_start();
    ob_start();
    if ($role == 1) {
        $_SESSION['role'] = $role;
        header('location: ../admin/addProducts.php');
    } else {
        $_SESSION['role'] = $role;
        $_SESSION['userID'] = $result[0]['userID'];
        $_SESSION['userName'] = $result[0]['userName'];
        header('location: ../shopview/shop.php');
    }
}
if($action == 'losspw'){
    $email = filter_input(INPUT_POST, 'Emaillosspw');
    $result = $Lossp->getEmailToCheck($email);
    if($result == 0){
        echo "Email not found";
        }else{
            $newpassword = substr(md5 (rand(0,900000)),0,8);
            $Lossp->changePassword($email,$newpassword);
            $SendGmail->SendGmailToChangePassword($email,$newpassword);
            header('location: ../shopview/home.php');
            exit();
}
}

?>
