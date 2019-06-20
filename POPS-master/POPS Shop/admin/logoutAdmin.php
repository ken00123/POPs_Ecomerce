<?php 

session_start(); 

session_destroy(); 

echo "<script>alert('Successfully logged-out')</script>";

echo "<script>window.open('admin.php','_self')</script>";


?>