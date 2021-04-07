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
    	$l = $_POST['lead_type'];
    	$m = $_POST['lead_status'];
      $n = $_POST['guest_city'];
      $o = $_POST['t_id'];

      $data = "SELECT * FROM tele_caller WHERE t_id = '$o' ";
      $name = mysqli_query($con,$data);

      $z = mysqli_fetch_array($name);
      $nn = $z['telecaller_name'];



    	$data = "INSERT INTO lead_master(guest_name, guest_ph, guest_alt_ph, guest_whatsapp, guest_email, guest_interested_in, no_of_traveler, expected_travel_date, lead_date, lead_source, lead_telecaller, lead_type, lead_status,guest_city,t_id,ff_call)VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$nn','$l','$m','$n','$o','0')";
    	$result = mysqli_query($con,$data);

    	if($result)
    	{
    		header('location:add_lead.php');
    	}
      if($m = 'CLOSED')
  {
    $data = "INSERT INTO lead_closure(lead_id,no_of_traveler,expected_travel_date,closed_by)VALUES('$id','$g','$h','$k')";
    $result = mysqli_query($con, $data);
  }

    }

    if(isset($_POST['c_view']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;

        $data = "SELECT * FROM lead_master WHERE lead_id = $s_id ";
        $result = mysqli_query($con,$data);

        $data = "SELECT * FROM lead_call_details WHERE lead_id = $s_id ORDER BY lead_follow_id desc";
        $ff = mysqli_query($con,$data);


         while ($a = mysqli_fetch_array($result))
          {
           
            echo $return = '
            <h5>('.$a['no_of_traveler'].' pax | '.$a['lead_date'].') <span style="float:right">'.$a['lead_type'].'</span> </h5>
            <h4>'.$a['guest_interested_in'].'</h4>
            <h2><b>'.$a['guest_name'].'</h2>
            <h4><i class="fas fa-phone-alt"></i></b><a href = "tel: '.$a['guest_ph'].'"> '.$a['guest_ph'].' </a></h4>
            <h4><i class="fab fa-whatsapp"></i><a target="_blank" href="https://wa.me/'.$a['guest_ph'].'?text=Hello%20I%20want%20to%20know%20about%20VilloTale">'.$a['guest_ph'].'</a></h4>
            <h4><i class="fas fa-envelope"></i><a href = "mailto:'.$a['guest_email'].'"> '.$a['guest_email'].'</a></h4>
            <br>
            <h5>Followup Details</h5>
            <table class="table table-hover fixed_header" style="border-collapse: separate; border-spacing: 0 1em;">
            <tr>
              <th class="w-75">Remark</th>
              <th >Last Call Date</th>
              </tr>
              <tbody style="height:150px">
            ';
            while($b = mysqli_fetch_array($ff))
            {
              echo $re = '
    
              <tr class="shadow">
        <td> '.$b['remark'].' </td>
        <td>'.$b['call_date'].'</td>
              </tr>   
              ';
            }
            echo $r = '
             </tbody>
            </table>
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
    $id;
    header('location:add_lead.php');
   
  }
  if($m = 'CLOSED')
  {
    $data = "INSERT INTO lead_closure(lead_id,no_of_traveler,expected_travel_date,closed_by)VALUES('$id','$g','$h','$k')";
    $result = mysqli_query($con, $data);
  }



}

?>