<?php
$mess = '';
include_once("../controller/controller.php");
?>

<div id="log-in-cart1" style=" transform: translateX(-100%);">
    <div style="display: flex;">
        <div id="right-icon-login">
            <a id="choose-exit-login"><i onclick="myFunctionExitNewpass()" class="fa-solid fa-xmark"
                    style="color: #000000;"></i></a>
            <span id="text-logo">SERENE</span>
        </div>

        <div id="left-form-login1">
            <div id="title-login">

                <?php 
                include_once("../model/register_loginDB.php");
                $Regislogin = new Register_login();
               //  $Regislogin->getEmail($_SESSION['userID']);
                if (isset($_SESSION['userID']) && ($_SESSION['userID'] != "")): ?>
                <a href="#">
                    <?php echo $_SESSION['userID']; 
                    $email = $Regislogin->getEmail($_SESSION['userID']);
                    echo $email['email'];
                    ?>
                   
                </a>
                <?php endif; ?>
            </div>

            <div id="form-newpass">
                <form action="../controller/controller.php" method="post" id="register"
                    enctype="multipart/form-data" onsubmit="return validatePasswords()">
                    <input type="hidden" name="action" value="newpass">
                    <input style="display:none;" type="text" name="emailNP"
                                            id="nameproduct" value="<?php  echo $email['email']; ?>" required>
                    <div id="Form-login-input">
                        <label>New password</label>
                        <input name="password1" id="password1" type="password">
                    </div>
                    <div id="Form-login-input">
                        <label>Confirm new password</label>
                        <input name="password2" id="password2" type="password">
                    </div>

                    <div id="submit-login-main" style="display:flex ;">
                        <input id="submit-login" type="submit" value="Submit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validatePasswords() {
        var password1 = document.getElementById('password1').value;
        var password2 = document.getElementById('password2').value;

        // Check if passwords match
        if (password1 !== password2) {
            alert('Passwords do not match. Please try again.');
            return false; // Prevent form submission
        }

        // If passwords match, you can proceed with the form submission
        return true;
    }
</script>
