

<?php include "header.php" ?>
<?php include "side_bar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Campaign</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lead Management</a></li>
              <li class="breadcrumb-item active">Add Campaign</li>
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
            <h3 class="card-title">View Campaign</h3>
            <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="float: right">Add Campaign</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Campaign Name</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  include "dbcon.php";
                  $data = "SELECT * FROM campaign";
                  $result = mysqli_query($con, $data);
                  while ($a = mysqli_fetch_array($result))
                  {
                ?>

                <tr>
                  <td class="id"><?php echo $a['c_id'] ?></td>
                  <td><?php echo $a['c_name'] ?></td>
                  <!-- <td><?php echo $a['c_status'] ?></td> -->
                  <td>
                    <a href="#"  class="btn btn-primary camp">Edit</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Campaign Name</th>
                  <!-- <th>Status</th> -->
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
        <h3 class="modal-tittle" ><b>Add Campaign</b></h3>
       	<button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

    	<div class="modal-body">   

        <form method="post" enctype="multipart/form-data" action="campaign_insert.php">
          
          <div class="form-group">
            <label>Campaign Name</label>
            <input type="text" name="c_name" required class="form-control">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="c_status" required class="form-control">
              <option>Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <input type="submit" name="submit" class="btn btn-info">
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add blog Modal-->

<!--Edit Modal-->
<div class="modal fade" id="camp_edit" >
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-tittle" ><b>Edit Campaign</b></h3>
        <button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

      <div class="modal-body">   

        <form method="post" enctype="multipart/form-data" action="campaign_insert.php">
          <input type="hidden" name="c_id" id="e_id">
          
          <div class="form-group">
            <label>Campaign Name</label>
            <input type="text" name="c_name" id="camp_name" class="form-control">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select name="c_status" id="sta" class="form-control">
              <option>Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="update" class="btn btn-primary">Update</button> -->
        <input type="submit" name="update" value="update" class="btn btn-success">
      </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--Edit Modal-->





<?php include "footer.php" ?>


