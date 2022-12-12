<?php
include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah User</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/user/aksi-tambah.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="level">Level User</label>
                    <select class="form-control" name="level_user">
                        <option>Pilih User</option>
                        <option>Admin</option>
                        <option>Manajer</option>
                        <option>Bos</option>
                    </select>
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