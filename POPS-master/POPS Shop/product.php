<?php 
session_start();
include("functions.php")?>
<!DOCTYPE html>
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

</head>

<body>
	<!-- HEADER -->
		

		<!-- HEADER -->
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
								<li>USD ($)</li>
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
						<a class="logo" href="index.php">
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
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							
							<ul class="custom-menu">
								<?php
                                $email = $_SESSION['email'];

					           $get_cust = "select * from Customer where Email='$email'";

					           $run_cust = mysqli_query($con, $get_cust);

                                $row_cust = mysqli_fetch_array($run_cust);
                                    
					           $cust_id = $row_cust['Customer_ID'];
					           $first_name = $row_cust['First_Name'];
                        
                                if(isset($_SESSION['email'])){
                                    echo"
                                <li><a href='Customer/manageAccount.php'><i class='fa fa-user-o'></i> $first_name 's Account</a></li>
                                ";
                                }
                                else{
                                echo"
                                <li><a href='Customer/manageAccount.php'><i class='fa fa-user-o'></i> My Account</a></li>
                                
                                ";}
                                    ?>
                                <?php
				                    if(!isset($_SESSION['email'])){
					
                                    echo "<a style='text-decoration:none;'href='login.php'>Log-In</a>/
                                    <a style='text-decoration:none;'href='signup.php'>Sign-Up</a>";
					
                                        }
                                    else {
                                        echo "<a style='text-decoration:none;'href='logout.php'>Log-Out</a>
                                        <li><a href='orders.php'><i class='fa fa-check'></i> My Orders</a></li>
                                        ";
					                   }
			                     ?>
                                
								<li><a href="cart.php"><i class="fa fa-check"></i> Checkout</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">3</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									
									<div class="shopping-cart-btns">
                                        <form method="get" action="cart.php">
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
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Video Games <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-6">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">SubCategories</h3></li>
                                            <li><a href="products.php?item_cat=Video Games">All</a></li>
											<li><a href="products.php?item_subcat=RPG">RPG</a></li>
											<li><a href="products.php?item_subcat=MOBA">MOBA</a></li>
											<li><a href="products.php?item_subcat=Shooter">Shooter</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									
								</div>
								
							</div>
						</li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Series & Movies<i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">SubCategories</h3></li>
                                            <li><a href="products.php?item_cat=Series">All</a></li>
											<li><a href="products.php?item_subcat=Heroes">Heroes</a></li>
											<li><a href="products.php?item_subcat=Animation">Animation</a></li>
											<li><a href="products.php?item_subcat=ScienceFiction">Science Fiction</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									
								</div>
								
							</div>
						</li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sports <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">SubCategories</h3></li>
                                            <li><a href="products.php?item_cat=Sports">All</a></li>
											<li><a href="products.php?item_subcat=Baseball">Baseball</a></li>
											<li><a href="products.php?item_subcat=Basketball">Basketball</a></li>
											<li><a href="products.php?item_subcat=Wrestiling">WWE</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									
								</div>
								
							</div>
						</li>
                        <li><a href="products.php">All Products</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
    <!-- BREADCRUMB -->
    
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<?php getItem()?>
	</div>
	<!-- /section -->

<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img style="width: 50px" src="./img/Pop-logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Welcome to POPS Shop! We hope you find what you're looking for! Feel free to checkout our items, no commitment!</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="Customer/manageAccount.php">My Account</a></li>
							<li><a href="cart.php">View Cart</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="mailto:kenneth.gonzalez11@upr.edu">Send us an email if you have any doubts!</a> </li>
							
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved POPS Shop |
						
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
