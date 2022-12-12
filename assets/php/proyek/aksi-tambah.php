<?php
include '../koneksi.php';

$nm_kegiatan        = $_POST['nm_kegiatan'];
$lokasi             = $_POST['lokasi'];
$sumber_dana        = $_POST['sumber_dana'];
$waktu_pelaksanaan  = $_POST['waktu_pelaksanaan'];
$nilai_kontrak      = $_POST['nilai_kontrak'];

mysqli_query($koneksi, "INSERT INTO proyek VALUES ('', '$nm_kegiatan','$lokasi','$sumber_dana','$waktu_pelaksanaan','$nilai_kontrak')");

header("location:../../../admin/proyek.php");
