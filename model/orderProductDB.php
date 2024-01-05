<?php

class Order{
     function getListOrder(){
          global $db;
          $query = 'SELECT  `order`.idOrder,`user`.email, CONCAT(`order`.firstName, " ", `order`.lastName) AS fullName,
                    `order`.address,`order`.phoneNumber, `order`.orderNotes, `order`.status,`order`.date
                FROM `order`
                INNER JOIN `user` ON `user`.userID = `order`.userID;';
          $statement = $db->prepare($query);
          $statement->execute();
          $ListOrder = $statement->fetchAll();
          $statement->closeCursor();
          return $ListOrder;
      }

      function getListOrderDetail($idorder){
        global $db;
        $query = 'SELECT productdetails.id,  productdetails.price,productdetails.weight,orderdetails.quantity, orderdetails.idOrder, color.color, size.size, products.productName FROM productdetails INNER JOIN orderdetails on orderdetails.idProductDetails = productdetails.id INNER JOIN color on color.colorID = productdetails.colorID INNER JOIN size on size.sizeID = productdetails.sizeID INNER JOIN products on products.productID = productdetails.productID WHERE orderdetails.idOrder = :id;';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $idorder);
        $statement->execute();
        $ListOrder = $statement->fetchAll();
        $statement->closeCursor();
        return $ListOrder;
    }
      
      function Browseorder($id){
          global $db;
          $query = 'UPDATE `order` SET `status` = "1" WHERE `idOrder` = :id';
          $statement = $db->prepare($query);
          $statement->bindValue(':id', $id);
          $statement->execute();
          $statement->closeCursor();
      }
      function totalOrder($id){
          global $db;
          $query = 'SELECT  ROUND(SUM(orderdetails.quantity * productdetails.price), 2) as total
          FROM orderdetails 
          INNER JOIN `order` ON `order`.idOrder = orderdetails.idOrder
          INNER JOIN productdetails ON productdetails.id = orderdetails.idProductDetails
          WHERE orderdetails.idOrder = :id;';
            $statement = $db->prepare($query);
            $statement->bindValue(":id",$id);
            $statement->execute();
            $total= $statement->fetch(PDO::FETCH_ASSOC); 
        $statement->closeCursor();
        return $total;
      }
      function totalOrderProduct($id, $pid) {
        global $db;
        $query = 'SELECT ROUND((orderdetails.quantity * productdetails.price), 2) as total
                  FROM orderdetails 
                  INNER JOIN `order` ON `order`.idOrder = orderdetails.idOrder
                  INNER JOIN productdetails ON productdetails.id = orderdetails.idProductDetails
                  WHERE orderdetails.idOrder = :id AND productdetails.id = :productid;';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(":id", $id);
            $statement->bindValue(":productid", $pid);
            $statement->execute();
            $total = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $total; 
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
   
function totalWebsale(){
     global $db;
     $query = ' SELECT  ROUND(SUM(orderdetails.quantity * productdetails.price), 2) as total
     FROM orderdetails 
     INNER JOIN `order` ON `order`.idOrder = orderdetails.idOrder
     INNER JOIN productdetails ON productdetails.id = orderdetails.idProductDetails
     WHERE `order`.status = "1"';
     $statement = $db->prepare($query);
     $statement->execute();
     $sale= $statement->fetch(PDO::FETCH_ASSOC); 
     $statement->closeCursor();
     return $sale;
 }

function totalorderpedingapprovel(){
     global $db;
     $query = ' SELECT COUNT(`order`.`idOrder`) as totalord FROM `order`;';
     $statement = $db->prepare($query);
     $statement->execute();
     $sale= $statement->fetch(PDO::FETCH_ASSOC); 
     $statement->closeCursor();
     return $sale;
 }

 function totalorderapprovel(){
     global $db;
     $query = ' SELECT COUNT(`order`.`idOrder`) as totalord FROM `order`  WHERE `order`.status = "1";';
     $statement = $db->prepare($query);
     $statement->execute();
     $sale= $statement->fetch(PDO::FETCH_ASSOC); 
     $statement->closeCursor();
     return $sale;
 }
 

}


?>