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

// Proses pendaftaran
if (isset($_POST['register'])) {
    $inputUsername = trim($_POST['username']);
    $inputPassword = $_POST['password'];
    $inputRole = $_POST['role'];

    // Hash password
    $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);

    // Insert data pengguna ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $inputUsername, $hashedPassword, $inputRole);
    
    if ($stmt->execute()) {
        $success = "Pendaftaran berhasil! Silakan login.";
    } else {
        $error = "Pendaftaran gagal: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Menghubungkan file CSS -->
    <title>Registrasi</title>
</head>
<body>
<div class="form-container">
    <h2>Registrasi</h2>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    <?php if (isset($success)) echo "<div class='success'>$success</div>"; ?>
    <form action="register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <br>
        <label for="role">Role</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>
        <br>
        <button type="submit" class="button" name="register">Daftar</button>
    </form>
    <p>Sudah memiliki akun? <a href="login.php">Login di sini</a>.</p>
    </div>
</body>
</html>
