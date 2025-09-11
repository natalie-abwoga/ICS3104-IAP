<?php
require_once __DIR__ . '/conf.php';
 // adjust path if needed

try {
    // Connect to DB
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8mb4";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch users in ascending order (by name, or by id/email if you prefer)
    $stmt = $pdo->query("SELECT id, name, email FROM users ORDER BY name ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>List of Registered Users</h2>

  <?php if (count($users) > 0): ?>
    <ol class="list-group list-group-numbered mt-3">
      <?php foreach ($users as $user): ?>
        <li class="list-group-item">
          <strong><?php echo htmlspecialchars($user['name']); ?></strong>
          (<?php echo htmlspecialchars($user['email']); ?>)
        </li>
      <?php endforeach; ?>
    </ol>
  <?php else: ?>
    <p>No users have signed up yet.</p>
  <?php endif; ?>
</body>
</html>
