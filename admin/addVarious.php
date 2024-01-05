
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Attendance Dashboard | By Code Info</title>
    <link rel="stylesheet" href="../view/css/test.css" />
    <link rel="stylesheet" href="../view/css/styleaddproduct.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>


 
    <div class="container">
        <div>
         <?php include('../admin/rightbar.php') ?>
        </div>
        <?php
        include_once('../model/addProductDB.php');
        $AddPDB = new AddProductDB();
        if (isset($_SESSION['role']) && ($_SESSION['role']==1)) {
        ?>
        <section class="main" style="display: grid;">
                <div class="main-top"  >
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
               
                <div style="display: flex; padding: 10px; ">
                     <h3>Color:</h3>
                    <?php include_once('../model/addProductDB.php');
                    $AddPDB = new AddProductDB();  
                    foreach ($AddPDB->getcoloritem() as $color) :
                    ?>
                    <div style="margin: 5px; border-radius: 50%;  background-color: <?php echo $color->getColor(); ?>; width: 15px; height: 15px;"></div>
                    <?php endforeach ?>
                </div>
                <div style="display: flex;">
                     <h3>Size:</h3>
                    <?php foreach ($AddPDB->getsizeitem() as $size) :  ?>
                    <label>, <?php echo $size->getSize(); ?> </label>
                    <?php endforeach ?>
                </div>
                <div style="justify-items: center; display: grid;">
                <section class="fillouttheforn">
                <form action="../controller/controller.php" method="post" id="add_color" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="add_color">

        <div class="Product-information">
            <h3>Add Color:</h3>

            <div class="nameproduct">
                <label for="namecolor">Name of Color:</label>
                <input type="text" name="nameColor" id="namecolor" required>
            </div>
        </div>
        
        <center>
            <input style="background-color: black; color: white; padding: 18px; " type="submit" value="Publish Color">
        </center>
    </form>
</section>

               
                <section class="fillouttheforn">
            <form action="../controller/controller.php" method="post" id="add_size_form" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="add_size">
            
                <div class="Inventory">
                        <h3>Add Size:</h3>
                        <div class="price">
                            <label for="quantity"> Size:</label>
                            <input type="number" name="Size" min='0' id="quantity">
                        </div>
                    </div>
                <center> <input style="background-color: black; color: white; padding: 18px;  " type="submit" value="Publish Size"></center>                          
           
            </form>
            </section>
                                    
       

    <section class="fillouttheforn">
    <form action="../controller/controller.php" method="post" id="add_stock_form" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="stock">
                <h3>Stock Product:</h3>
                <select name="productid" >   
                    <option>--Name Product--</option>
                    <?php 
                                    include_once("../model/ProductAdminDB.php");
                                    $PAd = new ProductAd();
                                    $ProductList = $PAd->getListProduct();
                                    foreach($ProductList as $product){ ?>
                
                        <option style="color: black;" value="<?= $product["productID"] ?>"><?= $product["productName"] ?></option>
                    <?php } ?>
                </select>
                <div class="price">
                            <label for="quantity"> Number</label>
                            <input type="number" name="number" min='1' id="quantity">
                        </div>
                        <center> <input style="background-color: black; color: white; padding: 18px;  " type="submit" value="Stock product"></center>
                                      </form>
    </section>     
    </div>
          
         </section>
<?php } ?>
</body>
</html>






   
   
  

   