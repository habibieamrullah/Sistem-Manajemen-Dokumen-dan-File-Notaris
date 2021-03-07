<footer class="main-footer">
    <div class="pull-right">

    </div>
    <strong>Donny Kurniawan &copy; 2019</strong>, Template by : <a href="https://adminlte.io">AdminLTE</a>.
</footer>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- Sweet alert -->
<script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>

<script>
    $(document).ready(function() {
        $('.sidebar-menu').tree()
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-id').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id-table').DataTable();
    });
</script>
<script>
    $('.tombol-logout').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Klik logout untuk mengakhiri session',
            type: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>

</body>

</html>