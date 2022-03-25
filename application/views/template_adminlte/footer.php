</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    Version 3.1.11
    </div>
    <!-- Default to the left --> 
    <?php $company = $this->db->get_where('ref_companies', ['id' => 1])->row_array();
        $companyName = $company['companyName']; ?>
    Copyright &copy; 2021 - <?php echo date('Y'); ?> <a href="https://bataviaindoglobal.com" target="_blank">PT. Batavia Indo Global</a> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/template_adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/template_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/template_adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/template_adminlte/dist/js/demo.js"></script>
</body>
</html>
