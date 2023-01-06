<?php
include '../koneksi.php';

$id = $_GET['id-kode'];

mysqli_query($koneksi, "DELETE FROM kode WHERE id_kode = '$id'");

header("location:../../../admin/kode.php");
