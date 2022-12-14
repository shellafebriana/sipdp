<?php
    include '../koneksi.php';

    $id = $_POST['id_user'];

    mysqli_query($koneksi,"DELETE FROM user WHERE id='$id'");

    header("location:../../../admin/user.php");
?>