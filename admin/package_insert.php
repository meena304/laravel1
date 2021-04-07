<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['package_name'];
	$b = $_POST['package_type'];
	$c = $_POST['package_status'];
	

	$data = "INSERT into package_master(package_name,package_type,package_status)VALUES('$a','$b','$c')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:package.php');
	}


}

// edit
    if(isset($_POST['a_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM package_master WHERE package_id = $s_id ";
        $result = mysqli_query($con,$data);

        while ($a = mysqli_fetch_array($result))
        {
            array_push($result_array, $a );
            header('Content-type:application/json');
            echo json_encode($result_array);
            
        }

    }

    // update
     if(isset($_POST['update']))
    {
        $id = $_POST['l_id'];
        $a = $_POST['username'];
        $b = $_POST['telecaller_email'];
        $c = $_POST['password'];
       
       
  $data = "UPDATE login SET username = '$a', telecaller_email = '$b' , password = '$c' WHERE l_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:admin.php');
   
  }
}

if(isset($_POST['add_det']))
{
  $id = $_POST['package_id'];
  $a = $_POST['min_pax'];
  $b = $_POST['max_pax'];
  $c = $_POST['cust_rate'];
  $d = $_POST['max_discounted_rate'];
  $e = $_POST['b2b_rate'];
  $f = $_POST['transfer_rate'];
  

  $data = "INSERT into package_details(package_id, min_pax, max_pax, cust_rate, max_discounted_rate, b2b_rate, transfer_rate )VALUES('$id','$a','$b','$c','$d','$e','$f')";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:package.php');
  }


}

 if(isset($_POST['t_view']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;

        $data = "SELECT * FROM package_master WHERE package_id = $s_id ";
        $result = mysqli_query($con,$data);

        $data = "SELECT * FROM package_details WHERE package_id = $s_id ";
        $ff = mysqli_query($con,$data);

         while ($a = mysqli_fetch_array($result))
          {
            echo $return = '
            <h6><b>Package Name :</b>'.$a['package_name'].' <span style="float:right">'.$a['package_type'].'</span> </h6>
            ';
          }

         while ($b = mysqli_fetch_array($ff))
          {
            echo $re = '
            <h6><b>Min. Pax  :</b>'.$b['min_pax'].'</h6>
            <h6><b>Max. Pax : </b>'.$b['max_pax'].' </a></h6>
             <h6><b>Min. Pax  : </b>'.$b['cust_rate'].'</h6>
            <h6><b>Max. Pax : </b>'.$b['max_discounted_rate'].' </a></h6>
             <h6><b>Min. Pax  : </b>'.$b['transfer_rate'].'</h6>
           

            ';
          }
    }


?>