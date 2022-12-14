<?php include '../sub/head.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proyek</h1>
        <a href="tambah-proyek.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus fa-sm text-white-50"></i>
            Tambah Proyek
        </a>
    </div>

    <!-- Data Proyek -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include '../assets/php/koneksi.php';
                        $no = 1;
                        $data   = mysqli_query($koneksi, "SELECT * FROM proyek");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['nm_kegiatan']; ?></td>
                                <td><?= $d['lokasi']; ?></td>
                                <td><?= tgl_indo($d['waktu_pelaksanaan']); ?></td>
                                <td>
                                    <a href="edit-proyek.php?id-proyek=<?= $d['id_proyek']; ?>" class="btn btn-warning btn-circle">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="../assets/php/proyek/aksi-hapus.php?id-proyek=<?= $d['id_proyek']; ?>" class="btn btn-danger btn-circle">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    <a href="nota-proyek.php?id-proyek=<?= $d['id_proyek']; ?>" class="btn btn-info btn-circle">
                                        <i class="fa-solid fa-info"></i>
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