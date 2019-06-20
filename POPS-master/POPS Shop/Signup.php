<!DOCTYPE html>
<?php
include 'conection.php';
session_start();

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
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

<form action ="Signup.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="first_name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="first_name" required>
    
    <label for="middle_name"><b>Middle name</b></label>
    <input type="text" placeholder="Enter Middle Name" name="middle_name">
      
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
    
    <h1>Address</h1>
    
     <label for="street_name"><b>Address<b></label>
    <input type="text" placeholder="Street Name" name="street_name" required>
    
    <label for="apt_number"><b>Apartment Number<b></label> <input type="text" placeholder="Enter Apartment Number" name="apt_number" required>
    
    <label for="city"><b>City<b></label>
    <input type="text" placeholder="Enter City" name="city" required>
    
    <label for="state"><b>State<b></label>
    <input type="text" placeholder="State(PR)" name="state" required>
    
    <label for="zip_code"><b>Zip Code<b></label>
    <input type="text" placeholder="Enter Zip Code" name="zip_code" required>
    <p>Address Type</p><select name="method" class="form-control input-lg">
								<option value="Both">Both</option>
								<option value="Billing">Billing</option>
								<option value="Shipping">Shipping</option>
							</select>
    
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="Register" value="Register">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.html">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
        <?php
	if(isset($_POST['Register']))
	{
		//Get textfield info
		$first_name = $_POST['first_name'];
		$mid_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];

		$phone = $_POST['phone'];

		$str_name = $_POST['street_name'];
		$apt_num = $_POST['apt_number'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip_code = $_POST['zip_code'];
		$method = $_POST['method'];

		$password = $_POST['password'];
		$password_confirmation = $_POST['password_confirmation'];
		
		//Get emails in datebase to see if its already in use
		$get_emails = "select email from Customer";
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
				$insert_cust = "insert into Customer (First_Name,Middle_Name,Last_Name,Street_Name,Apt_Number,City,State,Zip,Address_Type,Phone_Number,Email,Password) values ('$first_name','$mid_name','$last_name','$str_name','$apt_num','$city','$state','$zip_code','$method','$phone','$email','$password')";
				$run_insert_cust = mysqli_query ($con, $insert_cust);

				$get_cust = "select Customer_ID from Customer where Email='$email'";
				$run_cust = mysqli_query($con, $get_cust);

				
				if($run_cust){
					echo "<script>alert('Account has been created successfully, Thanks!')</script>";
					echo "<script>window.open('index.php','_self')</script>";
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