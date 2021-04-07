<?php
    include "dbcon.php";

    if(isset($_POST['ADD']))
    {
    	$a = $_POST['telecaller_name'];
    	$b = $_POST['telecaller_phone'];
    	$c = $_POST['telecaller_alt_phone'];
    	$d = $_POST['telecaller_whatsapp'];
    	$e = $_POST['telecaller_email'];
    	$f = $_POST['commission_per_call'];
    	$g = $_POST['commission_type'];
    	$h = $_POST['basic_pay'];
    	$i = $_POST['telecaller_status'];

    	$data = "INSERT INTO tele_caller(telecaller_name, telecaller_phone, telecaller_alt_phone, telecaller_whatsapp, telecaller_email, commission_per_call, commission_type, basic_pay, telecaller_status)VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i')";
    	$result = mysqli_query($con,$data);

        $data = "SELECT MAX(t_id) as id FROM tele_caller";
            $result = mysqli_query($con,$data);
            $x = mysqli_fetch_array($result);
            $t_id = $x['id'];

        $data = "INSERT INTO login(t_id,username,telecaller_email,password,who)VALUES('$t_id','$a','$e','$e','caller')";
        $result = mysqli_query($con,$data);

    	if($result)
        {
        header('location:add_tele.php');
        }
	
	}

    if(isset($_POST['t_view']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;

        $data = "SELECT * FROM tele_caller WHERE t_id = $s_id ";
        $result = mysqli_query($con,$data);

         while ($a = mysqli_fetch_array($result))
          {
            echo $return = '
            <h6><b>Name :</b> '.$a['telecaller_name'].'</h6>
            <h6><b>Phone Number :</b><a href="tel:'.$a['telecaller_phone'].'">'.$a['telecaller_phone'].'</a>
            </h6>
            <h6><b>Alt. Phone Number :</b> <a href="tel: '.$a['telecaller_alt_phone'].'">'.$a['telecaller_alt_phone'].'</a>
            </h6>
            <h6><b>Whatsapp Number :</b><a target="_blank" href="https://wa.me/'.$a['telecaller_whatsapp'].'?text=Hello%20I%20want%20to%20know%20about%20VilloTale">'.$a['telecaller_whatsapp'].'</a>
            </h6>
            <h6><b>Telecaller Email :</b><a href="mailto : '.$a['telecaller_email'].'">'.$a['telecaller_email'].'</a>
            </h6>
            <h6><b>Commission per call :</b> '.$a['commission_per_call'].'</h6>
            <h6><b>Commission type :</b> '.$a['commission_type'].'</h6>
            <h6><b>Basic Pay :</b> '.$a['basic_pay'].'</h6>
            <h6><b>Status :</b> '.$a['telecaller_status'].'</h6>
           

      
            ';
        }
    }

    // edit
    if(isset($_POST['t_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM tele_caller WHERE t_id = $s_id ";
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
        $id = $_POST['t_id'];
        $a = $_POST['telecaller_name'];
        $b = $_POST['telecaller_phone'];
        $c = $_POST['telecaller_alt_phone'];
        $d = $_POST['telecaller_whatsapp'];
        $e = $_POST['telecaller_email'];
        $f = $_POST['commission_per_call'];
        $g = $_POST['commission_type'];
        $h = $_POST['basic_pay'];
        $i = $_POST['telecaller_status'];

  $data = "UPDATE tele_caller SET telecaller_name = '$a', telecaller_phone = '$b', telecaller_alt_phone = '$c', telecaller_whatsapp = '$d', telecaller_email = '$e', commission_per_call = '$f', commission_type = '$g', basic_pay = '$h', telecaller_status = '$i'  WHERE t_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:add_tele.php');
   
  }



}

?>