<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['lead_source'];
	$b = $_POST['lead_source_status'];

	$data = "INSERT into lead_source_master(lead_source,lead_source_status)VALUES('$a','$b')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:lead_source_master.php');
	}


}

// edit
    if(isset($_POST['c_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM lead_source_master WHERE ls_id = $s_id ";
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
        $id = $_POST['ls_id'];
        $a = $_POST['lead_source'];
        $b = $_POST['lead_source_status'];
       
       
  $data = "UPDATE lead_source_master SET lead_source = '$a', lead_source_status = '$b' WHERE ls_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:lead_source_master.php');
   
  }
}

?>