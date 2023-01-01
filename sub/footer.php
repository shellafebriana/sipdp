<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 3121101181 - 3121101184 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-triangle-exclamation"></i></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Logout" jika kamu sudah yakin untuk mengakhiri sesi</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- font awesome -->
<script src="../assets/fontawesome-free-6.2.1-web/js/all.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/chart-area-demo.js"></script>
<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>
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

    $("#unit").keyup(function() {
        var a = parseInt($("#unit").val());
        var b = parseInt($("#hargasatuan").val());
        var c = a * b;
        $("#biayapengeluaran").val(c);
    });


    $("#hargasatuan").keyup(function() {
        var a = parseInt($("#unit").val());
        var b = parseInt($("#hargasatuan").val());
        var c = a * b;
        $("#biayapengeluaran").val(c);
    });

    var ctx = document.getElementById('pendapatanAreaChart');
    var data = {
        label: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{

        }]
    }
</script>
</body>

</html>