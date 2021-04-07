
<?php include "header.php" ?>
<?php include "side_bar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Package</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lead Management</a></li>
              <li class="breadcrumb-item active">Add Package</li>
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
            <h3 class="card-title">View Package</h3>
            <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="float: right">Add Package</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Package Name</th>
                  <th>Package Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  include "dbcon.php";
                  $data = "SELECT * FROM package_master";
                  $result = mysqli_query($con, $data);
                  while ($a = mysqli_fetch_array($result))
                  {
                ?>

                <tr>
                  <td class="id"><?php echo $a['package_id'] ?></td>
                  <td><?php echo $a['package_name'] ?></td>
                  <td><?php echo $a['package_type'] ?></td>
                  <td><?php echo $a['package_status'] ?></td>                               
                  
                  <td>
                    <a href="#" class="btn btn-primary pkg_detail" >Add Details</a>
                    <a href="#" class="btn btn-primary pkg_view" >View</a>                    
                  </td>
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Package Name</th>
                  <th>Package Type</th>
                  <th>Status</th>
                  <th>Action</th>
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



<!--Add blog Modal-->
<div class="modal fade" id="aa" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-tittle" ><b>Add Admin</b></h3>
       	<button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

    	<div class="modal-body">   

        <form method="post" enctype="multipart/form-data" action="package_insert.php">
          
          <div class="form-group">
            <label>Package Name</label>
            <input type="text" name="package_name" class="form-control">
          </div>

          <div class="form-group">
            <label>Package Type</label>
            <select name="package_type" class="form-control">
              <option>Select</option>
              <?php
              include "dbcon.php";
              $data = "SELECT * FROM pkg_type";
              $result = mysqli_query($con,$data);
              while($b = mysqli_fetch_array($result))
              { 
              ?>
              <option value="<?php echo $b['pkgtype'] ?>"><?php echo $b['pkgtype'] ?></option>
              <?php } ?>

            </select>
          </div>

        

          <div class="form-group">
            <label>Status</label>
            <select name="package_status" class="form-control">
              <option>Select</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>

          <input type="submit" name="submit" class="btn btn-info">
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add blog Modal-->

<!-- view tele caller -->
<div class="modal fade" id="pkg_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Tele Caller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="show_data">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- view tele caller -->


<!--Edit Modal-->
<div class="modal fade" id="pkg_d" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-tittle" ><b>Edit Admin</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   
         <form method="post" enctype="multipart/form-data" action="package_insert.php">
          <input type="hidden" name="package_id" id="a_id">
          
          <div class="form-group">
            <label>Package Name</label>
            <input type="text" name="package_name" id="p_name" class="form-control">
          </div>

          <div class="form-group">
            <label>Min. Pax</label>
            <input type="text" name="min_pax"  class="form-control">
          </div>

          <div class="form-group">
            <label>Max. Pax</label>
            <input type="text" name="max_pax"  class="form-control">
          </div>

          <div class="form-group">
            <label>Customer Rate</label>
            <input type="text" name="cust_rate" class="form-control">
          </div>

          <div class="form-group">
            <label>Max. Discount Rate</label>
            <input type="text" name="max_discounted_rate" class="form-control">
          </div>

          <div class="form-group">
            <label>B2B Rate</label>
            <input type="text" name="b2b_rate"  class="form-control">
          </div>

          <div class="form-group">
            <label>Transfer Rate</label>
            <input type="text" name="transfer_rate" class="form-control">
          </div>


          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="update" class="btn btn-primary">Update</button> -->
        <input type="submit" name="add_det" value="Add Detail" class="btn btn-success">
      </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--Edit Modal-->


<?php include "footer.php" ?>


