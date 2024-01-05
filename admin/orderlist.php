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
                                <li style="color:  rgb(85, 83, 83);">Order
                                    list</li>
                            </a>
                        </ul>
                        <!-- <i class="fas fa-user-cog"></i> -->
                    </div>
                    <div>
         <?php include('../admin/headerbar.php') ?>
      </div> 

                    <div class="Filter-search">

                        <div class="Filter-Search-Category-Stock-Add">
                           
                            <a href>+ ADD PRODUCT</a>
                        </div>

                    </div>

                    <section class="attendance">
                        
                        <div class="attendance-list">
                            <h1>Order List</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>FullName</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Total Price</th>
                                        <th>Details</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    include_once("../model/orderProductDB.php");
                                    $orderDB = new Order();
                                    $orderList = $orderDB->getListOrder();
                                 
                                    foreach($orderList as $order){ ?>
                                    <tr>
                                       <td><?= $order["idOrder"] ?></td>
                                        <td><?= $order["email"] ?></td>
                                        <td><?= $order["fullName"] ?></td>
                                        <td><?= $order["address"] ?></td>
                                        <td><?= $order["phoneNumber"]?></td>
                                        <td><?= $order["orderNotes"]?></td>
                                        <td><?php
                                        if ( $order["status"] == 0) {
                                            echo "Pending approval";
                                        } else {
                                            echo "Approval";
                                        }
                                        
                                        ?></td>
                                         <td><?= $order["date"]?></td>
                                        <td> <?php  $total = $orderDB->totalOrder($order["idOrder"]); 
                                                     echo $total['total'];
                                        ?></td>
                                        <td style="display: grid;">

                                        <a href="../admin/orderdetail.php?id=<?= $order["idOrder"] ?>&fullName=<?= $order["fullName"] ?>" style="color: black; padding: 10px; border-color: black; border: 1px solid;">Detail</a>
                                        <a href="../controller/controller.php?action=browseOrder&idord=<?= $order["idOrder"]?>" style="color: black; padding: 10px; border-color: black; border: 1px solid;">Browse order</a>

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