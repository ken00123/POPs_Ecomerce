<!DOCTYPE>
<?php
include '../conection.php';
	session_start();


	$email = $_SESSION['email'];

					$get_cust = "select * from Customer where Email='$email'";

					$run_cust = mysqli_query($con, $get_cust);

					$row_cust = mysqli_fetch_array($run_cust);

					$cust_id = $row_cust['Customer_ID'];
					$cust_first = $row_cust['First_Name'];
					$cust_init = $row_cust['Middle_Name'];
					$cust_last = $row_cust['Last_Name'];
					$cust_email = $row_cust['Email'];
					$cust_pass = $row_cust['Password'];
                    $cust_street = $row_cust['Street_Name'];
				    $cust_apt = $row_cust['Apt_Number'];
				    $cust_city =  $row_cust['City'];
				    $cust_state = $row_cust['State'];
                    $cust_zip = $row_cust['Zip'];
				    $cust_method = $row_cust['Address_Type'];
                    $cust_phone = $row_cust['Phone_Number'];
					$cust_mem_date = $row_cust['Member_Date'];
?>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Welcome to POPS Shop!</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
		<form action = "" method = "post" enctype="multipart/form-data" role="form"><center>
			<table align="center" width="500px" bgcolor="lightgray">
				<tr><td>
					<h2>Edit your Information</h2>
					<table class="table table-hover"style="width:1000px;">
						<tr>
							<th width="30%">First Name</th>
							<td><input type="text" name="first_name" id="first_name" class="form-control input-lg" value="<?php echo $cust_first?>"tabindex="1"></td>
						</tr>
						<tr>
							<th width="30%">Middle Name</th>
							<td><input type="text" name="middle_name" id="middle_name" class="form-control input-lg"value="<?php echo $cust_init?>" tabindex="2"></td>
						</tr>
						<tr>
							<th width="30%">Last Name</th>
							<td><input type="text" name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $cust_last?>"tabindex="3"></td>
						</tr>
						<tr>
							<th>Phone Number</th>
							<td><input type="text" name="phone_number" id="phone_number" class="form-control input-lg" value="<?php echo $cust_phone?>"tabindex="4"></td>
						</tr>
						<tr>
							<th>Password</th>
							<td><input type="text" name="password" id="password" class="form-control input-lg" value="<?php echo $cust_pass?>" tabindex="5"></td>
						</tr>
						<tr>
							<th>Street</th>
							<td><input type="text" name="street" id="street" class="form-control input-lg" value="<?php echo $cust_street?>"tabindex="6"></td>
						</tr>
						<tr>
							<th>Apartment number</th>
							<td><input type="text" name="apt_number" id="apt_number" class="form-control input-lg" value="<?php echo $cust_apt?>" tabindex="7"></td>
						</tr>
						<tr>
							<th>City</th>
							<td><input type="text" name="city" id="city" class="form-control input-lg" value="<?php echo $cust_city?>" tabindex="8"></td>
						</tr>
						<tr>
							<th>State</th>
							<td><input type="text" name="state" id="state" class="form-control input-lg" value="<?php echo $cust_state?>" tabindex="9"></td>
						</tr>
						<tr>
							<th>Zip Code</th>
							<td><input type="text" name="zip_code" id="zip_code" class="form-control input-lg" value="<?php echo $cust_zip?>" tabindex="10"></td>
						</tr>
						<tr>
							<th>Address Type</th>
							<td>
								<select name="method" class="form-control input-lg">
								<option><?php echo $cust_method?></option>
								<option value="Billing">Billing</option>
								<option value="Shipping">Shipping</option>
                                <option value="Both">Both</option>
								</select>
							</td>
						</tr>	
					</table>
							
		</form></center>
		<div span 4><center><input type="submit" name="Save_Changes" value="Save Changes"  tabindex="5"></center></div>	
<?php
	if(isset($_POST['Save_Changes']))
	{
		$First_Name = $_POST['first_name'];
		$Middle_Name = $_POST['middle_name'];
		$Last_Name = $_POST['last_name'];
		$Number = $_POST['phone_number'];
		$password = $_POST['password'];
		$Street_Name = $_POST['street'];
		$Apt_Number = $_POST['apt_number'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$Zip_Code = $_POST['zip_code'];
		$Method = $_POST['method'];

		$update_cust = "update customer set First_Name='$First_Name',Middle_Name='$Middle_Name',Last_Name='$Last_Name',Password='$password',Phone_Number='$Number',Street_Name='$Street_Name',Apt_Number='$Apt_Number',City='$City',State='$State',Zip='$Zip_Code',Address_Type='$Method' where Customer_ID='$cust_id'";

		$run_update_cust = mysqli_query($con, $update_cust);


		if($run_update_cust){
			echo "<script>alert('Your account as been updated!')</script>";
			echo "<script>window.open('manageAccount.php','_self')</script>";
		}
		
		
		
	}
?>