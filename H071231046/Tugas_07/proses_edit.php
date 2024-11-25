<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $id = $_POST['id'];

    // Check if NIM already exists in the database for other students
    $query1 = $connect->prepare("SELECT * FROM mahasiswa WHERE nim = ? AND id != ?");
    $query1->bind_param("si", $nim, $id);  // 'i' for integer (id), 's' for string (nim)
    $query1->execute();
    $result = $query1->get_result();

    if ($result->num_rows > 0) {
        // NIM already exists in another record
        $message = "NIM sudah ada, coba buat yang lain!";
        echo "<script>alert('$message'); window.location.href='edit_admin.php?id=$id';</script>";
        exit(); // Stop script execution

    } else if (strlen($nim) != 10) {
        // Validate that the NIM must have exactly 10 characters
        $message = "NIM harus memiliki panjang 10 karakter!";
        echo "<script>alert('$message'); window.location.href='edit_admin.php?id=$id';</script>";
        exit(); // Stop script execution

    } else {
        // If NIM is valid and not duplicated, proceed with the update
        $query = $connect->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, prodi = ? WHERE id = ?");
        $query->bind_param("sssi", $nama, $nim, $prodi, $id);

        if ($query->execute()) {
            // Close connection and redirect to the admin home page
            $connect->close();
            header("Location: home_admin.php");
            exit(); // Stop script execution after redirection
        } else {
            // Error handling
            echo "Error: " . $query->error;
        }
    }
}
?>
