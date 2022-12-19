<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';

// GET DETAIL NOTA
$id_nota = $_GET['id-nota'];
$id_proyek = $_GET['id-proyek'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Nota</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="nota-proyek.php?id-proyek=<?= $id_proyek ?>" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>

    </div>

    <!-- Data Nota -->
    <div class="card shadow mt-4 mb-4">
        <div class="card-body row">
            <div class="col-xl-6 mb-4">
                <img src="../assets/img/nota/contoh_nota.jpg" alt="Contoh nota">
            </div>
            <div class="col-xl-6 mb-4">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Uraian</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nilai" value="uraian nota" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Unit</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="unit" autocomplete="off" disabled>
                    </div>
                    <label class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="satuan" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Harga Satuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="harga satuan" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="total" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="keterangan" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="pekerjaan" autocomplete="off" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>