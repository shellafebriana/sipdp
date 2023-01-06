<?php
include '../koneksi.php';

$id = $_POST['id_proyek'];
$id_kategori = $_POST['kategori'];
$id_kode = $_POST['kode'];
$tanggal = $_POST['tgl'];
$uraian = $_POST['uraian'];
$unit = $_POST['unit'];
$satuan = $_POST['satuan'];
$hargasatuan = $_POST['hargasatuan'];
$biayapengeluaran = $_POST['biayapengeluaran'];
$pekerjaan = $_POST['pekerjaan'];
$keterangan = $_POST['keterangan'];

$rand = rand();
$ekstensi =  array('png', 'jpg', 'jpeg', 'pdf');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    header("location:../../../admin/tambah-nota.php?alert=gagal_ekstensi");
} else {
    if ($ukuran < 15728640) {
        $xx = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../img/nota/' . $rand . '_' . $filename);
        mysqli_query($koneksi, "INSERT INTO nota VALUES ('','$id_kategori','$id_kode','$tanggal','$uraian',
                '$unit','$satuan','$hargasatuan','$biayapengeluaran','$pekerjaan','$keterangan','$xx')");
        $id_nota = mysqli_insert_id($koneksi);
        mysqli_query($koneksi, "INSERT INTO nota_proyek VALUES ('','$id','$id_nota')");
        header("location:../../../admin/nota-proyek.php?id-proyek=$id&alert=berhasil_ditambah");
    } else {
        header("location:../../../admin/tambah-nota.php?id-proyek=$id&alert=gagal_ukuran");
    }
}
