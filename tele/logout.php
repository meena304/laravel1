<?php
session_start();
session_unset(); #logout
header('location:index.php');

?>