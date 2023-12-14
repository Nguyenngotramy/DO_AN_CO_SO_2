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
                                <li style="color:  rgb(85, 83, 83);">Product
                                    list</li>
                            </a>
                        </ul>
                        <!-- <i class="fas fa-user-cog"></i> -->
                    </div>
                    <div class="users">
                        <div class="card">
                            <img src="img/ecommerce.png">
                            <h2>Website sale</h2>
                            <h3>$ 675,373</h3>
                            <div class="per">
                                <table>
                                    <tr>
                                        <td><span>10k</span></td>

                                    </tr>
                                    <tr>
                                        <td>order</td>

                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <img src="img/discount.png">
                            <h2>Discount</h2>
                            <h3>$ 45,234</h3>
                            <div class="per">
                                <table>
                                    <tr>
                                        <td><span>6k</span></td>

                                    </tr>
                                    <tr>
                                        <td>order</td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="Filter-search">

                        <div class="Filter-Search-Category-Stock-Add">
                            <input type="text" placeholder="Search Product">
                            <select id="Category">
                            <option>--Category--</option>
                                        <?php
                                        include_once('../model/addProductDB.php');
                                        $AddPDB = new AddProductDB();
                                        include('../model/categorydb.php');
                                        $categoryList = showAllCategory();
                                      foreach ($categoryList as $category) :
                                          ?>
                                       <option style="color: black;" value="<?php echo $category["categoryID"] ?>"><?php echo $category["categoryName"]   ?></option>
                                       
                                        <?php endforeach; ?>
                            </select>
                            <select id="Stock">
                                <option value="Lactay">Stock</option>
                                <option value="tRAF mY">like tmy</option>
                            </select>
                            <a href>+ ADD PRODUCT</a>
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
                                        foreach($imgList as $img) {?>
                                        <td style="display: grid;"><img style="width: 50px; height: 50px;" src="../view/img/<?= $img["image"]?>" ></td>
                                        <?php  }?>
                                    <td><?= $Price ?></td>
                                        <td><button>View</button>
                                        <button>Update</button>
                                        <button>Delete</button>
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