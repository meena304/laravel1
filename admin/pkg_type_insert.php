<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['pkgtype'];
	$b = $_POST['pkgtype_status'];

	$data = "INSERT into pkg_type(pkgtype,pkgtype_status)VALUES('$a','$b')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:pkg_type.php');
	}


}

// edit
    if(isset($_POST['c_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM pkg_type WHERE pkgtype_id = $s_id ";
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
        $id = $_POST['pkgtype_id'];
        $a = $_POST['pkgtype'];
        $b = $_POST['pkgtype_status'];
       
       
  $data = "UPDATE pkg_type SET pkgtype = '$a', pkgtype_status = '$b' WHERE pkgtype_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:pkg_type.php');
   
  }
}

?>