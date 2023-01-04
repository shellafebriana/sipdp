<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>

<?php
include '../sub/head.php';
include '../assets/php/koneksi.php';
$id = $_GET['id-nota'];
$data = mysqli_query($koneksi, "SELECT * FROM nota JOIN kode ON nota.id_kode = kode.id_kode WHERE id_nota='$id'");
$d = mysqli_fetch_array($data);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit Nota Barang</h1>
        <div class="d-none d-sm-inline-block ">
            <a href="nota-proyek.php?id-proyek=<?php echo $_GET['id-proyek'] ?>" class="btn btn-sm btn-danger shadow-sm">
                <i class="fa-solid fa-caret-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/nota/aksi-edit.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_GET['id-proyek'] ?>" name="id_proyek">
                <input type="hidden" value="<?php echo $_GET['id-nota'] ?>" name="id_nota">
                <input type="hidden" name="id_kategori">
                <input type="hidden" name="id_kode">
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kategori" name="id_kategori">
                            <option>Pilih Kategori</option>
                            <?php
                            // include '../assets/php/koneksi.php';
                            $dk = mysqli_query($koneksi, "SELECT * FROM kategori_nota");
                            while ($k = mysqli_fetch_array($dk)) {
                            ?>
                                <option value="<?php echo $k['id_kategori'] ?>" <?php
                                                                                if ($k['id_kategori'] == $d['id_kategori']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>><?php echo $k['nm_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kode" name="id_kode">
                            <!-- <option>Pilih Kode</option> -->
                            <option value="<?php echo $d['id_kode'] ?>"> <?php echo $d['nm_kode'] ?> </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tgl" value="<?php echo $d['tgl'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="uraian" name="uraian" value="<?= $d['uraian'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="unit" name="unit" value="<?php echo $d['unit'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $d['satuan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hargasatuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="hargasatuan" name="hargasatuan" value="<?php echo $d['harga_satuan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="biayapengeluaran" class="col-sm-2 col-form-label">Biaya Pengeluaran</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="biayapengeluaran" name="biayapengeluaran" value="<?php echo $d['biaya_pengeluaran'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $d['pekerjaan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $d['keterangan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scannota" class="col-sm-2 col-form-label">Scan Nota</label>
                    <img src="../assets/img/nota/<?php echo $d['gmbr_nota'] ?>" width="150px" height="120px" /></br>
                    <div class="col-sm-10">
                        <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                        <input type="file" id="scannota" name="foto" class="form-control">
                        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
                    </div>
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