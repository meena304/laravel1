<?php
session_start();

if(empty($_SESSION['a']))
{
	header('location:../index.php');
}

?>