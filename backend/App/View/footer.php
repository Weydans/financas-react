
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Finanças</strong>
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.1
        </div>
    </footer>
  </div>
  <!-- ./wrapper -->


  <div id="generic-modal" class="modal" style="background: rgba(0,0,0,.4); height: 100%;" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">  
          <div class="modal-msg">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn"></button>
        </div>
      </div>
    </div>
  </div>


  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= viewPath('adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?= viewPath('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= viewPath('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= viewPath('adminLTE/dist/js/adminlte.js') ?>"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?= viewPath('adminLTE/dist/js/demo.js') ?>"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?= viewPath('adminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
  <script src="<?= viewPath('adminLTE/plugins/raphael/raphael.min.js') ?>"></script>
  <script src="<?= viewPath('adminLTE/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
  <script src="<?= viewPath('adminLTE/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
  <!-- ChartJS -->
  <script src="<?= viewPath('adminLTE/plugins/chart.js/Chart.min.js') ?>"></script>

  <!-- PAGE SCRIPTS -->
  <script src="<?= viewPath('adminLTE/dist/js/pages/dashboard2.js') ?>"></script>


  <!-- SCRIPTS PERSONALIZADOS -->
    <?= (isset($scripts) ? buildScripts($scripts) : '') ?>
</body>
</html>
