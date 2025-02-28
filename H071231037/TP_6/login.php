<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styless.css"> 
</head>
<body>
    <h1>LOGIN</h1>
    <div class="login">
        <form method="post" action="proses.php">
            <label for="user_cred">Username</label>
            <input type="text" name="user_cred" id="user_cred" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Submit</button>
            <a href="">Don't have an account? Register here</a>
        </form>
    </div>
</body>
</html>
