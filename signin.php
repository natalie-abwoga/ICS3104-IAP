<?php
// signin.php

require_once 'ClassAutoLoad.php';

// Load Forms class if not already loaded
if (!class_exists('Forms')) {
    require_once __DIR__ . '/Forms/forms.php';
}

$forms = new Forms();

// Header
if (isset($layout)) {
    $layout->header($conf ?? []);
}

// Optional greeting
if (isset($hello)) {
    echo $hello->today();
}

// Decide which form to show based on ?action=
$action = $_GET['action'] ?? 'signup'; // default to signup

if ($action === 'login') {
    $forms->loginForm();
    $forms->handleLogin();
} else {
    $forms->signupForm();
    $forms->handleSignup();
}

// Footer
if (isset($layout)) {
    $layout->footer($conf ?? []);
}
?>


