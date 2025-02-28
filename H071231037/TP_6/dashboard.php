<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_dashboardAdmin.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['name']); ?></h1>
    <p>Email: <?= htmlspecialchars($user['email']); ?></p>
    <p>Username: <?= htmlspecialchars($user['username']); ?></p>

    


    

    <?php if ($user['username'] === 'adminxxx'): ?>
        <h2>All Users</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Faculty</th>
                <th>Batch</th>
            </tr>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['name']); ?></td>
                        <td><?= htmlspecialchars($u['email']); ?></td>
                        <td><?= htmlspecialchars($u['username']); ?></td>
                        <td><?= htmlspecialchars($u['gender'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($u['faculty'] ?? '-'); ?></td>
                        <td><?= htmlspecialchars($u['batch'] ?? '-'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No users found.</td>
                </tr>
            <?php endif; ?>
        </table>
    <?php else: ?>
        <h2>Your Profile</h2>
        <p>Gender: <?= htmlspecialchars($user['gender']); ?></p>
        <p>Faculty: <?= htmlspecialchars($user['faculty']); ?></p>
        <p>Batch: <?= htmlspecialchars($user['batch']); ?></p>
    <?php endif; ?>

    <button><a href="logout.php">Logout</a></button>
</body>
</html>
