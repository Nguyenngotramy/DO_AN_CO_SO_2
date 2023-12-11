<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';

class SendGmail {
    public static function SendGmailToChangePassword($email, $password) {
        $mail = new PHPMailer(true); // true: enables exceptions

        try {
            $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $nguoigui = 'bijouxbell364@gmail.com';
        $matkhau = 'ydji ttat wuwj lqvf';
        $tennguoigui = 'bijouxbell';
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        $to = $email;
        $to_name = "bạn";
		$tieude = "Pass word Bijoux Bell shop";

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
		$mail->addAddress( $email,"Mymy");
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $tieude;
		$noidungthu = ' <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Pass word:</h6>
                    <p class="card-text">' .$password. '</p>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
			
        $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
       $mail->send();
            echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            // Log the error instead of displaying it directly to the user
            error_log('Error sending email: ' . $e->getMessage());
            // Optionally, you can display a generic error message to the user
            echo 'Error sending email. Please try again later.';
        }
    }
}

?>
