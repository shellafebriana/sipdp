<?php
include '../sub/head.php';
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Proyek</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="../assets/php/proyek/aksi-tambah.php" method="POST">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nm_kegiatan" placeholder="input nama kegiatan" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="input lokasi kegiatan" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sumber" class="col-sm-3 col-form-label">Sumber Dana</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="sumber" name="sumber_dana" placeholder="input sumber dana" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Waktu Pelaksanaan</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="waktu" name="waktu_pelaksanaan" placeholder="input waktu pelaksanaan" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nilai" name="nilai_kontrak" placeholder="input nilai kontrak" autocomplete="off">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include '../sub/footer.php';
?>