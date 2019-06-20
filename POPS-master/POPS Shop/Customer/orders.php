<!DOCTYPE>
<?php
session_start();
include("includes/db.php");
?>

<html>
	<head>
		<title> NBA Caps</title>
		<link rel="stylesheet" href="styles/styles.css" media="all" />
		<!-- <link rel="stylesheet" href="styles/table.css" media="all" /> -->
		<link rel="stylesheet" href="styles/styles_DD.css" media="all" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
					table {
						font-family: arial, sans-serif;
						border-collapse: collapse;
						width: 100%;
					}
					td, th {
						border: 1px solid #919191;
						text-align: left;
						padding: 8px;
					}
					tr:nth-child(even) {
						background-color: #dddddd;
					}
		</style>
	</head>

<body>
 
	<!--Main Containter starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">

			<img id="logo" src="images/nba-logo.png"/> 
	
		</div>
		<!--Header ends here-->

		<!--Navigation bar starts-->
		<div class="topnav">
  			<a style="text-decoration:none;"href="../index.php">Home</a>
			<a style="text-decoration:none;"href="../products.php">Products</a>
			<div class="dropdown">
				<button class="dropbtn">My Account
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a style="text-decoration:none;"href="orders.php">My Orders</a>
					<a style="text-decoration:none;"href="change_password.php">Change Password</a>
				</div>
			</div>
			<?php
				if(!isset($_SESSION['email'])){
					
					echo "<a style='text-decoration:none;'href='../login.php'>Log-In</a>
					<a style='text-decoration:none;'href='../signup.php'>Sign-Up</a>";
					
					}
					else {
					echo "<a style='text-decoration:none;'href='../log-out.php'>Log-Out</a>";
					}
					?>
			
			<a style="text-decoration:none;"href="../cart.php">Shopping Cart</a>

  			<div class="search-container">
    			<form action="./search_results.php">
      				<input type="text" placeholder="Search..." name="search">
      				<button type="submit"><i class="fa fa-search"></i></button>
    			</form>
  			</div>
		<!-- </div> -->
		<!--Navigation bar ends-->
		<div id="content_area">
			<br>
			<h2 align="center">Your Orders</h2>
			<br>
			
			<?php
			$user = $_SESSION['email'];

			$get_orders = "select * from orders join customer using(ID) where Email='$user'";

			$run_orders = mysqli_query($con, $get_orders);

			while($row_orders = mysqli_fetch_array($run_orders))
			{
				$orders_id = $row_orders['Order_Number'];
				$orders_date = $row_orders['Order_Date'];
				$orders_amount = $row_orders['Amount_Caps'];
				$orders_price = $row_orders['Total_Price'];
				$orders_status = $row_orders['Order_Status'];
				$orders_tracknum = $row_orders['Tracking_Number'];

				echo "<center><table>

				<tr>
					<th>Order Number</th>
					<th>Order Date</th>
					<th>Amount of Caps</th>
					<th>Total Price</th>
					<th>Order Status</th>
					<th>Tracking Number</th>
			  	</tr>

			  <tr>
				<td>$orders_id</td>
				<td>$orders_date</td>
				<td>$orders_amount</td>
				<td>$orders_price</td>
				<td>$orders_status</td>
				<td>$orders_tracknum</td>
			  </tr>
			</table><br></center>";
			}
			?>
		</body>
	<div id="footer">
			<h2 style ="text-align:center; padding-top:30px;">&copy;2018
		</div>
</html>
			