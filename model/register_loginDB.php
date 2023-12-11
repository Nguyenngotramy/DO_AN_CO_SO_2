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
   
    public static function getInfor($email,$password){
        global $db;
        $query = "SELECT * FROM user WHERE email ='".$email."' AND password = '".$password."'";
        $statement = $db->prepare($query);
        $statement->execute();
        $result =$statement->fetchAll();
       return $result;
}
}
