<?php
// Site Information
$conf['site_name'] = 'ICS C Community';
$conf['site_url'] = 'http://localhost';
$conf['admin_email'] = 'admin@icsccommunity.com';

// Database Configuration
$conf['db_type'] = 'pdo';
$conf['db_host'] = 'localhost';
$conf['db_user'] = 'root';
$conf['db_pass'] = 'admin123';
$conf['db_name'] = 'ICS3104';

// Site Language
$conf['site_lang'] = 'en';

// Email Configuration
$conf['mail_type']   = 'smtp';
$conf['smtp_host']   = 'smtp.gmail.com';
$conf['smtp_user']   = 'abwoganatalie@gmail.com';
$conf['smtp_pass']   = 'hebp rzqo zrpz ktmq'; // Gmail App Password
$conf['smtp_port']   = 465;
$conf['smtp_secure'] = 'ssl'; // or 'tls'

// ---- Create PDO Connection ----
try {
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8mb4";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
