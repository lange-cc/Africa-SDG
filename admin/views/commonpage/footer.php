 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?=date('Y')?></strong> <a href="https://lange.rw" target="_blank">Lange</a>, all right reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMINURL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo ADMINURL; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo ADMINURL; ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo ADMINURL; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ADMINURL; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ADMINURL; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo ADMINURL; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo ADMINURL; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo ADMINURL; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->

<!-- FastClick -->
<script src="<?php echo ADMINURL; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ADMINURL; ?>js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ADMINURL; ?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ADMINURL; ?>js/demo.js"></script>


<!-- ================ upload js ==========================  
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquel.js"></script> -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo ADMINURL; ?>plugins/upload/js/jquery.fileupload-ui.js"></script>

<script src="<?php echo ADMINURL; ?>editor/jquery-te-1.4.0.min.js"></script>




<?php

if (isset($this->js)) {
  foreach ($this->js as $js) {
?>
<script type="text/javascript" src="<?php echo ADMINURL.$js; ?>"></script>
<?php  
}
}
?>
<script src="<?php echo ADMINURL; ?>js/common.js"></script>

</body>
</html>