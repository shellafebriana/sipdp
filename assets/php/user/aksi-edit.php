<?php
include '../koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password' WHERE id_user='$id'");

header("location:../../../admin/user.php");
