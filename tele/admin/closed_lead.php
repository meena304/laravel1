
<?php include "header.php" ?>
<?php include "side_bar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Closed Leads</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lead Management</a></li>
              <li class="breadcrumb-item active">Clodes Leads</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <!-- card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">View Admin</h3>
           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Interested in</th>
                  <th>Travel Date</th>
                  <th>No. of traveler</th>
                  <th>Closed By</th>
           
                </tr>
              </thead>

              <tbody>
                <?php
                  include "dbcon.php";
                  $data = "SELECT * FROM lead_closure JOIN lead_master WHERE lead_closure.lead_id = lead_master.lead_id ";
                  $result = mysqli_query($con, $data);
                  while ($a = mysqli_fetch_array($result))
                  {
                ?>

                <tr>
                 
                  <td><?php echo $a['guest_name'] ?></td>
                  <td><?php echo $a['guest_interested_in'] ?></td>
                  <td><?php echo $a['no_of_traveler'] ?></td>
                  <td><?php echo $a['expected_travel_date'] ?></td>
                  <td><?php echo $a['closed_by'] ?></td>                 
                 
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Interested in</th>
                  <th>Travel Date</th>
                  <th>No. of traveler</th>
                  <th>Closed By</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php" ?>


