<?php
include 'connect.php';

$id = $_GET['id'];

$query = $connect->prepare("delete FROM mahasiswa where id = ?");
$query -> bind_param('i', $id);

if($query->execute()){
    $connect->close();
    header("Location: home_admin.php");
}
else{
    echo "error".$query->error;
}
?>