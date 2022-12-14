<?php include '../sub/head.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rekap</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="filter" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-10 form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected>Pilih Bulan</option>
                            <option value="0">Januari</option>
                            <option value="1">Februari</option>
                            <option value="2">Maret</option>
                            <option value="3">April</option>
                            <option value="4">Mei</option>
                            <option value="5">Juni</option>
                            <option value="6">Juli</option>
                            <option value="7">Agustus</option>
                            <option value="8">September</option>
                            <option value="9">Oktober</option>
                            <option value="10">November</option>
                            <option value="11">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="filter" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected>Pilih Tahun</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Print" class="btn btn-primary" style="float:right" role="button">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include '../sub/footer.php'; ?>