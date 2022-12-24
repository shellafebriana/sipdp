<?php
    include '../koneksi.php';

    $id = $_POST['id_proyek'];
    $id_nota = $_POST['id_nota'];
    $id_kategori = $_POST['id_kategori'];
    $id_kode = $_POST['id_kode'];
    $tanggal = $_POST['tgl'];
    $uraian = $_POST['uraian'];
    $unit = $_POST['unit'];
    $satuan = $_POST['satuan'];
    $hargasatuan = $_POST['harga_satuan'];
    $biayapengeluaran = $_POST['biaya_pengeluaran'];
    $pekerjaan = $_POST['pekerjaan'];
    $keterangan = $_POST['keterangan'];

    // Cek apakah user ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
        // Ambil data foto yang dipilih dari form
        $sumber = $_FILES['foto']['name'];
        $nama_gambar = $_FILES['foto']['tmp_name'];
        
        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
        $fotobaru = date('dmYHis').$sumber;

        // Set path folder tempat menyimpan fotonya
        $path = "../../img/nota/".$fotobaru;

        if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Query untuk menampilkan data user berdasarkan id_user yang dikirim
            $query = "SELECT * FROM nota WHERE id_nota='$id_nota'";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            // Cek apakah file gambar sebelumnya ada di folder foto
            if(is_file("../../img/nota/".$data['gmbr_nota'])) // Jika gambar ada
                unlink("../../img/nota/".$data['gmbr_nota']); // Hapus file gambar sebelumnya yang ada di folder images
        
            // Proses ubah data ke Database
            $query = "UPDATE nota SET id_kategori = '$id_kategori', id_kode = '$id_kode' ,
            tgl = '$tanggal', uraian = '$uraian', unit = '$unit', harga_satuan = '$hargasatuan',
            biaya_pengeluaran = '$biayapengeluaran', pekerjaan = '$pekerjaan', keterangan= '$keterangan',
            gmbr_nota='$fotobaru' WHERE id_nota = '$id_nota'";
            $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location: ../../../manajer/nota-proyek.php?id-proyek=$id&id-nota=$id_nota&alert=berhasil"); // Redirect ke halaman index.php
            }else{
                // Jika Gagal, Lakukan :
                echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data.');window.location='../../../manajer/edit_nota.php?id-proyek=$id&id-nota=$id_nota&alert=tidakberhasil';</script>";
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            echo   "<script> alert('Maaf, Gambar gagal untuk diupload'); 
                    location = '../../../manajer/edit_nota.php?id-proyek=$id&id-nota=$id_nota&alert=tidakberhasil'; 
                    </script>";
        }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
        // Proses ubah data ke Database
        $query = "UPDATE nota SET id_kategori = '$id_kategori', id_kode = '$id_kode' ,
        tgl = '$tanggal', uraian = '$uraian', unit = '$unit', harga_satuan = '$hargasatuan',
        biaya_pengeluaran = '$biayapengeluaran', pekerjaan = '$pekerjaan', keterangan= '$keterangan'
        WHERE id_nota = '$id_nota'";
        $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
        // var_dump ($sql);
        // die;
        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: ../../../manajer/nota-proyek.php?id-proyek=$id&id-nota=$id_nota&alert=berhasil"); // Redirect ke halaman index.php
        }else{
            // Jika Gagal, Lakukan :
            echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data.');window.location='../../../manajer/edit-nota.php?id-proyek=$id&id-nota=$id_nota&alert=tidakberhasil';</script>";
        }
    }
?>