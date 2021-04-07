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
			$a = $sheet->getCellByColumnAndRow(0,$i)-> getValue();
			$b = $sheet->getCellByColumnAndRow(1,$i)-> getValue();
			$c = $sheet->getCellByColumnAndRow(2,$i)-> getValue();
			$d = $sheet->getCellByColumnAndRow(3,$i)-> getValue();


			$data = "INSERT INTO lead_master(guest_name,guest_ph,guest_email,guest_city, lead_date, t_id, lead_source,guest_interested_in,lead_telecaller)Values('$a','$b','$c','$d','$e','$f','$g','$h','$nn')";
			$result = mysqli_query($con,$data);

		}
	}
	
	// if($result)
	// 	{
	// 		header("location:add_lead.php");
	// 	}
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