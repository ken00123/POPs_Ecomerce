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
.submitbtn {
  background-color: #F8694A;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.submitbtn:hover {
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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
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

<div class="main">
    <h1>View/Edit Admin Accounts</h1>
<table>
  <?php
		//$email = $_SESSION['email'];
        
    $get_admin = "select * from Admin";

		$run_admin = mysqli_query($con, $get_admin);

		while($row_admin = mysqli_fetch_array($run_admin))
    {
      $admin_id = $row_admin['Admin_ID'];
			$admin_first = $row_admin['First_Name'];
			$admin_last = $row_admin['Last_Name'];
      $admin_phone = $row_admin['Phone_Number'];
			$admin_email = $row_admin['Email'];
			$admin_pass = $row_admin['Password'];                  
                        
      echo"<table class='table table-hover'style='width:1000px;'>
      <tr>				
			<td>$admin_first $admin_last
      <br>$admin_phone";
    ?>
    
    <a href="editAdmin.php?editAdmin=<?php echo $admin_id;?>"><button type="button"style="float: right;" id = $cust_id name = editAdmin>Edit</button></a>
    
    <?php
      echo"
        <br>$admin_email
        <br>$admin_pass
        </td>
			  </tr>";
      }
		?>
</table>
    
</div>
</body>
</html>