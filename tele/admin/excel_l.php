<?php
include "dbcon.php";
if(isset($_POST['add']))
{
	$e = $_POST['lead_date'];
	$f = $_POST['t_id'];
	$g = $_POST['lead_source'];
	$h = $_POST['guest_interested_in'];

	  $data = "SELECT * FROM tele_caller WHERE t_id = '$f' ";
      $name = mysqli_query($con,$data);

      $z = mysqli_fetch_array($name);
      $nn = $z['telecaller_name'];


	require('PHPExcel/PHPExcel.php');
	require('PHPExcel/PHPExcel/IOFactory.php');
	$file = $_FILES['doc']['tmp_name'];

	$obj = PHPExcel_IOFactory::load($file);

	foreach ($obj-> getWorksheetIterator() as $sheet) 
	{
		$getHighestRow = $sheet-> getHighestRow();

		for($i = 2; $i<= $getHighestRow; $i++)
		{
			$a = $sheet->getCellByColumnAndRow(2,$i)-> getValue();
			$b = $sheet->getCellByColumnAndRow(4,$i)-> getValue();
			$c = $sheet->getCellByColumnAndRow(5,$i)-> getValue();
			$d = $sheet->getCellByColumnAndRow(6,$i)-> getValue();
			$z = $sheet->getCellByColumnAndRow(7,$i)-> getValue();
			$j = $sheet->getCellByColumnAndRow(8,$i)-> getValue();
			$k = $sheet->getCellByColumnAndRow(10,$i)-> getValue();
			$l = $sheet->getCellByColumnAndRow(13,$i)-> getValue();

			

			$data = "INSERT INTO lead_master(guest_name,guest_ph,guest_email,guest_city, lead_date, t_id, lead_source, guest_interested_in, no_of_traveler, lead_status, lead_telecaller)Values('$b','$c','$d','$j','$e','$f','$g','$h','$k','$a','$nn')";
			$result = mysqli_query($con,$data);

			$data = "SELECT MAX(lead_id) as id FROM lead_master";
			$result = mysqli_query($con,$data);
			$x = mysqli_fetch_array($result);
			$l_id = $x['id'];
			$data = "INSERT INTO lead_call_details(lead_id,remark,follow_up_date) VALUES('$l_id','$j','$l')";
			$result = mysqli_query($con,$data);
			// if($result)
			// {
			// 	header("location:add_lead.php");
			// }

		}
	}
}

?>

<!-- <form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Lead Date</label>
		<input type="date" name="lead_date"  class="form-control">
	</div>
	<div class="form-group">
		<label>Lead Caller</label>
		<input type="text" name="lead_telecaller" class="form-control">
	</div>
	<div class="form-group">
		<label>Lead Source</label>
		<input type="text" name="lead_source" class="form-control">
	</div>
	<div class="form-group">
		<label>Browse File</label>
		<input type="file" name="doc" class="form-control">
	</div>
	<input type="submit" name="add"/>
</form>
 -->