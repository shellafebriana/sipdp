<?php
include '../koneksi.php';

$id_kategori = $_POST['id_kategori'];
$nm_kategori = $_POST['nm_kategori'];

mysqli_query($koneksi, "UPDATE kategori_nota SET nm_kategori='$nm_kategori'WHERE id_kategori='$id_kategori'");

header("location:../../../admin/kategori.php");
