<?php
session_start();
require 'conf.php'; 
require 'Plugins/PHPMailer/src/PHPMailer.php';
require 'Plugins/PHPMailer/src/SMTP.php';
require 'Plugins/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];

    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate random code
        $code = rand(100000, 999999);

        // Store in session
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_code'] = $code;

        // Send email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'abwoganatalie@gmail.com'; 
            $mail->Password   = '';     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
          

            // Recipients
            $mail->setFrom('your_email@gmail.com', 'Your App Name');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "<p>Hello,</p>
                              <p>Your password reset code is: <b>$code</b></p>
                              <p>Enter this code on the website to reset your password.</p>";

            $mail->send();
            echo "✅ Code sent to your email. <a href='signin.php?action=verify'>Enter Code</a>";
        } catch (Exception $e) {
            echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo "❌ Email not found.";
    }
}
?>

