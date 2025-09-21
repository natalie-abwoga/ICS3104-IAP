<?php
session_start();

if (isset($_POST['verify'])) {
    $entered = $_POST['code'];

    if ($entered == $_SESSION['reset_code']) {
        // Code correct → go to reset password form
        header("Location: signin.php?action=reset");
        exit;
    } else {
        echo "Invalid code. <a href='signin.php?action=verify'>Try again</a>";
    }
}
?>
