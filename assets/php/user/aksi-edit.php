<?php
    include '../koneksi.php';

    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $_POST['level_user'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', user='$user' WHERE id_user='$id'");

    header("location:../../../admin/user.php");
?>