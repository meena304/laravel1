<?php

    include "dbcon.php";
    if(isset($_POST['ADD']))
    {
    	$a = $_POST['guest_name'];
    	$b = $_POST['guest_ph'];
    	$c = $_POST['guest_alt_ph'];
    	$d = $_POST['guest_whatsapp'];
    	$e = $_POST['guest_email'];
    	$f = $_POST['guest_interested_in'];
    	$g = $_POST['no_of_traveler'];
    	$h = $_POST['expected_travel_date'];
    	$i = $_POST['lead_date'];
    	$j = $_POST['lead_source'];
    	// $k = $_POST['lead_telecaller'];
    	$l = $_POST['lead_type'];
    	$m = $_POST['lead_status'];
      $n = $_POST['guest_city'];
      $o = $_POST['t_id'];

      $data = "SELECT * FROM tele_caller WHERE t_id = '$o' ";
      $name = mysqli_query($con,$data);

      $z = mysqli_fetch_array($name);
      $nn = $z['telecaller_name'];



    	$data = "INSERT INTO lead_master(guest_name, guest_ph, guest_alt_ph, guest_whatsapp, guest_email, guest_interested_in, no_of_traveler, expected_travel_date, lead_date, lead_source, lead_telecaller, lead_type, lead_status,guest_city,t_id)VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$nn','$l','$m','$n','$o')";
    	$result = mysqli_query($con,$data);

    	if($result)
    	{
    		header('location:add_lead.php');
    	}
    }

    if(isset($_POST['c_view']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;

        $data = "SELECT * FROM lead_master WHERE lead_id = $s_id ";
        $result = mysqli_query($con,$data);
         while ($a = mysqli_fetch_array($result))
          {
            echo $return = '
            <h6><b>Guest Name :</b>'.$a['guest_name'].' <span style="float:right">'.$a['lead_type'].'</span> </h6>
            <h6><b>Phone Number : </b><a href = "tel: '.$a['guest_ph'].'"> '.$a['guest_ph'].' </a></h6>
            <h6><b>Email : </b><a href = "mailto: '.$a['guest_email'].'"> '.$a['guest_email'].' </a></h6>
            <h6><b>Interested in : </b>'.$a['guest_interested_in'].'</h6>
            <h6><b>No. of Traveler : </b>'.$a['no_of_traveler'].'</h6>
            <h6><b>Lead Date : </b>'.$a['lead_date'].'</h6>
            <h6><b>Lead Source : </b>'.$a['lead_source'].'</h6>
            <h6><b>Lead Status : </b> '.$a['lead_status'].'</h6>
            <h6><b>City : </b>'.$a['guest_city'].'</h6>

            ';
        }
    }

    // edit
    if(isset($_POST['c_edit']))
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

    if(isset($_POST['update']))
    {
  $id = $_POST['lead_id'];
  $a = $_POST['guest_name'];
  $b = $_POST['guest_ph'];
  $c = $_POST['guest_alt_ph'];
  $d = $_POST['guest_whatsapp'];
  $e = $_POST['guest_email'];
  $f = $_POST['guest_interested_in'];
  $g = $_POST['no_of_traveler'];
  $h = $_POST['expected_travel_date'];
  $i = $_POST['lead_date'];
  $j = $_POST['lead_source'];
  $k = $_POST['lead_telecaller'];
  $l = $_POST['lead_type'];
  $m = $_POST['lead_status'];


  $data = "UPDATE lead_master SET guest_name = '$a', guest_ph = '$b', guest_alt_ph = '$c', guest_whatsapp = '$d', guest_email = '$e', guest_interested_in = '$f', no_of_traveler = '$g', expected_travel_date = '$h', lead_date = '$i', lead_source = '$j', lead_telecaller = '$k', lead_type = '$l', lead_status = '$m'  WHERE lead_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:add_lead.php');
   
  }



}

?>