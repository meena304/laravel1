<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->

  <!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script> -->
</body>
</html>

<!-- login -->

<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
  $a = $_POST['email'];
  $b = $_POST['password'];

  $data = "SELECT * FROM login WHERE telecaller_email = '$a' and password='$b' ";
  $result = mysqli_query($con,$data);

  $total = mysqli_num_rows($result);
  $role = mysqli_fetch_array($result);

  if($total==1)
  {
    $who = $role['who'];
    $_SESSION['a'] = $who; 

    if($who == 'admin')
    {
      //header('location:admin/dashboard.php');
      ?>
      <script type="text/javascript">
        window.location="admin/dashboard.php";        
      </script>
        
      
      <?php 
    }
    else if($who == 'caller')
    {
      $t_id = $role['t_id'];
      
      $_SESSION['a'] = $t_id; 

      //header('location:caller/caller_dashboard.php');
      ?>
      <script type="text/javascript">
        window.location="caller/caller_dashboard.php";        
      </script>
      <?php 
    }
  }

  else
    {
        // header('location:add_tele.php');
        echo "<script> alert('invalid password') </script>";
    }
  
}

?>
<!-- login -->