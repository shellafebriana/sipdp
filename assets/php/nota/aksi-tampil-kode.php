<?php 
    include '../koneksi.php';

    $kategori = $_POST['id_kategori'];
    $tampil=mysqli_query($koneksi,"SELECT * FROM kode WHERE id_kategori='$kategori'");
    $jml=mysqli_num_rows($tampil);
    
    if($jml > 0){    
        while($r=mysqli_fetch_array($tampil)){
            ?>
            
            <option value="<?php echo $r['id_kode'] ?>"><?php echo $r['nm_kode'] ?></option>
            <?php        
        }
    }else{
        echo "<option selected>- Data Kode tidak ada, Silahkan Pilih Kategori -</option>";
    }
 
?>