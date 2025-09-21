<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail {
    public function Send_Mail($conf = [], $mailCnt = []) {
        // Allow using $_POST as fallback
        $userEmail = $mailCnt['email_to']  ?? ($_POST['email'] ?? null);
        $userName  = $mailCnt['name_to']   ?? ($_POST['name']  ?? null);
        $fromEmail = $mailCnt['email_from'] ?? 'no-reply@icsccommunity.com';
        $fromName  = $mailCnt['name_from']  ?? 'ICS C Community';
        $subject   = $mailCnt['subject']    ?? 'Welcome to ICS C Community';
        $body      = $mailCnt['body']       ?? "
            <h2>Hello " . htmlspecialchars($userName ?? 'Student') . ",</h2>
            <p>You have successfully created an account with <b>ICS C Community</b>.</p>
            <p>We’re excited to have you on board. Let’s make the most of this semester!</p>
            <br>
            <small>If you didn’t sign up, please ignore this email.</small>
        ";

        // Safety check
        if (!$userEmail) {
            echo "Error: No recipient email provided.";
            return false;
        }

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF; 
            $mail->isSMTP();
            $mail->Host       = $conf['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $conf['smtp_user'];   
            $mail->Password   = $conf['smtp_pass'];      
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = $conf['smtp_port'];

            // Sender
            $mail->setFrom($mailCnt['email_from'], $mailCnt['name_from']);

            // Recipient
            $mail->addAddress($mailCnt['email_to'], $mailCnt['name_to']);     

            // Content
            $mail->isHTML(true);
            $mail->Subject = $mailCnt['subject'];
            $mail->Body    = $mailCnt['body'];

            $mail->send();
            echo "✅ Account created successfully. A confirmation email has been sent to {$userEmail}.";
            return true;
        } catch (Exception $e) {
            echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
