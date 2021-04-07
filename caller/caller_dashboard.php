<?php include "header.php"  ?>
<?php include "side_bar.php"  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tele Caller</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tele Caller</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <br>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <?php
          include "dbcon.php";
          $id = $c['t_id'];
          // echo $data = "SELECT * FROM lead_master where t_id = '$id' ";
          $data = "SELECT * FROM lead_master WHERE t_id = '$id' and ff_call = '1' ";
          $result = mysqli_query($con,$data);
          $follow = mysqli_num_rows($result);

          $data = "SELECT * FROM lead_master WHERE t_id = '$id' and ff_call = '0' ";
          $result = mysqli_query($con,$data);
          $fresh = mysqli_num_rows($result);

         ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $follow ?></h3>

                <p>Follow Up Calls</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="follow_call.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fresh ?></h3>

                <p>Fresh Calls</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="fresh_call.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php"  ?>
