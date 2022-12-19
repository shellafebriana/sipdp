<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';
// GET DETAIL PROYEK
$id = $_GET['id-proyek'];
$proyek   = mysqli_query($koneksi, "SELECT * FROM proyek WHERE id_proyek = '$id'");
$d = mysqli_fetch_array($proyek);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Proyek</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="proyek.php" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>

    </div>

    <!-- Detail Proyek -->
    <div class="row">

        <!-- Nama Kegiatan Card  -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nama Proyek</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $d['nm_kegiatan'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lokasi Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Lokasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $d['lokasi'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-location-dot fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Waktu Pelaksanaan Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Waktu Pelaksanaan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= tgl_indo($d['waktu_pelaksanaan']) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Data Proyek -->
    <div class="card shadow mt-4 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian Nota</th>
                            <th>Biaya Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>uraian</td>
                            <td>biaya</td>
                            <td>keterangan</td>
                            <td>
                                <a href="detail-nota.php?id-proyek=<?= $_GET['id-proyek'] ?>&id-nota=1" class="btn btn-info btn-circle">
                                    <i class="fa-solid fa-info"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Biaya Pengeluaran</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <th colspan="3">Sumber Dana / Nilai Kontrak</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <th colspan="3">Sisa</th>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>