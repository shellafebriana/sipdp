<?php
    include '../sub/head.php';
    include '../assets/php/koneksi.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Nota Barang</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="../assets/php/nota/aksi-tambah.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_GET['id-proyek']?>" name="id_proyek">
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kategori" name="kategori">
                        <option>Pilih Kategori</option>
                            <?php
                                // include '../assets/php/koneksi.php';

                                $data = mysqli_query($koneksi,"SELECT * FROM kategori_nota");
                                while ($d = mysqli_fetch_array($data)){
                            ?>
                            <option value="<?php echo $d['id_kategori'] ?>"><?php echo $d['nm_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kode" name="kode">
                            <!-- <option>Pilih Kode</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tgl">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="uraian" name="uraian" placeholder="input uraian">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="unit" name="unit" placeholder="input unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="input satuan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hargasatuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="hargasatuan" name="harga_satuan" placeholder="input harga satuan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="biayapengeluaran" class="col-sm-2 col-form-label">Biaya Pengeluaran</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="biayapengeluaran" name="biaya_pengeluaran" placeholder="input biaya pengeluaran">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="input pekerjaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="input keterangan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scannota" class="col-sm-2 col-form-label">Scan Nota</label>
                    <input type="file" id="scannota" name="foto">
                    <p style="color: red" >Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                </div>
            <input type="submit" class="btn btn-primary" style="float: right;" value="Simpan">
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $('#kategori').change(function() { 
        var kategori = $(this).val(); 
        $.ajax({
            type: 'POST', 
            url: '../assets/php/nota/aksi-tampil-kode.php', 
            data: 'id_kategori=' + kategori, 
            success: function(response) { 
                $('#kode').html(response); 
            }
        });
    });

</script>

<?php
    include '../sub/footer.php';
?>