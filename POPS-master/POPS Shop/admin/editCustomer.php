<!DOCTYPE html>

  <?php
    include '../conection.php';
    include 'sessionAdmin.php';
    
    if(isset($_GET['editCustomer']))
    {
      $get_id = $_GET['editCustomer'];
			$get_cust = "select * from Customer where Customer_ID ='$get_id'";

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
            $cust_phone = $row_cust['Phone_Number'];
			$cust_mem_date = $row_cust['Member_Date'];
            $cust_status = $row_cust['Active'];
    }

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body 
{
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

<form action="" method = "post" enctype="multipart/form-data">
  <div class="main">
    <h1>Edit Customer Information</h1>
    <hr>
    
    <label for="name"><b>Name</b></label>
    <input type="text" value="<?php echo $cust_first; ?>" name="name" required>
      
    <label for="middle_name"><b>Middle Name</b></label>
    <input type="text" value="<?php echo $cust_init; ?>" name="midde_name">
    
    <label for="last name"><b>Last name</b></label>
    <input type="text" value="<?php echo $cust_last; ?>" name="last_name" required>
    
    <label for="phone number"><b>Phone Number</b></label>
    <input type="text" value="<?php echo $cust_phone; ?>" name="phone_number" required>
    
    <label for="email address"><b>Email Address</b></label>
    <input type="text" value="<?php echo $cust_email; ?>" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" value="<?php echo $cust_pass; ?>" name="psw" required>
    
    <h1>Billing Address</h1>
    
    <label for="address"><b>Address<b></label>
    <input type="text" value="<?php echo $cust_street; ?>" name="address" required>
    
    <label for="apartment_number"><b>Apartment Number<b></label> 
    <input type="text" value="<?php echo $cust_apt; ?>" name="apartment_number" required>
    
    <label for="city"><b>City<b></label>
    <input type="text" value="<?php echo $cust_city; ?>" name="city" required>
    
    <label for="state"><b>State<b></label>
    <input type="text" value="<?php echo $cust_state; ?>" name="state" required>
    
    <label for="zip_code"><b>Zip Code<b></label>
    <input type="text" value="<?php echo $cust_zip; ?>" name="zip_code" required>
    
        <?php if($cust_status)
    {?>
    <input type="radio" name="status" value="1" checked> Active
    <input type="radio" name="status" value="0"> Inactive<br>
    <?php 
    }
    else 
    {
      ?>
      <input type="radio" name="status" value="1" > Active
      <input type="radio" name="status" value="0" checked> Inactive<br>
      <?php }  ?>

    <hr>
    
    <button type="submit" class="registerbtn" name = "saveChanges">Save Changes</button>
  </div>
  
</form>
</body>
</html>      

<?php
	if(isset($_POST['saveChanges']))
	{
		$First_Name = $_POST['name'];
		$Middle_Name = $_POST['middle_name'];
		$Last_Name = $_POST['last_name'];
		$Number = $_POST['phone_number'];
		$Email = $_POST['email'];
		$Street_Name = $_POST['address'];
		$Apt_Number = $_POST['apartment_number'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$Zip_Code = $_POST['zip_code'];
        $cust_status = $_POST['status'];

		$update_cust = "update customer set First_Name='$First_Name',Middle_Name='$Middle_Name',Last_Name='$Last_Name',Email='$Email',Phone_Number='$Number',Street_Name='$Street_Name',Apt_Number='$Apt_Number',City='$City',State='$State',Zip='$Zip_Code',Active = '$cust_status' where Customer_ID='$cust_id'";

		$run_update_cust = mysqli_query($con, $update_cust);

		if($run_update_cust){
			echo "<script>alert('Your account as been updated!')</script>";
			echo "<script>window.open('viewCustomer.php','_self')</script>";
		}
	}
?>