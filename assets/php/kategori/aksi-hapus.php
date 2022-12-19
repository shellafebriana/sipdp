<?php
include '../koneksi.php';

$id = $_GET['id-kategori'];

mysqli_query($koneksi, "DELETE FROM kategori_nota WHERE id_kategori = '$id'");

header("location:../../../admin/kategori.php");
