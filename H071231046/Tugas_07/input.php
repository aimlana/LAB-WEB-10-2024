<!-- input.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
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
                        <h4>Tambah Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form inside the card -->
                        <form action="proses_input.php" method="post">
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM" required>
                            </div>
                            <div class="mb-4">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Masukkan Prodi" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Kirim</button>
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