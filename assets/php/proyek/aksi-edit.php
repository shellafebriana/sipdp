<?php
include '../koneksi.php';

$id                 = $_POST['id'];
$nm_kegiatan        = $_POST['nm_kegiatan'];
$lokasi             = $_POST['lokasi'];
$sumber_dana        = $_POST['sumber_dana'];
$waktu_pelaksanaan  = $_POST['waktu_pelaksanaan'];
$nilai_kontrak      = $_POST['nilai_kontrak'];

mysqli_query($koneksi, "UPDATE proyek SET nm_kegiatan = '$nm_kegiatan', lokasi = '$lokasi', sumber_dana = '$sumber_dana', waktu_pelaksanaan = '$waktu_pelaksanaan', nilai_kontrak = '$nilai_kontrak' WHERE id_proyek = '$id'");

header("location:../../../admin/proyek.php");
