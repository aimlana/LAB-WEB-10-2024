<!-- home_user.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$name = htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Test</title>
    <!-- Bootstrap CSS (Version 5.0.2) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Selamat datang, <?php echo $name; ?>!</h1>

        <!-- Bootstrap Table -->
        <h2 class="text-center mb-4">Daftar Mahasiswa</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connect.php';

                    $query = 'SELECT * FROM mahasiswa';
                    $result = $connect->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $nama = htmlspecialchars($row['nama']);
                        $nim = htmlspecialchars($row['nim']);
                        $prodi = htmlspecialchars($row['prodi']);
                        $id = htmlspecialchars($row['id']);
                    ?>
                        <tr>
                            <td><?= $nama ?></td>
                            <td><?= $nim ?></td>
                            <td><?= $prodi ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Form logout dengan spacing tambahan -->
        <form action="logout.php" method="POST" class="mt-3 py-3">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Bootstrap JS (Version 5.0.2) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFyC2u8jFN1R5nIYfWf4Y9XVb5j1Q1dEshgckdKxP/ihBfDXz0g5WKGpA2" crossorigin="anonymous"></script>
</body>

</html>