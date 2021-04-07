<?php include "header.php" ?>
<?php include "side_bar.php" ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Lead Master</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lead Management</a></li>
              <li class="breadcrumb-item active">Add Lead Master</li>
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
            <h3 class="card-title">View Lead Master</h3>
            <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="float: right">Add Lead Masterr</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th >Guest Name</th>
                  <!-- <th >Phone Number</th>
                  <th >Alternate Phone No.</th>
                  <th >WhatsApp Number</th>
                  <th >Email</th> -->
                  <th class="w-25">Action</th>
                </tr>
              </thead>

              <tbody>
               <?php
          include "dbcon.php";

          $data = "SELECT * FROM lead_master ORDER BY lead_id desc";
          $result = mysqli_query($con,$data);

          while ($a = mysqli_fetch_array($result))
          {
          ?>

                <tr>
                  <td class="id"><?php echo $a['lead_id'] ?></td>                  
                  <td><?php echo $a['guest_name'] ?></td>
                  <!-- <td >
                    <a href="tel:<?php echo $a['guest_ph'] ?>"><?php echo $a['guest_ph'] ?></a>
                  </td>
                  <td >
                    <a href="tel:<?php echo $a['guest_alt_ph'] ?>"><?php echo $a['guest_alt_ph'] ?></a>
                  </td>
                  <td>
                    <a target="_blank" href="https://wa.me/<?php echo $a['guest_whatsapp'] ?>?text=Hello%20I%20want%20to%20know%20about%20VilloTale">
                      <?php echo $a['guest_whatsapp'] ?>
                    </a>
                  </td>
                  <td>
                    <a href="mailto:<?php echo $a['guest_email'] ?>"><?php echo $a['guest_email'] ?></a>
                  </td> -->
                   <td>
                    <a href="#" class="btn btn-primary edit_btn">Edit</a>
                    <a href="#" class="btn btn-success view_btn">View</a>
                  
                  </td>
                
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th >Guest Name</th>
                <!--   <th >Phone Number</th>
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
        <h3 class="modal-tittle" ><b>Add Lead Master</b></h3>
       	<button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

    	<div class="modal-body">   

        <form method="post" enctype="multipart/form-data" action="lead_insert.php">
          
          <div style="float: left; margin-right: 20px; width: 45%">
          <div class="form-group">
            <label>Guest Name</label>
            <input type="text" name="guest_name" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="guest_ph" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Alternate Phone No.</label>
            <input type="number" name="guest_alt_ph" class="form-control" >
          </div>

          <div class="form-group">
            <label>WhatsApp Number</label>
            <input type="number" name="guest_whatsapp" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="guest_email" class="form-control" required>
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="guest_city" class="form-control">
          </div>


          <div class="form-group">
            <label>Interested In</label>
            <select name="package_id"  class="form-control">
              <option>Select</option>
              <?php
                include "dbcon.php";
                $data = "SELECT * FROM package_master";
                $result = mysqli_query($con,$data);

                while($a = mysqli_fetch_array($result))
              { 

              ?>
              <option value="<?php echo $a['package_id'] ?>"><?php echo $a['package_name'] ?></option>
              <?php } ?>
            </select>
          </div>

        </div>

          <div style="float: right; width: 45%">

          <div class="form-group">
            <label>No. of Traveler</label>
            <input type="number" name="no_of_traveler" class="form-control">
          </div>

          <div class="form-group">
            <label>Expected Travel Date</label>
            <input type="date" name="expected_travel_date" class="form-control" re>
          </div>

          <div class="form-group">
            <label>Lead Date</label>
            <input type="date" name="lead_date" class="form-control">
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
            <label>Lead Caller</label>
            <select name="t_id" class="form-control">
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
            <label>Lead Type</label>
            <select name="lead_type" class="form-control">
              <option>Lead Type</option>
              <option value="HOT">HOT</option>
              <option value="COLD">COLD</option>
              <option value="WARM">WARM</option>
            </select>
          </div>

          <div class="form-group">
            <label>Lead Status</label>
            <select name="lead_status" class="form-control">
              <option>Lead Status</option>
              <option value="OPEN">OPEN</option>
              <option value="CLOSED">CLOSED</option>
              <option value="NO DEAL">NO DEAL</option>
            </select>
          </div>
        </div>
          <input type="submit" name="ADD" value="ADD" class="btn btn-info">
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add blog Modal-->

<!-- View Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Lead Master</h5>
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
<!-- View Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tele Caller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="lead_insert.php">
              <input type="hidden" name="lead_id" id="e_id">
          <div style="float: left;width: 45%; margin-right: 10px">
          <div class="form-group">
            <label>Guest Name</label>
            <input type="text" name="guest_name" class="form-control" id="name">
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="guest_ph" id="ph" class="form-control" >
          </div>

          <div class="form-group">
            <label>Alternate Phone No.</label>
            <input type="number" name="guest_alt_ph" id="aph" class="form-control">
          </div>

          <div class="form-group">
            <label>WhatsApp Number</label>
            <input type="number" name="guest_whatsapp" id="wph" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="guest_email" id="e" class="form-control">
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="guest_city" id="c" class="form-control">
          </div>

           <div class="form-group">
            <label>Interested In</label>
            <select name="package_id" id="ii"  class="form-control">
              <option>Select</option>
              <?php
                include "dbcon.php";
                $data = "SELECT * FROM package_master";
                $result = mysqli_query($con,$data);

                while($a = mysqli_fetch_array($result))
              { 

              ?>
              <option value="<?php echo $a['package_id'] ?>"><?php echo $a['package_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div style="float: right;width: 45%">
          <div class="form-group">
            <label>No. of Traveler</label>
            <input type="number" name="no_of_traveler" id="not" class="form-control">
          </div>

          <div class="form-group">
            <label>Expected Travel Date</label>
            <input type="date" name="expected_travel_date" id="etd" class="form-control">
          </div>

          <div class="form-group">
            <label>Lead Date</label>
            <input type="date" name="lead_date" id="ld" class="form-control">
          </div>

          <div class="form-group">
            <label>Lead Source</label>
             <select name="lead_source" id="ls" class="form-control">
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
            <label>Lead Caller</label>
            <input type="text" name="lead_telecaller" id="lc" class="form-control">
          </div>

          <div class="form-group">
            <label>Lead Type</label>
            <select name="lead_type" id="ty" class="form-control">
              <option>Lead Type</option>
              <option value="HOT">HOT</option>
              <option value="COLD">COLD</option>
              <option value="WARM">WARM</option>
            </select>
          </div>

          <div class="form-group">
            <label>Lead Status</label>
            <select name="lead_status" id="sta" class="form-control">
              <option>Lead Status</option>
              <option value="OPEN">OPEN</option>
              <option value="CLOSED">CLOSED</option>
              <option value="NO DEAL">NO DEAL</option>
            </select>
          </div>
        </div>
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
<!-- Edit Modal -->


<?php include "footer.php" ?>


