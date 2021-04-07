<?php include "header.php" ?>
<?php include "side_bar.php" ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Lead</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import Lead</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
      <div class="card-header"></div>

      <div class="card-body">

        <form method="post" enctype="multipart/form-data" action="excel_ip.php">

          <div class="form-group">
            <label>Lead Date</label>
            <input type="date" name="lead_date" required class="form-control">
          </div>

          <div class="form-group">
            <label>Lead Caller</label>
            <select name="t_id" class="form-control" required>
              <option>Select Tele Caller</option>
              <?php
                include "dbcon.php";
                $data = "SELECT * FROM tele_caller";
                $result = mysqli_query($con,$data);

                while($a = mysqli_fetch_array($result))
              { 

              ?>
              <option value="<?php echo $a['t_id'] ?>"><?php echo $a['telecaller_name'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Campaign</label>
            <select name="guest_interested_in" required class="form-control">
              <option>Select Campaign</option>
              <?php
                include "dbcon.php";
                $data = "SELECT * FROM campaign";
                $result = mysqli_query($con,$data);

                while($a = mysqli_fetch_array($result))
              { 

              ?>
              <option value="<?php echo $a['c_name'] ?>"><?php echo $a['c_name'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Lead Source</label>
             <select name="lead_source" class="form-control">
              <option>Select</option>
              <?php
                include "dbcon.php";
                $data = "SELECT * FROM lead_source_master";
                $result = mysqli_query($con,$data);

                while($a = mysqli_fetch_array($result))
              { 

              ?>
              <option value="<?php echo $a['lead_source'] ?>"><?php echo $a['lead_source'] ?></option>
            <?php } ?>
          </select>
          </div>

          <div class="form-group">
            <label>Browse File</label>
            <input type="file" name="doc" class="form-control">
          </div>

          <input type="submit" name="add"/>
        </form>
      </div>
    </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php" ?>

