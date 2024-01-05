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
                                <li style="color: rgb(85, 83, 83);">Order/</li>
                            </a><a href>
                                <li style="color:  rgb(85, 83, 83);">OrderDetail</li>
                            </a>
                        </ul>
                        <!-- <i class="fas fa-user-cog"></i> -->
                    </div>

                    <section class="attendance">
                        <?php  
                        $id = $_GET['id']; 
                        $fullName = $_GET['fullName']; 
                        ?>
                        <div class="attendance-list">
                        <!-- style="display:none;" -->
                        <div>
                        <div style="display: flex;">
                            <h1>Number Order:</h1>
                          <input style="display:none;" type="text" name="orderid" id="orderid" value="<?php echo $id ?>" disabled required>
                          <h1 id="orderid"><?php echo $id ?></h1>
                        </div>
                        <div>
                            <label for="orderid">Full Name:</label>
                            <input style="display:none;"  type="text" name="fullName" id="orderid" value="<?php echo $id ?>" disabled required>
                            <span id="orderid"><?php echo $fullName ?></span>
                        </div>
                        List of products ordered
                        </div>
                         
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name Product</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Weight</th>
                                        <th>Price</th>
                                        <th>Number</th>
                                        <th>Total Price</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    include_once("../model/orderProductDB.php");
                                    $orderDB = new Order();
                                    $orderList = $orderDB->getListOrderDetail($id);
                                 
                                    foreach($orderList as $orderd){ ?>
                                    <tr>
                                    <td><?= $orderd["id"] ?></td>
                                       <td><?= $orderd["productName"] ?></td>
                                        <td><?= $orderd["color"] ?></td>
                                        <td><?= $orderd["size"] ?></td>
                                        <td><?= $orderd["weight"] ?></td>
                                        <td><?= $orderd["price"]?></td>
                                        <td><?= $orderd["quantity"]?></td>
                                      
                                        <td> <?php  $totalP = $orderDB-> totalOrderProduct($id, $orderd["id"]); 
                                                     echo $totalP['total'];
                                        ?></td>
                                        <td style="display: grid;">

                                    </td>
                                    </tr>
                                    <?php }?>
                                   
                                  
                                </tbody>

                            </table>
                            <h3>Total Bill</h3>
                            <?php  $totalAll = $orderDB->totalOrder($id); 
                                                     echo $totalAll['total'];
                                        ?>
                            
                        </div>
                                   

                    </section>

                </section>

            </div>
        </body>
    </html>

<?php } ?>