<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>

<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';

$id = $_GET['id-kode'];
$sql = mysqli_query($koneksi, "SELECT * FROM kode WHERE id_kode = '$id'");
$kd = mysqli_fetch_array($sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Kode</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="kode.php" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/kode/aksi-edit.php">
                <div class="form-group">
                    <input type="hidden" name="id_kode" value="<?= $id ?>">
                    <label for="nama kode">Nama Kode</label>
                    <input type="text" class="form-control" name="nm_kode" placeholder="Input Nama kode" autocomplete="off" value="<?= $kd['nm_kode'] ?>">
                </div>
                <div class="form-group">
                    <label for="nama kode">Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <option>Pilih Kategori</option>
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori_nota");
                        while ($k = mysqli_fetch_array($kat)) {
                        ?>
                            <option value="<?= $k['id_kategori'] ?>" <?php
                                                                        if ($k['id_kategori'] == $kd['id_kategori']) {
                                                                            echo 'selected';
                                                                        }
                                                                        ?>><?= $k['nm_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-warning" style="float: right;" value="Simpan">
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