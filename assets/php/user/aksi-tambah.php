<?php
    include '../koneksi.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $_POST['level_user'];

    mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password','$user')");

    header("location:../../../admin/user.php");
?>