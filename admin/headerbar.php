<!-- totalWebsale() -->
<?php include_once("../model/orderProductDB.php");
     $orderDB = new Order();
      $sale = $orderDB->totalWebsale(); 
      $orderpeding = $orderDB->totalorderpedingapprovel(); 
      $orderapp = $orderDB->totalorderapprovel(); 
         ?>
     <div class="users">
          <div class="card">
              <img src="../view/img/ecommerce.png">
              <h2>Website sale</h2>
              <h3>$<?php echo $sale['total'] ?></h3>
              <div class="per">
                  <table>
                      <tr>
                          <td><span><?php echo $orderapp['totalord'] ?></span></td>

                      </tr>
                      <tr>
                          <td>order</td>

                      </tr>
                  </table>
              </div>
          </div>

          <div class="card">
              <img src="../view/img/discount.png">
              <h2>Total order</h2>
              <h3><?php echo $orderpeding['totalord'] ?> order</h3>
              <div class="per">
                  <!-- <table>
                      <tr>
                          <td><span>0k</span></td>

                      </tr>
                      <tr>
                          <td>order</td>

                      </tr>
                  </table> -->
              </div>
          </div>
      </div>
