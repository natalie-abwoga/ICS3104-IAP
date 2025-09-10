<?php
// forms.php

require __DIR__ . '/../Plugins/PHPMailer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Forms {

    // SIGNUP FORM
    public function signupForm() {
?>
        <h2>Sign Up</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" name="signup" value="Sign Up">
            <a href="?action=login">Already have an account? Log in</a>
        </form>
<?php
    }

    private function submit_button($value, $name) {
        ?>
        <button type="submit" class="btn btn-primary" name="<?php echo $name; ?>" value="<?php echo $value; ?>"><?php echo $value; ?></button>
        <?php
    }

    // LOGIN FORM
    public function loginForm() {
?>
        <h2>Log In</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" name="login" value="Log In">
            <a href="?action=signup">Don't have an account? Sign up</a>
        </form>
<?php
    }

    // PROCESS SIGNUP
    public function handleSignup() {
        if (isset($_POST['signup'])) {
            $username = $_POST['username'];
            $email    = $_POST['email'];

            echo "<p style='color:green;'>Account created successfully for <b>" . htmlspecialchars($username) . "</b>!</p>";

            $this->sendWelcomeEmail($email, $username);
        }
    }

    // PROCESS LOGIN
    public function handleLogin() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            echo "<p style='color:green;'>Welcome back, " . htmlspecialchars($username) . "!</p>";
        }
    }

    // SEND EMAIL
    private function sendWelcomeEmail($email, $username) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'abwoganatalie@gmail.com'; 
            $mail->Password   = 'hebp rzqo zrpz ktmq'; // Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('natalie.abwoga@strathmore.edu', 'Natalie Abwoga');
            $mail->addAddress($email, $username);

            $mail->isHTML(true);
            $mail->Subject = 'Welcome to ICS C Community!';
            $mail->Body    = "
                <h2>Hello " . htmlspecialchars($username) . " 👋,</h2>
                <p>You have successfully created an account with <b>ICS C Community</b>.</p>
                <p>We’re excited to have you on board. Let’s make the most of this semester!</p>
            ";

            $mail->send();
            echo "<p style='color:blue;'>A confirmation email has been sent to " . htmlspecialchars($email) . ".</p>";
        } catch (Exception $e) {
            echo "<p style='color:red;'>Email could not be sent. Error: {$mail->ErrorInfo}</p>";
        }
    }
}
?>


