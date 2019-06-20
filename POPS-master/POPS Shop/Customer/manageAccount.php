<!DOCTYPE html>
<?php
include '../conection.php';
session_start();
if(!$_SESSION['email']){
	echo "<script>alert('You are not logged in!')</script>";
	echo "<script>window.open('../login.php','_self')</script>";
}
?>
<html lang="en">
<head>
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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    <style>
        .background_pic{
            background-size: cover;
            height: 100%;
            width: 100%;
        }
    </style>
           </head>
<body>
    <header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to POPS Shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li>English (ENG)</li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li>>USD ($)</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="../index.php">
							<img style="width: 50px" src="./img/Pop-logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						
							<form action="searchresults.php">
      				<input type="text" placeholder="Search..." name="search">
      				<button type="submit"><i class="fa fa-search"></i></button>
    			
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li>
							
							<ul>
								<?php
                                $email = $_SESSION['email'];

					           $get_cust = "select * from Customer where Email='$email'";

					           $run_cust = mysqli_query($con, $get_cust);

                                $row_cust = mysqli_fetch_array($run_cust);
                                    
					           $cust_id = $row_cust['Customer_ID'];
					           $first_name = $row_cust['First_Name'];
                        
                                if(isset($_SESSION['email'])){
                                    echo"
                                <li><a href='manageAccount.php'><i class='fa fa-user-o'></i> $first_name 's Account</a></li>
                                ";
                                }
                                else{
                                echo"
                                <li><a href='manageAccount.php'><i class='fa fa-user-o'></i> My Account</a></li>
                                
                                ";}
                                    ?>
                                <?php
				                    if(!isset($_SESSION['email'])){
					
                                    echo "<a style='text-decoration:none;'href='login.php'>Log-In</a>/
                                    <a style='text-decoration:none;'href='../signup.php'>Sign-Up</a>";
					
                                        }
                                    else {
                                        echo "<a style='text-decoration:none;'href='logout.php'>Log-Out</a>
                                        <li><a href='../orders.php'><i class='fa fa-check'></i> My Orders</a></li>
                                        ";
					                   }
			                     ?>
                                
								<li><a href="../cart.php"><i class="fa fa-check"></i> Checkout</a></li>

							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">

							<div>
								<div id="shopping-cart">
									
									<div class="shopping-cart-btns">
                                        <form method="get" action="../cart.php">
										<button type="submit" class="main-btn">View Cart</button></form>

									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>


  <div class="container">
    <h1>Account Management</h1>
    <h2>Account Information:</h2>
					<br>
                    <table>
					<?php
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
                        
                        	echo"
					<table class='table table-hover'style='width:1000px;'>
						<tr>
							<th width='30%'>First Name</th>
							<td>$cust_first</td>
						</tr>
						<tr>
							<th width='30%'>Middle Name</th>
							<td>$cust_init</td>
						</tr>
						<tr>
							<th width='30%'>Last Name</th>
							<td>$cust_last</td>
						</tr>
                        <tr>
							<th width='30%'>Password</th>
							<td>$cust_pass</td>
						</tr>
                        <tr>
							<th width='30%'>Street Name</th>
							<td>$cust_street</td>
						</tr>
                        <tr>
							<th width='30%'>Apt #</th>
							<td>$cust_apt</td>
						</tr>
                        <tr>
							<th width='30%'>City</th>
							<td>$cust_city</td>
						</tr>
                        <tr>
							<th width='30%'>State</th>
							<td>$cust_state</td>
						</tr>
                        <tr>
							<th width='30%'>Zip Code</th>
							<td>$cust_zip</td>
						</tr>
                        <tr>
							<th width='30%'>Address Type</th>
							<td>$cust_method</td>
						</tr>
                        <tr>
							<th width='30%'>Phone Number</th>
							<td>$cust_phone</td>
						</tr>
                        <tr>
							<th width='30%'>Member Join Date</th>
							<td>$cust_mem_date</td>
						</tr>
                        ";

						
				
						?>
						


				
					</table>
					<tr align="center">
						<td colspan="7"><a href="manageAccount.php?edit_information"><button>  Edit Information</button></a></td>
					</tr>
					<?php 
						if(isset($_GET['edit_information'])){
						include("edit_information.php");
						}
					
					?>
					<br>
  </div>


</body>
</html>