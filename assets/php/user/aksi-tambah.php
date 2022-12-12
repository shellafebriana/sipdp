<?php
    include '../koneksi.php';
    // echo "admin";
    // die;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $_POST['level_user'];

    mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password','$user')");

    header("location:../../../admin/user.php");
?>