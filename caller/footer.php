<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<!-- lead -->
<script>

  $(document).ready(function() {
    $("#example1").on("click", ".edit_btn", function(e){
    // $('.edit_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#e_id').val(value['lead_id']);
            $('#name').val(value['guest_name']);
            $('#ph').val(value['guest_ph']);
            $('#aph').val(value['guest_alt_ph']);
            $('#wph').val(value['guest_whatsapp']);
            $('#e').val(value['guest_email']);
            $('#c').val(value['guest_city']);
            $('#ii').val(value['guest_interested_in']);
            $('#not').val(value['no_of_traveler']);
            $('#etd').val(value['expected_travel_date']);
            $('#ld').val(value['lead_date']);
            $('#ls').val(value['lead_source']);
            $('#lc').val(value['lead_telecaller']);
            $('#ty').val(value['lead_type']);
            $('#sta').val(value['lead_status']);

          });

           $('#exampleModal1').modal('show');
        }

      });

    });

    $("#example1").on("click", ".view_btn", function(e){
    // $('.view_btn').click(function(e) {
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);

      $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_view': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $('.show_data').html(response);
          $('#exampleModal').modal('show');
        }

      });

    });
  });
</script>
<!-- lead -->

<!-- follow -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".follow_btn", function(e){
    // $('.follow_btn').on('click', function(e) {
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "follow_insert.php",
        data:{
          'f_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#f_id').val(value['lead_id']);

          });

           $('#follow').modal('show');
        }

      });

    });

  });
</script>
<!-- follow -->

<script>
  $(document).ready(function() {

    $('#hide').click(function() {
      $('#side').fadeToggle();
    });


  });
</script>

<!-- status -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".stat_btn", function(e){
    // $('.stat_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#close_id').val(value['lead_id']);
            $('#no_id').val(value['lead_id']);
            $('#open_id').val(value['lead_id']);
           

          });

           $('#stat').modal('show');
           $('.close_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#close_id').val(value['lead_id']);
            $('#no_id').val(value['lead_id']);
            $('#open_id').val(value['lead_id']);
           

          });

           $('#close').modal('show');
        }

      });

    });
        }

      });

    });

  });
</script>
<!-- status -->

<!-- status -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".close_btn", function(e){
    // $('.close_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#close_id').val(value['lead_id']);
            $('#no_id').val(value['lead_id']);
            $('#lead_caller').val(value['lead_telecaller']);

          });

           $('#close').modal('show');
        }

      });

    });

  });
</script>
<!-- status -->

<!-- status -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".no_btn", function(e){
    // $('.no_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#close_id').val(value['lead_id']);
            $('#no_id').val(value['lead_id']);
            $('#lea_caller').val(value['lead_telecaller']);

           

          });

           $('#no').modal('show');
        }

      });

    });

  });
</script>
<!-- status -->
</body>
</html>
