<?php
    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $query = $conn->prepare('DELETE FROM data_mahasiswa WHERE id = ?');
        $query->bind_param('i', $id);


        if ($query->execute()) {
            header('Location: dashboard.php'); 
            exit();
        } else {
            echo "Error deleting record: " . $query->error;
        }

        $query->close();
    } 

    $conn->close();
?>
