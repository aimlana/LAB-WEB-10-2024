<?php
    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $query = $conn->prepare("SELECT * FROM data_mahasiswa WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style_edit.css">
</head>
<body>
    <form action="proses_edit.php" method="POST">
        <h1>UPDATE DATA</h1>
        <img src="img/babameme.jpeg" alt="Profile Image">
        <input type="hidden" name="id" value="<?= htmlspecialchars($result['id']) ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($result['nama']) ?>" required>
        <br><br>
        
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?= htmlspecialchars($result['nim']) ?>" required>
        <br><br>

        <label for="program_studi" id="p">Program Studi:</label>
        <input type="text" name="program_studi" value="<?= htmlspecialchars($result['program_studi']) ?>" required>
        <br><br>
        
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
