<?php

include_once("../database/connecttemp.php");

class LossPassDB {
    public static function getEmailToCheck($email){
        global $db;
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $db->prepare($query);
        $statement->bindParam(':email', $email);  // Use bindParam to bind the parameter
        $statement->execute();

        // Fetch as an associative array
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Return true if the email exists, false otherwise
        return $result !== false;
    }

    public static function changePassword($email, $Password){
        global $db;
        $query = "UPDATE user SET password = :Password WHERE email = :email";
        try {
            $statement = $db->prepare($query);

            // Correct the parameter bindings
            $statement->bindParam(':Password', $Password);
            $statement->bindParam(':email', $email);

            if (!$statement->execute()) {
                throw new Exception('Error executing SQL statement.');
            }

            // No need to fetch data for an UPDATE statement
            $statement->closeCursor();

            return true;  // Return true to indicate success
        } catch (Exception $e) {
            // Log or handle the error appropriately
            echo 'Error: ' . $e->getMessage();
            return false;  // Return false to indicate an error
        }
    }
}
