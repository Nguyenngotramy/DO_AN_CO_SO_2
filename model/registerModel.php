<?php
class UserRegister{
 private $userName;
 private $email;
 private $password;
 public function __construct()
 {
    $this->userName = "";
    $this->email = "";
    $this->password = "";
 }
 public function setUserName($userName)
 {
    $this->userName = $userName;
 }
 public function setEmail($email)
 {
    $this->email = $email;
 }
 public function setPassword($password)
 {
    $this->password = $password;
 }
 public function getUserName()
 {
    return $this->userName;
 }
 public function getEmail()
 {
    return $this->email;
 }
 public function getPassword()
 {
    return $this->password;
 }
}