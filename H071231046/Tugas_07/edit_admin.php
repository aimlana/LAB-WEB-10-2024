<!-- edit_admin.php -->
<?php
include 'connect.php';
$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE id = $id";
$user = $connect->query($query);

$result = $user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <!-- Bootstrap CSS (Version 5.0.2) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Center the card -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Edit Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form inside the card -->
                        <form action="proses_edit.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($result['id']) ?>">

                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($result['nama']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($result['nim']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?= htmlspecialchars($result['prodi']) ?>" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Version 5.0.2) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>