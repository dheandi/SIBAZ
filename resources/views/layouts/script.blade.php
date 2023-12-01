<!-- Required vendors -->
    <script src="{{ asset('assets') }}/./vendor/global/global.min.js"></script>
    <script src="{{ asset('assets') }}/./js/quixnav-init.js"></script>
    <script src="{{ asset('assets') }}/./js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{ asset('assets') }}/./vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/morris/morris.min.js"></script>


    <script src="{{ asset('assets') }}/./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assets') }}/./vendor/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets') }}/./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assets') }}/./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ asset('assets') }}/./vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="{{ asset('assets') }}/./js/dashboard/dashboard-1.js"></script>

        <!-- Required vendors -->
    <script src="{{ asset('assets') }}/./vendor/global/global.min.js"></script>
    <script src="{{ asset('assets') }}/./js/quixnav-init.js"></script>
    <script src="{{ asset('assets') }}/./js/custom.min.js"></script>
    


    <!-- Datatable -->
    <script src="{{ asset('assets') }}/./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/./js/plugins-init/datatables.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Dashboard -->
    <!-- Vectormap -->
    <script src="{{ asset('assets') }}/./vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/morris/morris.min.js"></script>


    <script src="{{ asset('assets') }}/./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('assets') }}/./vendor/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets') }}/./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="{{ asset('assets') }}/./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets') }}/./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ asset('assets') }}/./vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="{{ asset('assets') }}/./js/dashboard/dashboard-1.js"></script>
     <!-- End Dashboard -->

<script>
    function validateForm() {
    var id_user = document.getElementById('id_user').value;
    var id_produk = document.getElementById('id_produk').value;
    var nama_pemesan = document.getElementById('nama_pemesan').value;
    var alamat = document.getElementById('alamat').value;
    var no_hp = document.getElementById('no_hp').value;
    var jumlah = document.getElementById('jumlah').value;
    var total_harga = document.getElementById('total_harga').value;

    // Periksa apakah bidang-bidang yang diperlukan diisi
    if (id_user === '' || id_produk === '' || nama_pemesan === '' || alamat === '' || no_hp === '' || jumlah === '' || total_harga === '') {
        // Menampilkan pesan kesalahan
        document.getElementById('error-message').style.display = 'block';
        return false; // Mencegah pengiriman formulir jika ada bidang yang kosong
    } else {
        // Menyembunyikan pesan kesalahan jika semua bidang terisi
        document.getElementById('error-message').style.display = 'none';
        return true; // Lanjutkan pengiriman formulir jika semua bidang terisi
    }
}
</script>


