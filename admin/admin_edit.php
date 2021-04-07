<?php include "header.php" ?>
<?php include "side_bar.php" ?>


<?php
include "dbcon.php";

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $data = "SELECT * FROM admin WHERE a_id = '$id' ";
  $result = mysqli_query($con,$data);
  $a = mysqli_fetch_array($result);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lead Management</li>
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
     <form method="post" enctype="multipart/form-data">
          
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $a['name'] ?>" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $a['email'] ?>" class="form-control">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $a['password'] ?>" class="form-control">
          </div>

          <input type="submit" name="update" value="Update" class="btn btn-info">
        </form>
      </div></div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php" ?>
<?php
include "dbcon.php";

if(isset($_POST['update']))
{
  $a = $_POST['name'];
  $b = $_POST['email'];
  $c = $_POST['password'];

  

  $data = "UPDATE admin SET name = '$a', email = '$b', password = '$c' WHERE a_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('localhost:admin.php');
   
  }



}

?>