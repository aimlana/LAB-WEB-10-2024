<!-- File connect.php -->
<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$database = 'praktikum';

$connect = new mysqli($server_name, $username, $password, $database);

if ($connect->connect_error) {
    die('koneksi gagal' . $connect->connect_error);
}
