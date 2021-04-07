<?php include "header.php" ?>
<?php include "side_bar.php" ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Package Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active">Add Package Supplier</li>
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
            <h3 class="card-title">View Package Supplier</h3>
            <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="float: right">Add Package Supplier</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th >Supplier Name</th>
                  <!-- <th >Phone Number</th> -->
                  <!-- <th >Email</th> -->
                  <!-- <th >Lead City</th> -->
                <!--   <th >No. of Traveler</th>
                  <th >Expected Travel Date</th> -->
                 <!-- <th class="w-25">Lead Status</th> -->
                  <th class="w-25">Action</th>
                </tr>
              </thead>

              <tbody>
               <?php
          include "dbcon.php";
         
          // echo $data = "SELECT * FROM lead_master where t_id = '$id' ";
          $data = "SELECT * FROM package_supplier_master";
          
          $result = mysqli_query($con,$data);

          while ($a = mysqli_fetch_array($result))
          {
          ?>

                <tr>
                  <td class="id"><?php echo $a['pkg_vendor_id'] ?></td>
                  <td><?php echo $a['supplier_name'] ?></td>
                  <!-- <td >
                  <a href="tel:<?php echo $a['supplier_contact_number'] ?>">+<?php echo $a['supplier_contact_number'] ?></a>
                  </td>
                  <td>
                  <a href="mailto:<?php echo $a['supplier_email'] ?>"><?php echo $a['supplier_email'] ?></a>
                  </td> -->
                 
                  
                  <td>
                    <a href="#" class="btn btn-secondary edit_s_btn " style="width: 30%">Edit</a>
                    <a href="#" class="btn btn-primary view_s_btn " style="width: 30%">View</a>          
                  </td>
                </tr>
                <?php } ?>
              </tbody>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th >Supplier Name</th>
                  <!-- <th >Phone Number</th> -->
                  <!-- <th >Email</th> -->
                  <!-- <th >Lead City</th> -->
                  <!-- <th >No. of Traveler</th>
                  <th >Expected Travel Date</th> -->
               <!--  <th>Status</th> -->
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
        <h3 class="modal-tittle" ><b>Add Package Supplier </b></h3>
       	<button type="button" class="btn btn-danger" style="border-radius: 50px" data-dismiss="modal" >x</button>
      </div>

    	<div class="modal-body">   

        <form method="post" enctype="multipart/form-data" action="package_supplier_insert.php">
          <div style="width: 45% ; float: left ; margin-right: 10px">
          <div class="form-group">
            <label>Supplier Name</label>
            <input type="text" name="supplier_name" required class="form-control">
          </div>

          <div class="form-group">
            <label>Contact Name</label>
            <input type="text" name="supplier_contact_name" required class="form-control">
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="supplier_contact_number" required class="form-control">
          </div>


          <div class="form-group">
            <label>Email</label>
            <input type="email" name="supplier_email" required class="form-control">
          </div>      
        </div>

        <div style="width: 45% ; float: right">
     
          <div class="form-group">
            <label>State</label>
            <input type="text" name="supplier_state" class="form-control">
          </div>

          <div class="form-group">
            <label>Address</label>
            <textarea name="supplier_address"></textarea>
          </div>

           <div class="form-group">
            <label>Gst</label>
            <input type="text" name="supplier_gst" class="form-control">
          </div>

          <div class="form-group">
            <label>Supplier Type</label>
            <select name="supplier_type" class="form-control">
              <option>Select</option>
              <option value="Hotel">Hotel</option>
              <option value="Homestay">Homestay</option>
              <option value="Transport">Transport</option>
              <option value="Activities">Activities</option>
            </select>
          </div>
        </div>

          <input type="submit" name="submit" value="ADD" class="btn btn-info">
        </form>

      </div>
    </div>
  </div>
</div>
<!--Add blog Modal-->

<!-- View Modal -->
<div class="modal fade" id="ps_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="package_supplier_insert.php">
          <input type="hidden" name="pkg_vendor_id" id="e_id">
          <div style="width: 45% ; float: left; ; margin-right: 10px">

          <div class="form-group">
            <label>Guest Name</label>
            <input type="text" name="supplier_name" class="form-control" id="name">
          </div>

          <div class="form-group">
            <label>Contact Name</label>
            <input type="text" name="supplier_contact_name" id="c_name" required class="form-control">
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="supplier_contact_number" id="ph" class="form-control" >
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="supplier_email" id="e" class="form-control">
          </div>
      
        </div>

        <div style="width: 45% ; float: right">

          <div class="form-group">
            <label>State</label>
            <input type="text" name="supplier_state" id="s" class="form-control">
          </div>

          <div class="form-group">
            <label>Address</label>
            <textarea name="supplier_address" id="add" class="form-control"></textarea>
          </div>

           <div class="form-group">
            <label>Gst</label>
            <input type="text" name="supplier_gst" id="gst" class="form-control">
          </div>

          <div class="form-group">
            <label>Supplier Type</label>
            <select name="supplier_type" id="type" class="form-control">
              <option>Select</option>
              <option value="Hotel">Hotel</option>
              <option value="Homestay">Homestay</option>
              <option value="Transport">Transport</option>
              <option value="Activities">Activities</option>
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
</div>

<!-- Edit Modal -->




<?php include "footer.php" ?>


