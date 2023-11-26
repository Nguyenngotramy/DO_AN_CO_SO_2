<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <title>Attendance Dashboard | By Code Info</title>
            <link rel="stylesheet" href="css/test.css" />
            <link rel="stylesheet" href="css/styleaddproduct.css" />
            <!-- Font Awesome Cdn Link -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link
                href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap"
                rel="stylesheet">

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
                                <li style="color:  rgb(85, 83, 83);">Add
                                    Products
                                </li>
                            </a>
                        </ul>
                        <!-- <i class="fas fa-user-cog"></i> -->
                    </div>
                    <div class="container-add-product">
                            <h3>Add new product</h3>
                           <form action="../controller/controller.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product" />
                                
                       
                        <div class="divilr">
                            <section class="fillouttheforn">
                                <div class="Product-information">
                                    <h3>Product information</h3>

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

                                <div class="Media">
                                    <h3>Media</h3>
                                    <div class="upload-container">
                                        <label for="file-input"
                                            class="custom-button">Chọn Ảnh:</label>
                                        <input type="file" id="file-input">
                                    </div>
                                </div>

                                <div class="variants">
                                    <h3>Variants</h3>
                                    <div>
                                        <!-- <form> -->
                                            <div class="option">
                                        <select>
                                            <option>--Option--</option>
                                            <option>Color</option>
                                            <option>Size</option>
                                            <option>Material</option>
                                        </select>
                                        <input type="text" placeholder="value">
                                    </div>
                                        <input style="background-color: black; color: white;" type="submit" value="add">
                                     </form>
                                    </div>
                                </div>

                                <div class="Inventory">
                                    <h3>Inventory</h3>
                                    <div class="quantity">
                                        <label for="nameproduct">Quantity
                                            :</label>
                                        <input type="number">
                                    </div>
                                </div>
                            </section>

                            <section class="Catogory-Price">
                                <div class="catogory">
                                    <h3>Category</h3>
                                    <select name="categoryID">
                                        <option>--Option--</option>
                                        <option value="1">Rings</option>
                                        <option value="2">Earrings</option>
                                        <option value="3">Bracelets</option>
                                        <option value="4">Necklaces</option>
                                    </select>
                                </div>

                                <div class="Price">
                                    <h3>Price</h3>
                                    <div class="price">
                                        <label for="nameproduct">Price :</label>
                                        <input type="number" name="price"
                                            id="price"
                                            onkeyup='formatNumber(this);' min=0
                                            maxlength=15>
                                    </div>
                                </div>
                               <center> <input style="background-color: black; color: white; padding: 18px;  " type="submit" value="Publish product"></center>

                            </section>
                        </div>
                        </form>
                       
                   

                    </div>
                </section>
            </div>
        </body>
    </html>
</span>