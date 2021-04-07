<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
	$a = $_POST['supplier_name'];
	$b = $_POST['supplier_contact_name'];
	$c = $_POST['supplier_contact_number'];
	$d = $_POST['supplier_email'];
  $e = $_POST['supplier_state'];
  $f = $_POST['supplier_address'];
  $g = $_POST['supplier_gst'];
  $h = $_POST['supplier_type'];

	$data = "INSERT into package_supplier_master(supplier_name, supplier_contact_name, supplier_contact_number, supplier_email, supplier_state, supplier_address, supplier_gst, supplier_type )VALUES('$a','$b','$c','$d','$e','$f','$g','$h')";
	$result = mysqli_query($con, $data);

	if($result)
	{
		header('location:package_supplier.php');
	}


}

// edit
    if(isset($_POST['c_edit']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;
        $result_array = [];

        $data = "SELECT * FROM package_supplier_master WHERE pkg_vendor_id = $s_id ";
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
        $id = $_POST['pkg_vendor_id'];
        $a = $_POST['supplier_name'];
        $b = $_POST['supplier_contact_name'];
        $c = $_POST['supplier_contact_number'];
        $d = $_POST['supplier_email'];
        $e = $_POST['supplier_state'];
        $f = $_POST['supplier_address'];
        $g = $_POST['supplier_gst'];
        $h = $_POST['supplier_type'];

       
       
  $data = "UPDATE package_supplier_master SET supplier_name = '$a', supplier_contact_name = '$b' , supplier_contact_number = '$c' , supplier_email = '$d', supplier_state = '$e', supplier_address = '$f',supplier_gst = '$g', supplier_type = '$h' WHERE pkg_vendor_id = '$id' ";
  $result = mysqli_query($con, $data);

  if($result)
  {
    header('location:package_supplier.php');
   
  }
}

if(isset($_POST['c_view']))
    {
        $s_id = $_POST['s_id'];
        // echo $return = $s_id;

        $data = "SELECT * FROM  package_supplier_master WHERE pkg_vendor_id = $s_id ";
        $result = mysqli_query($con,$data);

         while ($b = mysqli_fetch_array($result))
          {
            echo $return = '
            <h6><b>Supplier Name :</b>'.$b['supplier_name'].'</h6>
            <h6><b>Contact Name  :</b>'.$b['supplier_contact_name'].'</h6>
            <h6><b>Contact Number : </b>'.$b['supplier_contact_number'].' </a></h6>
            <h6><b>Email  : </b>'.$b['supplier_email'].'</h6>
            <h6><b>State : </b>'.$b['supplier_state'].' </a></h6>
            <h6><b>Address  : </b>'.$b['supplier_address'].'</h6>
            <h6><b>GST  : </b>'.$b['supplier_gst'].'</h6>
            <h6><b>Supplier Type  : </b>'.$b['supplier_type'].'</h6>
            ';
          }
    }

?>