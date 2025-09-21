<?php
session_start();
require 'conf.php';

// Check if form was submitted
if (isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Connect to DB
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Login success
        $_SESSION['user'] = $user;

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Site Under Construction</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    width: 100%;
                }
                .bg {
                    background: url("icsCbanner.png") 
                    background-size: cover; 
                    height: 100%;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    color: white;
                    text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
                    flex-direction: column;
                    position: relative;
                }
                .overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.5); 
                }
                .content {
                    position: relative;
                    z-index: 2;
                }
            </style>
        </head>
        <body>
            <div class="bg">
                <div class="overlay"></div>
                <div class="content">
                    <h1>Hi <?php echo htmlspecialchars($user['name']); ?> 👋</h1>
                    <p class="lead">The rest of the site is currently under construction.<br>Please check back later!</p>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        // Login failed
        echo "<p style='color:red; text-align:center;'>❌ Invalid email or password</p>";
        echo "<p style='text-align:center;'><a href='signin.php'>Go back and try again</a></p>";
    }
} else {
    header("Location: signin.php");
    exit;
}
?>

