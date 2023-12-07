
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Attendance Dashboard | By Code Info</title>
    <link rel="stylesheet" href="css/test.css" />
    <link rel="stylesheet" href="css/styleaddproduct.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("../model/addProductDB.php");
    $AddPDB = new AddProductDB();
    ?>
    <div class="container">
        <nav>
            <ul class="menu-main-admin">
                         <li><a href="#" class="logo">
                                <img src="./pic/logo.jpg">
                                <span class="nav-item">Admin</span>
                            </a></li>
                        <li><a href="#">
                                <i class="fas fa-menorah"></i>
                                <span class="nav-item">Dashboard</span>
                            </a></li>
                        <li><a href="#">
                                <i class="fas fa-comment"></i>
                                <span class="nav-item">Message</span>
                            </a></li>
                        <li><a href="#">
                                <i class="fas fa-database"></i>
                                <span class="nav-item">Report</span>
                            </a></li>
                        <li><a href="#">
                                <i class="fas fa-chart-bar"></i>
                                <span class="nav-item">Product</span>
                            </a></li>
                        <li><a href="#">
                                <i class="fas fa-cog"></i>
                                <span class="nav-item">Setting</span>
                            </a></li>

                        <li><a href="#" class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Log out</span>
                            </a></li>
                    
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <ul>
                <a href>
                                <li style="color:  rgb(85, 83, 83);">Admin/</li>
                            </a><a href>
                                <li style="color: rgb(85, 83, 83);">Product/</li>
                            </a><a href>
                                <li style="color:  rgb(85, 83, 83);">Add
                                    Products
                                </li>
                            </a>
                </ul>
            </div>
       
            <div class="container-add-product">
                <h3>Add new product</h3>
                <form action="../controller/controller.php" method="post" id="add_product_form" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="add_product">
                <div style="display: flex;" class="divilr">
                    <section class="fillouttheforn">
                                <div class="Product-information">
                                    <h3>Product information</h3>
                                    <!-- <div class="nameproduct">
                                        <label for="nameproduct">Id
                                            product
                                            :</label>
                                        <input type="text" name="nameproduct"
                                            id="nameproduct" required>
                                    </div> -->
                                    <div class="nameproduct">
                                        <label for="nameproduct">Name of the
                                            product
                                            :</label>
                                        <input type="text" name="nameproduct"
                                            id="nameproduct" required>
                                    </div>
                                    <div class="nameproduct">
                                        <label for="description">Description of the
                                            product
                                            :</label>
                                        <textarea name="description"
                                            id="nameproduct" required></textarea>
                                    </div>
                                    <div class="Originproduct">
                                        <label for="nameproduct">Origin of the
                                            product
                                            :</label>
                                        <input type="text" name="Originproduct"
                                            id="Xuatxu" required>
                                    </div>
                        
                                </div>

<div class="variant-container" id="variantsContainer">

    <?php for ($i = 0; $i < 1; $i++) : ?>
            <div class="variant">
                <select name="variants[<?php echo $i; ?>][material_id]">
                    <option>--Material--</option>
                    <?php foreach ($AddPDB->getmaterialitem() as $material) : ?>
                        <option style="color: black;" value="<?php echo $material->getIDmaterial(); ?>"><?php echo $material->getMaterialName(); ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="variants[<?php echo $i; ?>][size_id]">
                    <option>--Size--</option>
                    <?php foreach ($AddPDB->getsizeitem() as $size) : ?>
                        <option style="color: black;" value="<?php echo $size->getSizeID(); ?>"><?php echo $size->getSize(); ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="variants[<?php echo $i; ?>][color_id]">
                    <option>--Color--</option>
                    <?php foreach ($AddPDB->getcoloritem() as $color) : ?>
                        <option style="color: black;" value="<?php echo $color->getIDcolor(); ?>"><?php echo $color->getColor(); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="button" onclick="addVariant()">Add variant</button>
            </div>
        <?php endfor; ?>
    

</div>
                       
                         <div class="Inventory">
                        <h3>Weight</h3>
                        <div class="weight">
                            <label for="quantity">weight :</label>
                            <input type="number" name="weight" id="quantity">
                        </div>
                         </div>
                         <div class="Inventory">
                        <h3>Inventory</h3>
                        <div class="quantity">
                            <label for="quantity">Quantity :</label>
                            <input type="number" name="quantity" id="quantity">
                        </div>
                    </div>
                    <div class="Inventory">
                        <h3>Price</h3>
                        <div class="price">
                            <label for="quantity"> Price:</label>
                            <input type="number" name="price" id="quantity">
                        </div>
                    </div>
                    </section>
               

        <section class="Catogory-Price">
                                <div class="catogory">
                                    <h3>Category</h3>
                                    <select name="categoryID">
                                        <option>--Option--</option>
                                        <?php
                                        include('../model/categorydb.php');
                                        $categoryList = showAllCategory();
                                      foreach ($categoryList as $category) :
                                          ?>
                                       <option style="color: black;" value="<?php echo $category["categoryID"] ?>"><?php echo $category["categoryName"]   ?></option>
                                       
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="Media">
                                    <h3>Media</h3>
                                    <div class="upload-container">
                                        <label for="file-input"
                                        
                                            class="custom-button">Chọn Ảnh:</label>
                                            <input type="file" name="img" id="img" accept="image/*">
                                            
                                    </div>
                                </div>
                                     
                            
                               <center> <input style="background-color: black; color: white; padding: 18px;  " type="submit" value="Publish product"></center>
                                      </form>
                                    
                            </section>
    </div>
    
</body>
  

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

var variantCount = 1;

function addVariant() {
    var newVariant = $(".variant:first").clone();
    newVariant.find('select').each(function () {
        this.name = this.name.replace(/\[\d+\]/, '[' + variantCount + ']');
    });
    const removeButton = $('<button type="button">Xóa</button>').click(function () {
        removeVariant(this);
    });
    newVariant.append(removeButton);
    $("#variantsContainer").append(newVariant);
    variantCount++;
}

function removeVariant(button) {
    $(button).closest('.variant').remove();
}

</script>

</body>
</html>






   
   
  

   