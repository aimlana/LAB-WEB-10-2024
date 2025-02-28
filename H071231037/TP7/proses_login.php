<?php
     include 'connection.php';
     
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        
       
        
        $in = $conn ->prepare("INSERT INTO users (username,password) VALUES (?,?)");
        $in -> bind_param('ss',$username,$password);
        
        if($username == 'admin' && $password == 'admin123'){
            header('Location: dashboard.php');
            
        }else{
            header('Location: input.php');
        }
    }

?>


