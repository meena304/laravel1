
<?php include "header.php"; ?>
<?php include "side_bar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Password Change</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Password Change</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

      <div class="card">
      <!-- <div class="card-header"><h2 class="text-center">Change Your Password</h2></div> -->
      <div class="card-body">
     <form method="post" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="n_password" class="form-control" placeholder="New Password">
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="cn_password" class="form-control" placeholder="Confirm New Password">
          </div>

          <input type="submit" name="confirm" value="Confirm" class="btn btn-info">
        </form>
      </div>
    </div>





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include "footer.php"; ?>

<?php
include "dbcon.php";

if(isset($_POST['confirm']))
{
	$a = $_POST['n_password'];
	$b = $_POST['cn_password'];

	if($a==$b)
	{
		$data = "UPDATE login SET password = '$a' WHERE t_id = '$a' ";
		$result = mysqli_query($con,$data);

		if($result)
		{
			echo "<script> alert('Password Changed Successfully!!') </script>";
		}

	}
	else
	{
		echo "<script> alert('Recheck Your Password') </script>";
	}

}

?>