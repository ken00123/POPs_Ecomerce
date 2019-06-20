<?php
session_start();
    if(!isset($_SESSION['a_email']))
    {
    	echo "<script>alert('You must be logged in as an Admin!')</script>";
		echo "<script>window.open('admin.php','_self')</script>";
	}
?>