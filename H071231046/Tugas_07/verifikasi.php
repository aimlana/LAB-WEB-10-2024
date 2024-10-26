<?php
session_start(); // Mulai session
include 'connect.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan pengguna berdasarkan username
    $query = $connect->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password (dengan hash)
        if (password_verify($password, $user['password'])) {
            // Jika login berhasil
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username']; // Simpan username di session
            if ($user['username'] === "adminxxx") {
                header("Location: home_admin.php"); // Redirect ke halaman dashboard
                exit();
            } else {
                header("Location: home_user.php"); // Redirect ke halaman dashboard
                exit();
            }
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
