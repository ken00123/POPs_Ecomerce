<!DOCTYPE html>
<?php
include '../conection.php';
include 'sessionAdmin.php';
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
body {
    font-family: "Lato", sans-serif;
}
    
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #f1f1f1;
  display: inline-block;
  border: #F8694A;
  overflow-x: hidden;
  padding-top: 20px;
}
    
.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  border: #F8694A;
  display: block;
}

.sidenav a:hover {
  color: black;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
    
  <div class="sidenav">
    <a href="createCustomerAccount.php">Create Customer Account</a>
    <a href="createAdminAccount.php">Create Admin Account</a>
    <a href="viewCustomer.php">View Customer Account</a>
    <a href="viewAdmin.php">View Admin Account</a>
    <a href="viewProducts.php">View Products</a>
    <a href="newProduct.php">Add New Product</a>
    <a href="viewOrders.php">View Orders</a>
    <a href="createReport.php">Create Reports</a>
    <a href="logoutAdmin.php">Logout</a>
  </div> 

<form action="createAdminAccount.php" method="post">
  <div class="main">
    <h1>Create Admin Account</h1>
    <p>Please fill in this form to create an admin account.</p>
    <hr>
    
    <label for="first_name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="first_name" required>
    
    <label for="last_name"><b>Last name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last_name" required>
    
    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone" required>
    
    <label for="email"><b>Email Address</b></label>
    <input type="text" placeholder="Enter Email Address" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="password_confirmation"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_confirmation" required>
    
    <hr>

    <button type="submit" class="registerbtn" name = "Register" value = "Register">Register</button>
  </div>
</form>

</body>
</html>

<?php
	if(isset($_POST['Register']))
	{
		//Get textfield info
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$password = $_POST['password'];
		$password_confirmation = $_POST['password_confirmation'];
		
		//Get emails in datebase to see if its already in use
		$get_emails = "select email from Admin";
		$compare_emails = mysqli_query ($con, $get_emails);
    $exists = FALSE;
    
		while($row_email = mysqli_fetch_array($compare_emails))
		{
			$temp_email = $row_email['email'];
			if($email == $temp_email)
				$exists = TRUE;
    }
    
		if (!$exists)
		{
			//Compare if password and password confirmation is the same
			if($password==$password_confirmation)
			{
			  //Create the user's account
				$insert_admin = "insert into Admin (First_Name,Last_Name,Phone_Number,Email,Password) values ('$first_name','$last_name','$phone','$email','$password')";
				$run_insert_admin = mysqli_query ($con, $insert_admin);

				$get_admin = "select Admin_ID from Admin where Email='$email'";
                
        //To find the admin just created
				$run_admin = mysqli_query($con, $get_admin);

				
				if($run_admin){
					echo "<script>alert('Account has been created successfully, Thanks!')</script>";
					echo "<script>window.open('createAdminAccount.php','_self')</script>";
				}
                
        $_SESSION['email']=$email;

			}
			else 
				echo "<script>alert('Passwords do not match')</script>";
		}
		else
			echo "<script>alert('Email is already in use!')</script>";
	} 
?>