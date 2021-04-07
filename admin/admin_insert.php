<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['name'];
	$b = $_POST['email'];
	$c = $_POST['password'];
	

	$data = "INSERT into login(username,telecaller_email,password,who)VALUES('$a','$b','$c','admin')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:admin.php');
	}


}

// edit
    if(isset($_POST['a_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM login WHERE l_id = $s_id ";
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

?>