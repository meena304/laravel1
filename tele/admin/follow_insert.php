<?php
include "dbcon.php";

    // edit
    if(isset($_POST['f_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM lead_master WHERE lead_id = $s_id ";
        $result = mysqli_query($con,$data);

        while ($a = mysqli_fetch_array($result))
        {
            array_push($result_array, $a );
            header('Content-type:application/json');
            echo json_encode($result_array);
            
        }

    }

    if(isset($_POST['done']))
    {

    	$id = $_POST['lead_id'];
    	$a = $_POST['call_date'];
    	$b = $_POST['remark'];
    	$c = $_POST['follow_up_date'];
    	$d = $_POST['follow_up_time'];
    
    	$data = "INSERT INTO lead_call_details(lead_id, call_date, remark, follow_up_date, follow_up_time)VALUES('$id','$a','$b','$c','$d')";
    	$result = mysqli_query($con,$data);

        $data = "UPDATE lead_master SET ff_call = '1' WHERE lead_id = '$id' ";
        $result = mysqli_query($con,$data);

    	if($result)
    	{
    		header('location:add_lead.php');
    	}
    }

?>