
<?php
include_once('../model/addProductDB.php');
$AddPDB = new AddProductDB();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    ob_start();
}
if (isset($_SESSION['role']) && ($_SESSION['role']==1)) {
?>
     <nav>
          <ul class="menu-main-admin">
                       <li><a href="#" class="logo">
                              <img src="./pic/logo.jpg">
                              <!-- <span class="nav-item">Admin</span>
                             <?php if (isset($_SESSION['userID']) && ($_SESSION['userID'] != "")) : ?>
         <a href=""><?php echo $_SESSION['userID']; ?></a>
         <?php
          if (isset($_GET['exit'])) {
          session_unset();
          session_destroy();
          header('Location: productlist.php');
          exit();
           }
?>
          <?php endif ?> -->
                          </a></li>
                      <li><a href="../admin/productlist.php">
                              <i class="fas fa-menorah"></i>
                              <span class="nav-item">Product List</span>
                          </a></li>
                      <li><a href="../admin/orderlist.php">
                              <i class="fas fa-comment"></i>
                              <span class="nav-item">Order List</span>
                          </a></li>
                      <li><a href="../admin/addVarious.php">
                              <i class="fas fa-database"></i>
                              <span class="nav-item">add Various && Stock Product</span>
                          </a></li>
                      <li><a href="#">
                              <i class="fas fa-chart-bar"></i>
                              <span class="nav-item">Message</span>
                          </a></li>
                      <li><a href="#">
                              <i class="fas fa-cog"></i>
                              <span class="nav-item">Setting</span>
                          </a></li>

                      <li><a href="../shopview/home.php?exit" class="logout">
                              <i class="fas fa-sign-out-alt"></i>
                              <span class="nav-item">Log out</span>
                          </a></li>
                      <?php    if (isset($_GET['exit'])) {
                    session_unset();
                  
                    header('Location: ../shopview/home.php');
                    exit();
                }
                  ?>
          </ul>
      </nav>

<?php } ?>
