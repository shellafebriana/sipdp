<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>

<?php
include '../sub/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit User</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="user.php" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            include '../assets/php/koneksi.php';
            $id = $_GET['id-user'];
            $data = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user ='$id'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <form method="post" action="../assets/php/user/aksi-edit.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">
                        <input type="text" class="form-control" name="username" value="<?php echo $d['username']; ?>" placeholder="username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $d['password']; ?>" placeholder="password">
                    </div>
                    <input type="submit" class="btn btn-warning" style="float: right;" value="Simpan">
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include '../sub/footer.php';
?>