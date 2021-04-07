<?php

include "dbcon.php";

    if(isset($_POST['update']))
    {
  $id = $_POST['lead_id'];
  $g = $_POST['remark'];
  $j = $_POST['lead_telecaller'];
  
  $data = "INSERT INTO no_deal(lead_id,remark,no_deal_by)VALUES('$id','$g','$j')";
   $result = mysqli_query($con, $data);


  $data = "UPDATE lead_master SET   lead_status = 'NO DEAL' , ff_call = '2' WHERE lead_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
  	header('location:add_lead.php');
  }
}

?>