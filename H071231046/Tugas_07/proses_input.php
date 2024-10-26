<?php
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    $query = $connect->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $query->bind_param("s",$nim);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Jika nim sudah ada, beri pesan error
        $message = "Nim sudah ada, coba buat yang lain!";
        echo "<script>alert('$message');  window.location.href='input.php?id=$id';</script>";
        exit();

    } else if (strlen($nim) != 10) {
        $message = "Nim memiliki panjang yang lebih atau kurang, pastikan kamu menginput 10 huruf!";
        echo "<script>alert('$message');  window.location.href='input.php?id=$id';</script>";
        exit();

    }else{
        $in = $connect->prepare("INSERT INTO mahasiswa (nama, nim, prodi) VALUES (?, ?,?)");

        $in->bind_param("sss", $nama, $nim, $prodi);    

        if ($in ->execute()) {
            $connect->close();
            header("Location: home_admin.php");
        } else {
            echo "Error" . $in->error;
        }
    }
}

?>