<?php
session_start();
require 'conf.php';

if (isset($_POST['reset'])) {
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_SESSION['reset_email'];

    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$newPassword, $email]);

    // Clear reset session
    unset($_SESSION['reset_email']);
    unset($_SESSION['reset_code']);

    echo "Password updated! <a href='signin.php'>Login</a>";
}
?>
