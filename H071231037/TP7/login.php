<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="proses_login.php" method="POST">
        <div class="line">
            <h1>LOGIN</h1>
        </div>
       
        <img src="img/bashame.jpeg" alt="Profile Image">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" placeholder="Username                                                                                                  " required>
        
        <label for="password">Password : </label>
        <input type="password" id="password" name="password" placeholder="Password                                                                                                     " required>
        

        
        <button type="submit">MASUK</button>
    </form>
    

    
</body>
</html>
