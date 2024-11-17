<?php 
session_start();

// Koneksi ke database
$host = 'localhost'; 
$dbname = 'Tugas_07'; 
$username = 'root'; 
$password = ''; 

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if (isset($_POST['login'])) {
    $inputUsername = trim($_POST['username']);
    $inputPassword = $_POST['password'];

    // Mencari username yang dimasukkan di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Pencocokan username dan password
    if ($user) {
        if (password_verify($inputPassword, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; 
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}

// Logout user
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <!-- Display error if exists -->
        <?php if (isset($error)) echo "<div class='alert alert-danger error'>$error</div>"; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary button" name="login">Login</button>
        </form>
        <p>Belum memiliki akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
