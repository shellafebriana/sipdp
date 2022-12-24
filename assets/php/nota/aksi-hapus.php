<?php
include '../koneksi.php';

$id = $_GET['id-proyek'];
$id_nota = $_GET['id-nota'];

$i = mysqli_query($koneksi, "SELECT * FROM nota WHERE id_nota ='$id_nota'");
$u =mysqli_fetch_array($i);
// var_dump ($u);
// die;
if(is_file("../../img/nota/".$u['gmbr_nota'])) unlink("../../img/nota/".$u['gmbr_nota']);
    mysqli_query($koneksi, "DELETE FROM nota WHERE id_nota ='$id_nota' ");
    echo "<script>alert('Data berhasil dihapus!');window.location='../../../manajer/nota-proyek.php?id-proyek=$id&id-nota=$id_nota&alert=berhasil';</script>";
