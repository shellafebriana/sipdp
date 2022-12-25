<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
?>

<?php include '../sub/head.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kode</h1>
        <a href="tambah-kode.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-solid fa-plus fa-sm text-white-50"></i>
            Tambah Kode
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
                            <th>Nama Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include '../assets/php/koneksi.php';

                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM kode");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nm_kode']; ?></td>
                                <td>
                                    <a href="edit-kode.php?id-kode=<?php echo $d['id_kode']; ?>" class="btn btn-warning btn-circle">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="../assets/php/kode/aksi-hapus.php?id-kode=<?php echo $d['id_kode']; ?>" class="btn btn-danger btn-circle">
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