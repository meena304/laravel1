<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['c_name'];
	$b = $_POST['c_status'];

	$data = "INSERT into campaign(c_name,c_status)VALUES('$a','$b')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:campaign.php');
	}


}

    // edit
    if(isset($_POST['c_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM campaign WHERE c_id = $s_id ";
        $result = mysqli_query($con,$data);

        while ($a = mysqli_fetch_array($result))
        {
            array_push($result_array, $a );
            header('Content-type:application/json');
            echo json_encode($result_array);
            
        }

    }

     if(isset($_POST['update']))
    {
        $id = $_POST['c_id'];
        $a = $_POST['c_name'];
        $b = $_POST['c_status'];
       
       
  $data = "UPDATE campaign SET c_name = '$a', c_status = '$b' WHERE c_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:campaign.php');
   
  }



}


?>