<?php
session_start();
include '../assets/php/koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if ($_SESSION['status'] == "login") {
    if ($_SESSION['level_user'] != "Admin") {
        echo "<script> alert('Maaf Anda tidak Memiliki HAK AKSES.')</script>";

        if ($_SESSION['level_user'] == "Manajer") {
            header("Location: ../manajer/dashboard.php");
        } else {
            header("Location: ../bos/dashboard.php");
        }
    }

    $month = date('m');
    $year = date('Y');
?>

    <?php include '../sub/head.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <!-- Content Row -->
        <div class="row">
            <?php
            $sqlp = mysqli_query($koneksi, "SELECT COUNT(id_proyek) as proyek , SUM(nilai_kontrak) as dana FROM `proyek` WHERE month(waktu_pelaksanaan) = $month AND year(waktu_pelaksanaan) = $year");
            $p = mysqli_fetch_array($sqlp);
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Proyek (<?= date('M') ?>)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $p['proyek'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Dana Proyek (<?= date('M') ?>)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($p['dana']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sqln = mysqli_query($koneksi, "SELECT SUM(nota.biaya_pengeluaran) as pengeluaran FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek  WHERE month(nota.tgl) = $month AND year(nota.tgl) = $year");
            $n = mysqli_fetch_array($sqln);
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran (<?= date('M') ?>)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= rupiah($n['pengeluaran']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pendapatan (<?= date('M') ?>)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($p['dana'] - $n['pengeluaran']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pendapatan Bulanan PT Cipta Karya Bagus Periode <?= date('Y') ?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php include '../sub/footer.php'; ?>

<?php
} else {
    echo "Maaf Anda Belum Melakukan Login";
}
?>