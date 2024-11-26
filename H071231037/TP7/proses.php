

<?php

    include 'connection.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = $_POST ['nama'];
        $nim = $_POST ['nim'];
        $program_studi = $_POST ['program_studi'];
        
        $in = $conn ->prepare("INSERT INTO data_mahasiswa (nama,nim,program_studi) VALUES (?,?,?)");
        $in -> bind_param('sss',$nama,$nim,$program_studi);
        
        if($in->execute()){
            header('Location: dashboard_mhs.php');
            
        }else{
            echo"Error: " .$in->error;
        }
    }



    ?>
