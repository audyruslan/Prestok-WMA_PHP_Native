<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        Swal.fire({
            title: '<?= $_SESSION['status'];  ?>',
            icon: '<?= $_SESSION['status_icon'];  ?>',
            text: '<?= $_SESSION['status_info'];  ?>'
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>

<script>
    $(function() {
        // DataTable Barang
        $("#barangTable").DataTable({
            "language": {
                url: 'assets/json/id.json'
            }
        });

    });

    // Hapus Data Barang
    $(document).on('click', '.hapus_barang', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Barang!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });

    // Hapus Data Penjualan Barang
    $(document).on('click', '.hapus_penjualan', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Barang!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });

    // Hapus Data Peramalan
    $(document).on('click', '.hapus_peramalan', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Peramalan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });

    // Hapus Administrator
    $(document).on('click', '.hapus_admin', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Administrator!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });
</script>

</body>

</html>