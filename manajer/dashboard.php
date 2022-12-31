<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
    
    if($_SESSION['status']=="login"){
        if($_SESSION['level_user'] != "Manajer"){
            echo "<script> alert('Maaf Anda tidak Memiliki HAK AKSES.')</script>";

            if($_SESSION['level_user'] == "Admin"){
                header("Location: ../admin/dashboard.php");
            } else{
                header("Location: ../bos/dashboard.php");
            }
        }
?>

<?php include '../sub/head.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>

<?php
}else{
    echo "Maaf Anda Belum Melakukan Login";
}
?>