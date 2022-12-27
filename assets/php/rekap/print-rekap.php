<?php
include '../koneksi.php';
$dari = $_GET['tgl-awal'];
$sampai = $_GET['tgl-akhir'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../img/person-digging-solid.png">

    <title>Laporan Penggunaan Dana Proyek Periode <?= tgl_indo($dari) ?> s/d <?= tgl_indo($sampai) ?></title>

    <!-- Custom fonts for this template-->
    <link href="../../fontawesome-free-6.2.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" onload="print()">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <center>
                        <h1 class="h1 mb-4 text-uppercase font-weight-bolder">Laporan Penggunaan Dana Proyek</h1>

                        <hr>

                        <h5 class="font-weight-bolder">Periode <?= tgl_indo($dari) ?> s/d <?= tgl_indo($sampai) ?></h5>
                    </center>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr class="thead text-uppercase">
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
                            $sqlp = "SELECT proyek.id_proyek, nm_kegiatan FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek WHERE nota.tgl BETWEEN '" . $dari . "' AND '" . $sampai . "' group by  nm_kegiatan";
                            $total = 0;
                            $sisa = 0;
                            $data = mysqli_query($koneksi, $sqlp);
                            while ($p = mysqli_fetch_array($data)) {
                            ?>
                                <tr class="text-uppercase">
                                    <td colspan="10" class="font-weight-bold">Nama Proyek : <?= $p['nm_kegiatan'] ?></td>
                                </tr>
                                <?php
                                $no = 1;
                                $subtotal = 0;
                                $sqln = "SELECT * FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek JOIN kategori_nota ON kategori_nota.id_kategori = nota.id_kategori JOIN kode ON kode.id_kode = nota.id_kode WHERE nota_proyek.id_proyek = " . $p['id_proyek'] . " group by nota.id_nota, nm_kegiatan";
                                $nota = mysqli_query($koneksi, $sqln);
                                while ($n = mysqli_fetch_array($nota)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $n['nm_kategori'] ?></td>
                                        <td><?= $n['nm_kode'] ?></td>
                                        <td><?= $n['uraian'] ?></td>
                                        <td><?= $n['unit'] ?></td>
                                        <td><?= $n['satuan'] ?></td>
                                        <td><?= $n['keterangan'] ?></td>
                                        <td><?= $n['pekerjaan'] ?></td>
                                        <td><?= rupiah($n['harga_satuan']) ?></td>
                                        <td><?= rupiah($n['biaya_pengeluaran']) ?></td>
                                    </tr>

                                <?php
                                    $subtotal += $n['biaya_pengeluaran'];
                                    $subsisa = $n['nilai_kontrak'] - $subtotal;
                                }
                                ?>
                                <tr>
                                    <td colspan="9" class="text-right font-weight-bold text-uppercase">Subtotal</td>
                                    <td class="font-weight-bold"><?= rupiah($subtotal); ?></td>
                                </tr>
                            <?php
                                $total += $subtotal;
                                $sisa += $subsisa;
                            }
                            ?>
                            <tr>
                                <td colspan="9" class="font-weight-bold text-uppercase">Total Pengeluaran </td>
                                <td class="font-weight-bold"><?= rupiah($total) ?></td>
                            </tr>
                            <tr>
                                <td colspan="9" class="font-weight-bold text-uppercase">Sisa </td>
                                <td class="font-weight-bold"><?= rupiah($sisa) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
</body>

</html>