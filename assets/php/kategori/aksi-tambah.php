<?php
include '../koneksi.php';

$nm_kategori = $_POST['nm_kategori'];

mysqli_query($koneksi, "INSERT INTO kategori_nota VALUES ('','$nm_kategori')");

header("location:../../../admin/kategori.php");
