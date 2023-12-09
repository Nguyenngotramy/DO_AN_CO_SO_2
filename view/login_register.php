
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
               <form action="" method="post">
                  <div id="Form-login-input">
                     <label>Email *</label>
                     <input id="user-email" type="email">
                  </div>
                  <div id="Form-login-input">
                     <label>Password *</label>
                     <input id="password" type="password">
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
            </div>

            <div id="form-login1" class="hidden">
               <form action method="post">
                  <div id="Form-login-input">
                     <label> Username </label>
                     <input id="user-email" type="email">
                  </div>
                  <div id="Form-login-input">
                     <label> Email </label>
                     <input id="user-email" type="email">
                  </div>
                  <center> <label id="regis">A password will be sent
                        to your
                        email
                        address.</label><br>
                     <label id="regis">Your personal data will be
                        used to
                        support
                        your
                        experience throughout this website,
                        to manage access to your account, and for
                        other
                        purposes described in our privacy policy.</label>
                  </center>
                  <div id="submit-login-main">
                     <input id="submit-login" type="submit" value="Register">
                  </div>
               </form>

            </div>

         </div>
      </div>
   </div>
   
