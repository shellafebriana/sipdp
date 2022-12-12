<?php
include '../koneksi.php';

$id  = $_GET['id-proyek'];
mysqli_query($koneksi, "DELETE FROM proyek WHERE id_proyek = '$id'");

header("location:../../../admin/proyek.php");
