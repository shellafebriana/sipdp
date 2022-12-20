<?php
include '../koneksi.php';

$id_kategori = $_POST['id_kategori'];
$nm_kode = $_POST['nm_kode'];

mysqli_query($koneksi, "INSERT INTO kode VALUES ('','$id_kategori','$nm_kode')");

header("location:../../../admin/kode.php");
