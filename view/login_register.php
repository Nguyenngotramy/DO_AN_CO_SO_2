<?php
  $mess ='';
    include_once("../controller/controller.php");
  
    ?>
<div id="log-in-cart"  class="hidden">
      <div style="display: flex;">
         <div id="right-icon-login">
            <a id="choose-exit-login"><i onclick="myFunctionExitLogin()" class="fa-solid fa-xmark" style="color: #000000;"></i></a>
            <span id="text-logo">GODTHISM</span>
         </div>

         <div id="left-form-login">
            <div id="title-login">
               <div id="tt-Signin" onclick="myFunctionFormlogin()">Sign in</div>
               <div id="tt-Register" onclick="myFunctionFormlogin()">Register</div>
            </div>
            <div id="form-login">
            <form action="../controller/controller.php" method="post" id="register" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="login">
                  <div id="Form-login-input">
                     <label>Email *</label>
                     <input id="user-email" type="email" name='emaillogin'>
                  </div>
                  <div id="Form-login-input">
                     <label>Password *</label>
                     <input id="password" type="password" name='pwlogin'>
                  </div>
                  <div id="checkbox-Remember">
                     <input type="checkbox" name id="remember">
                     <label> Remember me</label>
                  </div>
                  <div id="submit-login-main">
                     <input id="submit-login" type="submit" value="Login">
                  </div>
               </form>
               <a href id="Lostpass">Lost your password ?</a>
               <div><?php  ?></div>
            </div>

            <div id="form-login1" class="hidden">
            <form action="../controller/controller.php" method="post" id="register" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="register_user">
                <?php

                ?>
                  <div id="Form-login-input">
                     <label> Username </label>
                     <input id="user-email" type="text" name="Username">
                  </div>
                  <div id="Form-login-input">
                     <label> Email </label>
                     <input id="user-email" type="email" name="Email">
                  </div>
                  <div id="Form-login-input">
                     <label> Password </label>
                     <input id="user-email" type="password" name="Password">
                  </div>
                  <div id="submit-login-main">
                     <input id="submit-login" type="submit" value="Register">
                  </div>
               </form>

            </div>

         </div>
      </div>
   </div>
   
