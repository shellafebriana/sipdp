<?php
include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah User</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control" id="user" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="pasword" class="form-control" id="user" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="level">Level User</label>
                    <select class="form-control" id="level">
                        <option>Pilih User</option>
                        <option>Admin</option>
                        <option>Manajer</option>
                        <option>Bos</option>
                    </select>
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