<?php
    include '../koneksi.php';
    
    $tanggal = $_POST['tgl'];
    $uraian = $_POST['uraian'];
    $unit = $_POST['unit'];
    $satuan = $_POST['satuan'];
    $hargasatuan = $_POST['harga_satuan'];
    $biayapengeluaran = $_POST['biaya_pengeluaran'];
    $pekerjaan = $_POST['pekerjaan'];
    $keterangan = $_POST['keterangan'];
    // $scannota = $_POST['scannota'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location:../../../manajer/tambah-nota.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 15728640){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../../manajer/gambar/'.$rand.'_'.$filename);
            // var_dump ("INSERT INTO nota VALUES ('','','','$tanggal','$uraian','$unit','$satuan','$hargasatuan','$biayapengeluaran','$pekerjaan','$keterangan','$xx')");
            // die;
            mysqli_query($koneksi, "INSERT INTO nota VALUES ('','','','$tanggal','$uraian','$unit','$satuan','$hargasatuan','$biayapengeluaran','$pekerjaan','$keterangan','$xx')");
            header("location:../../../manajer/nota-proyek.php?alert=berhasil");
        }else{
            header("location:../../../manajer/tambah-nota.php?alert=gagal_ukuran");
        }
    }

    // mysqli_query($koneksi, "INSERT INTO nota VALUES ('','$tanggal','$uraian','$unit','$satuan','$hargasatuan','$biayapengeluaran','$pekerjaan','$keterangan','$scannota')");


    // header("location:../../../manajer/nota-proyek.php");
?>