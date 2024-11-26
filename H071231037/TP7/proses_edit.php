<?php
    include 'connection.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $program_studi = $_POST['program_studi'];
        $id = $_POST['id'];

  
        $query = $conn->prepare("UPDATE data_mahasiswa SET nama = ?, nim = ?, program_studi = ? WHERE id = ?");
        $query->bind_param('sssi', $nama, $nim, $program_studi, $id);
        
        
        if ($query->execute()) {
            header('Location: dashboard.php'); 
            exit(); 
        } else {
            echo "ERROR: " . $query->error;
        }

        $query->close();
    }
    $conn->close();
?>
