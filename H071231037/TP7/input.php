<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="proses.php" method="POST">
        <div class="line">
            <h1>LOGIN</h1>
        </div>
       
        <img src="img/bashame.jpeg" alt="Profile Image">
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama" placeholder="Nama                                                                                                  " required>
        
        <label for="nim">NIM : </label>
        <input type="text" id="nim" name="nim" placeholder="NIM                                                                                                     " required>
        
        <label for="program_studi" id="p">Program Studi :</label>
        <input type="text" id="program_studi" name="program_studi" placeholder="Program Studi                                                                       " required>
        <p class="sign-up" style="background-color :white;">Not a Member? <a class="sign-up" style="background-color :white;text-decoration:none;" href="login.php">Sign up</a></p>
        <button type="submit">MASUK</button>
    </form>
    

    
</body>
</html>
