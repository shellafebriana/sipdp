<?php
include '../koneksi.php';

$id_kode = $_POST['id_kode'];
$id_kategori = $_POST['id_kategori'];
$nm_kode = $_POST['nm_kode'];

mysqli_query($koneksi, "UPDATE kode SET nm_kode='$nm_kode', id_kategori='$id_kategori' WHERE id_kode='$id_kode'");

header("location:../../../admin/kode.php");
