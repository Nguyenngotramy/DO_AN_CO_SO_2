<?php
    function showAllCategory() {
        global $db;
        $query = 'SELECT * FROM `categories`;';
        $statement = $db->prepare($query);
        $statement->execute();
        $categoryList = $statement->fetchAll();
        $statement->closeCursor();
        return $categoryList;
    }

    function countQuantityInCategory($categoryID) {
        global $db;
        $query = 'SELECT COUNT(*) AS quantity
        FROM products
        INNER JOIN categories on categories.categoryID = products.categoryID
        WHERE categories.categoryID = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $categoryID);
        $statement->execute();
        $quantity = $statement->fetchColumn();
        $statement->closeCursor();
        return $quantity;
    }
?>