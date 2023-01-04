<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>

<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';
$id = $_GET['id-proyek'];
$data   = mysqli_query($koneksi, "SELECT * FROM proyek WHERE id_proyek = '$id'");
$d = mysqli_fetch_array($data);
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Proyek</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="proyek.php" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="../assets/php/proyek/aksi-edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $d['id_proyek'] ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nm_kegiatan" placeholder="input nama kegiatan" autocomplete="off" value="<?= $d['nm_kegiatan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="input lokasi kegiatan" autocomplete="off" value="<?= $d['lokasi'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sumber" class="col-sm-3 col-form-label">Sumber Dana</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="sumber" name="sumber_dana" placeholder="input sumber dana" autocomplete="off" value="<?= $d['sumber_dana'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Waktu Pelaksanaan</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="waktu" name="waktu_pelaksanaan" placeholder="input waktu pelaksanaan" autocomplete="off" value="<?= $d['waktu_pelaksanaan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nilai" name="nilai_kontrak" placeholder="input nilai kontrak" autocomplete="off" value="<?= $d['nilai_kontrak'] ?>">
                    </div>
                </div>
                <input type="submit" class="btn btn-warning" style="float: right;" value="Simpan">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include '../sub/footer.php';
?>