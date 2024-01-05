<?php
    include('../database/connecttemp.php');
    function addReview($pdID, $star, $name, $reviewText) {
        global $db;
        $query = 'INSERT INTO `review`(`productID`, `name`, `star`, `reviewText`) VALUES (?,?,?,?)';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $pdID);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $star);
        $statement->bindValue(4, $reviewText);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function showReview($pdID) {
        global $db;
        $query = 'SELECT * FROM `review` WHERE productID = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $pdID);
        $statement->execute();
        $reviewList = $statement->fetchAll();
        $statement->closeCursor();
        return $reviewList;
    }
?>