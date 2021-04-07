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

<!-- pkg supplier -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".edit_s_btn", function(e){
    // $('.edit_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "package_supplier_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#e_id').val(value['pkg_vendor_id']);
            $('#name').val(value['supplier_name']);
            $('#c_name').val(value['supplier_contact_name']);
            $('#ph').val(value['supplier_contact_number']);
            $('#e').val(value['supplier_email']);
            $('#s').val(value['supplier_state']);
            $('#add').val(value['supplier_address']);
            $('#gst').val(value['supplier_gst']);
            $('#type').val(value['supplier_type']);
          
          });

           $('#exampleModal1').modal('show');
        }

      });

    });

    $("#example1").on("click", ".view_s_btn", function(e){
    // $('.view_btn').click(function(e) {
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);

      $.ajax({
        type: "POST",
        url: "package_supplier_insert.php",
        data:{
          'c_view': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $('.show_data').html(response);
          $('#ps_view').modal('show');
        }

      });

    });
  });
</script>
<!-- pkg supplier -->

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

<!-- tele caller -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".edit_t", function(e){
    // $('.edit_t').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "tele_insert.php",
        data:{
          't_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#e_id').val(value['t_id']);
            $('#name').val(value['telecaller_name']);
            $('#ph').val(value['telecaller_phone']);
            $('#aph').val(value['telecaller_alt_phone']);
            $('#wph').val(value['telecaller_whatsapp']);
            $('#e').val(value['telecaller_email']);
            $('#ct').val(value['commission_type']);
            $('#cpc').val(value['commission_per_call']);
            $('#b_pay').val(value['basic_pay']);
            $('#sta').val(value['telecaller_status']);

          });

           $('#tele_edit').modal('show');
        }

      });

    });

    $("#example1").on("click", ".view_t", function(e){
    // $('.view_t').click(function(e) {
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);

      $.ajax({
        type: "POST",
        url: "tele_insert.php",
        data:{
          't_view': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $('.show_data').html(response);
          $('#tele_view').modal('show');
        }

      });

    });
  });
</script>
<!-- tele caller -->

<!-- campaign -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".camp", function(e){
    // $('.camp').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "campaign_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#e_id').val(value['c_id']);
            $('#camp_name').val(value['c_name']);
            $('#sta').val(value['c_status']);
           
          });

           $('#camp_edit').modal('show');
        }

      });

    });

  });
</script>
<!-- campaign -->

<!-- passeord edit -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".admin_edit", function(e){
    // $('.admin_edit').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "admin_insert.php",
        data:{
          'a_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#a_id').val(value['l_id']);
            $('#a_name').val(value['username']);
            $('#a_email').val(value['telecaller_email']);
            $('#a_pass').val(value['password']);
           
          });

           $('#admin_edit').modal('show');
        }

      });

    });

  });
</script>
<!-- passeord edit -->


<!-- lead source -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".ls_btn", function(e){
    // $('.ls_btn').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "lead_source_insert.php",
        data:{
          'c_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#lsc_id').val(value['ls_id']);
            $('#ls_name').val(value['lead_source']);
            $('#ls_status').val(value['lead_source_status']);
           

          });

           $('#ls_edit').modal('show');
        }

      });

    });

  });
</script>
<!-- lead source-->

<!-- pkg -->
<script>
  $(document).ready(function() {

    $("#example1").on("click", ".pkg_detail", function(e){
    // $('.admin_edit').click(function(e){
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);
       $.ajax({
        type: "POST",
        url: "package_insert.php",
        data:{
          'a_edit': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $.each(response, function(key,value){

            // alert(value['guest_name']);

            $('#a_id').val(value['package_id']);
            $('#p_name').val(value['package_name']);

          
           
          });

           $('#pkg_d').modal('show');
        }

      });

    });

    $("#example1").on("click", ".pkg_view", function(e){
    // $('.view_t').click(function(e) {
      e.preventDefault();

      var id = $(this).closest('tr').find('.id').text();
      // alert(id);

      $.ajax({
        type: "POST",
        url: "package_insert.php",
        data:{
          't_view': true,
          's_id': id,

        },
        success: function(response) {
          // alert(response);

          $('.show_data').html(response);
          $('#pkg_view').modal('show');
        }

      });

    });

  });
</script>
<!-- pak -->
</body>
</html>
