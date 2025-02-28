<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>
  <body>
    
    
  
  
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">NIM</th>
          <th scope="col">Program Studi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'connection.php';
          
          $query = 'SELECT * FROM data_mahasiswa';
          $users = $conn->query($query);

          if ($users->num_rows > 0) {
            foreach($users as $row) {
        ?>
              <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['program_studi']) ?></td>
                <td> <a class="btn btn-warning" href="update.php?id=<?= htmlspecialchars($row['id']) ?>">Edit</a>
                <a class="btn btn-danger" href="proses_hapus.php?id=<?= htmlspecialchars($row['id']) ?>">Delete</a>
              </tr>
        <?php
            }
          } else {
             echo "<tr><td colspan='4'>Data Kosong</td></tr>";
          }
        ?>
      </tbody>
    </table>
    <a class="btn btn-danger" href="logout.php">Halaman Utama</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
