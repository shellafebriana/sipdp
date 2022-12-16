<?php
    include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Nota Barang</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="uraian" placeholder="input uraian">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="unit" placeholder="input unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" placeholder="input satuan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="biaya" class="col-sm-2 col-form-label">Biaya Pengeluaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="biaya" placeholder="input biaya pengeluaran">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" placeholder="input pekerjaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" placeholder="input keterangan">
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-info" style="float: right;">Kirim</button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
    include '../sub/footer.php';
?>