<?php
include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Kategori</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/kategori/aksi-tambah.php">
                <div class="form-group">
                    <label for="nama kategori">Nama Kategori</label>
                    <input type="text" class="form-control" name="nm_kategori" placeholder="Input Nama Kategori" autocomplete="off">
                </div>
                <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include '../sub/footer.php';
?>