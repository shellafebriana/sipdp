<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
include '../sub/head.php';
include '../assets/php/koneksi.php';
$dari = '';
$sampai = '';
$sqlperiode = '';

if (!empty($_POST['dari']) && !empty($_POST['sampai'])) {
    $dari       = isset($_POST['dari']) ? $_POST['dari'] : date('Y-m') . "-01";
    $sampai     = isset($_POST['sampai']) ? $_POST['sampai'] : date('Y-m-d');
    $sqlperiode = "WHERE nota.tgl BETWEEN '" . $dari . "' AND '" . $sampai . "'";
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rekap</h1>


    <div class="card shadow mb-4">
        <div class="card-header align-items-center">
            <div class="row mt-2">
                <div class="col-sm-8 mb-3">
                    <form action="" method="post" class="form-group row">
                        <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="dari" name="dari">
                        </div>
                        <label for="sampai" class="col-sm-2 col-form-label">Sampai</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="sampai" name="sampai">
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary" name="tampil" value="Tampilkan">
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 mb-3">
                    <a href="../assets/php/rekap/print-rekap.php?tgl-awal=<?= $dari ?>&tgl-akhir=<?= $sampai ?>" class="btn btn-primary mr-2" style="float:right" target="_blank"><i class="fa-solid fa-print"></i></a>
                    <a href="../assets/php/rekap/excel-rekap.php?tgl-awal=<?= $dari ?>&tgl-akhir=<?= $sampai ?>" class="btn btn-success mr-2" style="float:right" target="_blank"><i class="fa-solid fa-file-excel"></i></a>
                    <a href="../assets/php/rekap/pdf-rekap.php?tgl-awal=<?= $dari ?>&tgl-akhir=<?= $sampai ?>" class="btn btn-danger mr-2" style="float:right" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                </div>

            </div>
        </div>
        <div class="card-body" id="tampil-rekap">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Kode</th>
                        <th>Uraian Nota</th>
                        <th>Unit</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                        <th>Pekerjaan</th>
                        <th>Harga Satuan</th>
                        <th>Biaya Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_POST['dari']) && !empty($_POST['sampai'])) {
                        $no = 1;
                        $total = 0;
                        $sisa = 0;
                        $subsisa = 0;
                        $sql = "SELECT * FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek JOIN kategori_nota ON kategori_nota.id_kategori = nota.id_kategori JOIN kode ON kode.id_kode = nota.id_kode $sqlperiode group by nota.id_nota";
                        $data = mysqli_query($koneksi, $sql);
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nm_kategori'] ?></td>
                                <td><?= $d['nm_kode'] ?></td>
                                <td><?= $d['uraian'] ?></td>
                                <td><?= $d['unit'] ?></td>
                                <td><?= $d['satuan'] ?></td>
                                <td><?= $d['keterangan'] ?></td>
                                <td><?= $d['pekerjaan'] ?></td>
                                <td><?= rupiah($d['harga_satuan']) ?></td>
                                <td><?= rupiah($d['biaya_pengeluaran']) ?></td>
                            </tr>

                        <?php
                            $total += $d['biaya_pengeluaran'];
                            $subsisa = $d['nilai_kontrak'] - $total;
                        }
                        $sisa += $subsisa;
                        ?>
                        <tr>
                            <td colspan="9" class="font-weight-bold text-uppercase">Total Pengeluaran </td>
                            <td class="font-weight-bold"><?= rupiah($total) ?></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="font-weight-bold text-uppercase">Sisa </td>
                            <td class="font-weight-bold"><?= rupiah($sisa) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>