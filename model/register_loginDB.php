<?php
include_once("../database/connecttemp.php");
include_once("../model/registerModel.php");

class Register_login{
    public static function register($user){
        global $db;
        $userName = $user->getUserName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $query = 'INSERT INTO user(userName, email,password) VALUES (:userName,:email,:password)';
        try{
           $statement = $db->prepare($query);
           $statement->bindValue(':userName',$userName);
           $statement->bindValue(':email',$email);
           $statement->bindValue(':password',$password);
           $statement->closeCursor();
           $statement->execute();
        }catch (Exception $e){
            $e->getMessage(); 
        }

    }
   
    public static function getInfor($email){
        global $db;
        $query = "SELECT * FROM user WHERE email ='".$email."'";
        $statement = $db->prepare($query);
        $statement->execute();
        $result =$statement->fetchAll();
       return $result;

}
public static function getEmail($id){
    global $db;
    $query = "SELECT * FROM user WHERE userID ='".$id."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $result =$statement->fetch(PDO::FETCH_ASSOC);
   return $result;

}
public static function changepassword($password, $email){
    global $db;
    $query = "UPDATE `user` SET `password`= :password WHERE `email`= :email";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display an error message)
        echo "Error: " . $e->getMessage();
    }
}

}

