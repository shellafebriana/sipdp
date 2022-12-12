<?php
include '../sub/head.php';
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Proyek</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" placeholder="input nama kegiatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lokasi" placeholder="input lokasi kegiatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sumber" class="col-sm-3 col-form-label">Sumber Dana</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="sumber" placeholder="input sumber dana">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Waktu Pelaksanaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="waktu" placeholder="input waktu pelaksanaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="waktu" class="col-sm-3 col-form-label">Nilai Kontrak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nilai" placeholder="input nilai kontrak">
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-info" style="float: right;">Kirim</button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include '../sub/footer.php';
?>