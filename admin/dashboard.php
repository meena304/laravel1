
<?php include "header.php"  ?>
<?php include "side_bar.php"  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lead Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <!-- <h1>hello</h1> -->
      <?php
          include "dbcon.php";
          
          // echo $data = "SELECT * FROM lead_master where t_id = '$id' ";
          $data = "SELECT * FROM lead_master WHERE  ff_call = '1' ";
          $result = mysqli_query($con,$data);
          $follow = mysqli_num_rows($result);

          $data = "SELECT * FROM lead_master WHERE ff_call = '0' ";
          $result = mysqli_query($con,$data);
          $fresh = mysqli_num_rows($result);

          $data = "SELECT * FROM lead_master ";
          $result = mysqli_query($con,$data);
          $lead = mysqli_num_rows($result);

          $data = "SELECT * FROM tele_caller";
          $result = mysqli_query($con,$data);
          $tele = mysqli_num_rows($result);

      ?>

      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $follow ?></h3>

                <p>Follow Up Calls</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="follow_call.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $fresh ?></h3>

                <p>Fresh Calls</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="fresh_call.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $lead ?></h3>

                <p>Total Leads</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="add_lead.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tele ?></h3>

                <p>Total Telecaller</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="add_tele.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
          <!-- ./col -->


      <div class="container-fluid">
       <div class="row">
         <?php
          include "dbcon.php";
          
          // echo $data = "SELECT * FROM lead_master where t_id = '$id' ";
          $data = "SELECT * FROM package_master";
          $result = mysqli_query($con,$data);
          while($a = mysqli_fetch_array($result))
          { $b = $a['package_id'];

      ?>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
          
                <?php 
                  include "dbcon.php";
                  $da = "SELECT * FROM lead_master WHERE package_id = '$b'
                   ";
                  $re = mysqli_query($con , $da);
                  $total = mysqli_num_rows($re);

                  $da = "SELECT * FROM lead_master WHERE package_id = '$b'
                  and ff_call = '0' ";
                  $re = mysqli_query($con , $da);
                  $fresh = mysqli_num_rows($re);

                  $da = "SELECT * FROM lead_master WHERE package_id = '$b'
                  and ff_call = '1'  ";
                  $re = mysqli_query($con , $da);
                  $follow = mysqli_num_rows($re);

                ?>

                <h3><?php echo $total ?></h3>

                <p><?php echo $a['package_name'] ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="add_lead.php" class="small-box-footer"><span style="float: left;margin-left: 5px">follow : <?php echo $follow ?></span> <span style="">fresh : <?php echo $fresh ?></span> </a>
            </div>
          </div>
          <!-- ./col -->
         <?php } ?>
        </div>
      </div>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php"  ?>
