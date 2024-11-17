<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

// Data semua user
$all_users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'nanda@gmail.com',
        'username' => 'nanda_aja',
        'name' => 'Wd. Ananda Lesmono',
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
        'password' => password_hash('nanda123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'arif@gmail.com',
        'username' => 'arif_nich',
        'name' => 'Muhammad Arief',
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2021',
        'password' => password_hash('arief123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'eka@gmail.com',
        'username' => 'eka59',
        'name' => 'Eka Hanny',
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021',
        'password' => password_hash('eka123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'name' => 'Adnan',
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
        'password' => password_hash('adnan123', PASSWORD_DEFAULT),
    ],
];

// Periksa apakah pengguna adalah admin
$isAdmin = $user['username'] === 'adminxxx';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard-container">
    <h2>Welcome, <?php echo $user['name']; ?>!</h2>
    <p><strong>Email    :</strong> <?php echo $user['email']; ?></p>
    <p><strong>Username :</strong> <?php echo $user['username']; ?></p>
    
    <?php if ($isAdmin): ?>
        <a href="logout.php" class="logout-btn">Logout</a>
        <div class="table-container">
            <h3>All Users</h3>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Faculty</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_users as $u): ?>
                        <?php if ($u['username'] !== 'adminxxx'): ?>
                        <tr>
                            <td><?php echo $u['name']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td><?php echo $u['username']; ?></td>
                            <td><?php echo isset($u['gender']) ? $u['gender'] : '-'; ?></td>
                            <td><?php echo isset($u['faculty']) ? $u['faculty'] : '-'; ?></td>
                            <td><?php echo isset($u['batch']) ? $u['batch'] : '-'; ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p><strong>Gender   :</strong> <?php echo isset($user['gender']) ? $user['gender'] : '-'; ?></p>
        <p><strong>Faculty  :</strong> <?php echo isset($user['faculty']) ? $user['faculty'] : '-'; ?></p>
        <p><strong>Batch    :</strong> <?php echo isset($user['batch']) ? $user['batch'] : '-'; ?></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    <?php endif; ?>
</div>
</body>

</html>
