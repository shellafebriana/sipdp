<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
?>

<?php
include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Kode</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/kode/aksi-tambah.php">
                <div class="form-group">
                    <label for="nama kode">Nama Kode</label>
                    <input type="text" class="form-control" name="nm_kode" placeholder="Input Nama kode" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nama kode">Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <option>Pilih Kategori</option>
                        <?php

                        include '../assets/php/koneksi.php';

                        $sql = mysqli_query($koneksi, "SELECT * FROM kategori_nota");
                        while ($k = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nm_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include '../sub/footer.php';
?>