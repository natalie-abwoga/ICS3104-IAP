<?php
require 'ClassAutoLoad.php';

$action = $_GET['action'] ?? 'login';

$ObjLayout->header($conf);
$ObjLayout->nav($conf);
$ObjLayout->banner($conf);

if ($action === 'forgot') {
    $ObjForm->forgotPasswordForm();
} elseif ($action === 'verify') {
    $ObjForm->verifyCodeForm();
} elseif ($action === 'reset') {
    $ObjForm->resetPasswordForm();
} else {
    $ObjForm->loginForm();
}

$ObjLayout->footer($conf);


