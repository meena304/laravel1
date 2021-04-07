<?php include "header.php" ?>
<?php include "side_bar.php" ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Tele Caller</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lead Management</a></li>
              <li class="breadcrumb-item active">Add Tele Caller</li>
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
            <h3 class="card-title">View Tele Caller</h3>
            <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="float: right">Add Tele Caller</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Telecaller Name</th>
                 <!--  <th >Phone Number</th>
                  <th >Alternate Phone No.</th>
                  <th >WhatsApp Number</th>
                  <th >Email</th> -->
                  <th class="w-25">Action</th>
                </tr>
              </thead>

              <tbody>
               <?php
          include "dbcon.php";

          $data = "SELECT * FROM tele_caller";
          $result = mysqli_query($con,$data);

          while ($a = mysqli_fetch_array($result))
          {
          ?>

                <tr>
                  <td class="id"><?php echo $a['t_id'] ?></td>
                  <td><?php echo $a['telecaller_name'] ?></td>
                 <!--  <td >
                    <a href="tel:+<?php echo $a['telecaller_phone'] ?>">
                      +<?php echo $a['telecaller_phone'] ?>
                    </a>
                  </td>
                  <td >
                    <a href="tel:+<?php echo $a['telecaller_alt_phone'] ?>">
                      <?php echo $a['telecaller_alt_phone'] ?>
                    </a>
                  </td>
                  <td>
                    <a target="_blank" href="https://wa.me/<?php echo $a['telecaller_whatsapp'] ?>?text=Hello%20I%20want%20to%20know%20about%20VilloTale">
                      <?php echo $a['telecaller_whatsapp'] ?>
                        
                    </a>
                  </td>

                  <td >
                    <a href="mailto:<?php echo $a['telecaller_email'] ?>">
                      <?php echo $a['telecaller_email'] ?>
                    </a>
                  </td> -->
                  <td>
                    <a href="#" class="btn btn-primary edit_t">Edit</a>
                    <a href="#" class="btn btn-success view_t">View</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Telecaller Name</th>
                  <!-- <th >Phone Number</th>
                  <th >Alternate Phone No.</th>
                  <th >WhatsApp Number</th>
                  <th >Email</th> -->
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
        <h3 class="modal-tittle" ><b>Add Tele Caller</b></h3>
       	<button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

    	<div class="modal-body">   

        <form method="post" action="tele_insert.php">
          <div style="float: left; margin-right: 20px; width: 45%">
          
          <div class="form-group">
            <label>Telecaller Name</label>
            <input type="text" name="telecaller_name" required class="form-control">
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="telecaller_phone" required class="form-control">
          </div>

          <div class="form-group">
            <label>Alternate Phone No.</label>
            <input type="number" name="telecaller_alt_phone" class="form-control">
          </div>

          <div class="form-group">
            <label>WhatsApp Number</label>
            <input type="number" name="telecaller_whatsapp" required class="form-control">
          </div>
        </div>

          <div style="float: right; width: 45%">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="telecaller_email" required class="form-control">
          </div>

          <div class="form-group">
            <label>Commission Type</label>
              <select name="commission_type" class="form-control">
                <option>Commission Type</option>
                <option value="Percentage">Percentage</option>
                <option value="Fixed Amount">Fixed Amount</option>
              </select>
          </div>

          <div class="form-group">
            <label>Commission per call</label>
            <input type="number" name="commission_per_call" class="form-control">
          </div>

          <div class="form-group">
            <label>Basic Pay</label>
            <input type="number" name="basic_pay" class="form-control">
          </div>
        </div>

        <div style="float: bottom">

          <div class="form-group">
            <label>Status</label>
            <select name="telecaller_status" class="form-control">
              <option>Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <input type="submit" name="ADD" value="ADD" class="btn btn-info">
        </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add blog Modal-->

<!-- view tele caller -->
<div class="modal fade" id="tele_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<!-- Edit Modal -->
<div class="modal fade" id="tele_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tele Caller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="tele_insert.php">
              <input type="hidden" name="t_id" id="e_id">
          <div style="float: left; margin-right: 20px; width: 45%">
          <div class="form-group">
            <label>Telecaller Name</label>
            <input type="text" name="telecaller_name" id="name" class="form-control">
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="telecaller_phone" id="ph" class="form-control">
          </div>

          <div class="form-group">
            <label>Alternate Phone No.</label>
            <input type="number" name="telecaller_alt_phone" id="aph" class="form-control">
          </div>

          <div class="form-group">
            <label>WhatsApp Number</label>
            <input type="number" name="telecaller_whatsapp" id="wph" class="form-control">
          </div>
        </div>

        <div style="float:right; width: 45%">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="telecaller_email" id="e" class="form-control">
          </div>

          <div class="form-group">
            <label>Commission Type</label>
              <select name="commission_type" id="ct" class="form-control">
                <option>Commission Type</option>
                <option value="Percentage">Percentage</option>
                <option value="Fixed Amount">Fixed Amount</option>
              </select>
          </div>

          <div class="form-group">
            <label>Commission per call</label>
            <input type="number" name="commission_per_call" id="cpc" class="form-control">
          </div>

          <div class="form-group">
            <label>Basic Pay</label>
            <input type="number" name="basic_pay" id="b_pay" class="form-control">
          </div>
        </div>
        <div style="float: bottom">
         <div class="form-group">
          <!--   <label>Status</label> -->
            <select name="telecaller_status" id="sta" class="form-control">
              <option>Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
      <div class="modal-footer" style="float: bottom">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="update" class="btn btn-primary">Update</button> -->
        <input type="submit" name="update" value="update" class="btn btn-success">
      </div>
    </div>
    </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->



<?php include "footer.php" ?>


