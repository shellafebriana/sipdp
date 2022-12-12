<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';
$id = $_GET['id-proyek'];
$data   = mysqli_query($koneksi, "SELECT * FROM proyek WHERE id_proyek = '$id'");
$d = mysqli_fetch_array($data);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Proyek</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="tambah-nota.php" class="btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-plus fa-sm text-white-50"></i>
                Tambah Nota
            </a>
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
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Uraian Nota</th>
                            <th>Biaya Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $data   = mysqli_query($koneksi, "SELECT * FROM nota");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['uraian']; ?></td>
                                <td><?= $d['biaya_pengeluaran']; ?></td>
                                <td><?= $d['keterangan']; ?></td>
                                <td>
                                    <a href="edit-nota.php?id-nota=<?= $d['id_nota']; ?>" class="btn btn-warning btn-circle">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="../assets/php/nota/aksi-hapus.php?id-nota=<?= $d['id_nota']; ?>" class="btn btn-danger btn-circle">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>