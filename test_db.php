<?php
require_once __DIR__ . "/conf.php";

try {
    $dsn = "mysql:host=" . $conf['db_host'] . ";dbname=" . $conf['db_name'] . ";charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "✅ Connected successfully to DB " . $conf['db_name'];
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
