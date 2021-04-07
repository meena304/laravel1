<?php
$con = new mysqli("localhost","root","","vt_backend");

if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>