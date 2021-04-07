<?php

include "dbcon.php";

    if(isset($_POST['update']))
    {
  $id = $_POST['lead_id'];
  $g = $_POST['no_of_traveler'];
  $h = $_POST['expected_travel_date'];
  $i = $_POST['total_value'];
  $j = $_POST['lead_telecaller'];
  
  $data = "INSERT INTO lead_closure(lead_id,no_of_traveler,expected_travel_date, total_value,closed_by)VALUES('$id','$g','$h','$i','$j')";
   $result = mysqli_query($con, $data);


  $data = "UPDATE lead_master SET no_of_traveler = '$g', expected_travel_date = '$h', lead_status = 'CLOSED' , ff_call = '2' WHERE lead_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
  	header('location:add_lead.php');
  }
}

?>