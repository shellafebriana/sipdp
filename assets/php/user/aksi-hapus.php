<?php
    include '../koneksi.php';

    $id = $_GET['id-user'];

    mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id'");

    header("location:../../../admin/user.php");
?>