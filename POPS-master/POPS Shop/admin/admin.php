<!DOCTYPE html>
<?php
//test
include '../conection.php';
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #F8694A;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method="post" action="">
  <div class="container">
      
    <h1 align="center">Admin Sign In</h1>
    <input type="text" name="email" placeholder="email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <center><input type="submit" name="login" value="login" class = "registerbtn"></center>
    
    <br>
  </div>
</form>

</body>
</html>

<?php

if(isset($_POST['login']))
{
    
	$a_email = $_POST['email'];
	$a_pass = $_POST['password'];
    

	$get_admin = "select * from Admin where Email='$a_email' AND Password='$a_pass'";

	$run_admin = mysqli_query($con, $get_admin);

	$check_admin = mysqli_num_rows($run_admin);

	if($check_admin==0){
		echo "<script>alert('Password or email is incorrect!')</script>";
		exit();
	}
	else{
		$_SESSION['a_email']=$a_email;

		echo "<script>alert('Log-in successful!')</script>";
		echo "<script>window.open('createCustomerAccount.php','_self')</script>";
	}
}
?>
