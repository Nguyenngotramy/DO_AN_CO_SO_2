<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <title>Attendance Dashboard | By Code Info</title>
            <link rel="stylesheet" href="../view/css/test.css" />
            <!-- Font Awesome Cdn Link -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        </head>
        <body>
            <div class="container">
            <div>
         <?php include('../admin/rightbar.php') ?>
      </div>
      <?php
include_once('../model/addProductDB.php');
$AddPDB = new AddProductDB();
  include_once("../model/ProductAdminDB.php");
 

if (isset($_SESSION['role']) && ($_SESSION['role']==1)) {
?>

                <section class="main">
                    <div class="main-top">
                        <ul>
                            <a href>
                                <li style="color:  rgb(85, 83, 83);">Admin/</li>
                            </a><a href>
                                <li style="color: rgb(85, 83, 83);">Product/</li>
                            </a><a href>
                                <li style="color:  rgb(85, 83, 83);">Product
                                    list</li>
                            </a>
                        </ul>
                        <!-- <i class="fas fa-user-cog"></i> -->
                    </div>
                    <?php
                                        include_once('../model/addProductDB.php');
                                        $AddPDB = new AddProductDB();
                                        include('../model/categorydb.php');
                                       
                                          ?>
                    <div>
         <?php include('../admin/headerbar.php') ?>
      </div> 

                    <div class="Filter-search">

                        <div class="Filter-Search-Category-Stock-Add">
                           
                            <a href ='../admin/addProducts.php'>+ ADD PRODUCT</a>
                        </div>

                    </div>

                    <section class="attendance">
                        
                        <div class="attendance-list">
                            <h1>Product List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Decription</th>
                                        <th>Origin</th>
                                        <th>Category</th>
                                        <th>Img</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Details</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    include_once("../model/ProductAdminDB.php");
                                    $PAd = new ProductAd();
                                    $ProductList = $PAd->getListProduct();
                                    foreach($ProductList as $product){ ?>
                                    <tr>
                                  
                                        <td><?= $product["productID"] ?></td>
                                        <td><?= $product["productName"] ?></td>
                                        <td><?= $product["description"]?></td>
                                        <td><?= $product["origin"]?></td>
                                        <td><?= $product["categoryName"]?></td>
                                        <?php
                                          $id = $product["productID"];
                                          $imgList = $PAd->Listimg($id);
                                          $Price = $PAd->getPrice($id);
                                          $Number = $PAd->getNumberProductonstoreID($id);
                                        foreach($imgList as $img) {?>
                                        <td style="display: grid;"><img style="width: 50px; height: 50px;" src="../view/img/<?= $img["image"]?>" ></td>
                                        <?php  }?>
                                    <td><?= $Price ?></td>
                                    <td><?= isset($Number['remaining_quantity']) ? $Number['remaining_quantity'] : '' ?></td>

                                        <td style="display: grid;">

                                        <a href="../admin/editProduct.php?idPE=<?= $product["productID"]?>" style="color: black; padding: 10px; border-color: black; border: 1px solid;">Update</a>
                                        <a href="../controller/controller.php?action=delete&id=<?= $product["productID"]?>" style="color: black; padding: 10px; border-color: black; border: 1px solid;">Delete</a>

                                    </td>
                                    </tr>
                                    <?php }?>
                                   
                                    <!-- <tr >
                    <td>05</td>
                    <td>Salina</td>
                    <td>Coding</td>
                    <td>03-24-22</td>
                    <td>9:00AM</td>
                    <td>4:00PM</td>
                    <td><button>View</button></td>
                  </tr>
                  <tr >
                    <td>06</td>
                    <td>Tara Smith</td>
                    <td>Testing</td>
                    <td>03-24-22</td>
                    <td>9:00AM</td>
                    <td>4:00PM</td>
                    <td><button>View</button></td>
                  </tr> -->
                                </tbody>

                            </table>
                            <div id="number-productlist-page">
                                <ul>
                                    <li><a href="#" id="choose">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                </ul>
                            </div>
                        </div>

                    </section>

                </section>

            </div>

        </body>
    </html>
</span>
<?php } ?>