<!DOCTYPE html>
<?php
include 'conection.php';
session_start();

$user = $_SESSION['email'];

$get_cust = "select First_Name,Middle_Name,Last_Name,Email,Customer_ID,Street_Name,Apt_Number,City, State, Zip from Customer where Email='$user'";

$run_cust = mysqli_query($con,$get_cust);

$row_cust = mysqli_fetch_array($run_cust);

$cust_id = $row_cust['Customer_ID'];

$cust_first = $row_cust['First_Name'];
$cust_middle = $row_cust['Middle_Name'];
$cust_last = $row_cust['Last_Name'];
$cust_email = $row_cust['Email'];
$cust_street = $row_cust['Street_Name'];
$cust_apt = $row_cust['Apt_Number'];
$cust_city =  $row_cust['City'];
$cust_state = $row_cust['State'];
$cust_zip = $row_cust['Zip'];
$cust_method = $row_cust['Address_Type'];
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
        img{
            height: 60px;
        }
    </style>
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
								<li><a href="#">English (ENG)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
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
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Categories</h3></li>
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
												<h3 class="list-links-title">Categories</h3></li>
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
												<h3 class="list-links-title">Categories</h3></li>
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
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="checkout.php" method="post" class="clearfix">
					

					 <div class="col-50">
						<?php
					if(!isset($_SESSION['email'])){
						echo "<script>alert('You must log-in to checkout!')</script>";
						echo "<script>window.open('login.php','_self')</script>";
					}
					?>
            <h3>Shipping Address</h3>
              <table style="center">
            <label for="adr"><i class="fa fa-address-card-o"></i> Street</label>
            <input type="text" id="adr" name="streetname" value="" required><br>
                  <label for="adr"><i class="fa fa-address-card-o"></i> Apt Number</label>
            <input type="text" id="adr" name="apt" value="" required><br>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="" required> <br>

        
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="" required><br>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" value="" required><br>
              </div>
                  
                  <div>
                <label>Payment Type</label><select name="payment_type" id="payment_type" required>
              <option value="" selected="selected">Select a Payment type: </option>
              <option value="Paypal">Paypal</option>
              <option value="CC">Credit Card</option>
                      </select></div><br>
                  
                  
                  
           </table>
          </div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div><div id="content_area">
			<div id="products_box">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-1">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th></th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Total</th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                <?php
                
                /////////////////////////
                // ADDING ITEM TO CART//
                ///////////////////////
                if(isset($_POST['cart_pid'])){
                    $item_id = $_POST['cart_pid'];
                    $wasFound = False;
                    $i = 0;
                    // if there is no cart session or if the cart is empty 
                    if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
                        $_SESSION["cart_array"] = array(0 => array("item_id" => $item_id,"quantity" => 1 ));
                    }
                    else{
                        // if the cart is not empty
                        foreach ($_SESSION["cart_array"] as $each_item) {
                            $i++;
                            while (list($key, $value) = each($each_item)){
                                if ($key == "item_id" && $value == $item_id){
                                    // Item is in cart so update the quantity
                                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_id, "quantity" => $each_item["quantity"] + 1)));
                                    $wasFound = true;
                                }
                            }
                        }
                        if ($wasFound == false){
                            array_push($_SESSION["cart_array"], array("item_id" => $item_id, "quantity" => 1));
                        }
                        }
                     echo "<script> location.replace('cart.php'); </script> ";
            }?>
            <?php
            
            // EMPTY THE SHOPPING CART //
            if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart"){
                unset($_SESSION["cart_array"]);
            }
            ?>

            <?php
         
            // REMOVE ITEM FROM CART //
  
            if (isset($_POST['remove_item'])) {
                $id_to_remove = $_POST['remove_item'];
                if (count($_SESSION["cart_array"]) <= 0) {
                    unset($_SESSION["cart_array"]);
                }
                else{
                    unset($_SESSION['cart_array']["$id_to_remove"]);
                    sort($_SESSION['cart_array']);
                }
            }
            
           
                    ////////////////////////////////
            ///// UPDATE ITEM QUANTITY ////
            //////////////////////////////
            if (isset($_POST['item_to_edit']) && $_POST['item_to_edit'] !=""){
                $item_to_edit =  $_POST['item_to_edit'];
                $qty = $_POST['qty'];
                if (!is_numeric($qty) || $qty < 1 || $qty == "" || $qty >100) {
                    echo "<script>alert('Please insert a valid number (1-100)')</script>";
                }
                else
                {
                    $i = 0;
                    foreach ($_SESSION["cart_array"] as $each_item){
                        $i++;
                        while (list($key,$value) = each($each_item)) {
                            if ($key=="item_id" && $value == $item_to_edit) {
                                array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id" => $item_to_edit, "quantity" => $qty)));
                            }
                        }
                    }
                }
            }
            // else{
            //     echo "<script>alert('not recieving update')</script>";
            // }

                

            
            
            ?>
            <?php
             $cart_total = 0;
                
                // SHOPPING CART OUTPUT //

                if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
                    echo "Your shopping cart is empty.";
                }
                else {
                    $cart_total = 0;
                    $i = 0;
                    foreach ($_SESSION["cart_array"] as $each_item) {
                        $item_id = $each_item["item_id"];
                        $get_item = "select * from pop_products where Item_ID='$item_id'";
                        $run_item = mysqli_query($con,$get_item);
                        

                        while($row_item=mysqli_fetch_array($run_item)){
                            $item_name = $row_item['Item_Name'];
                            $item_pic = $row_item['Item_Image'];
                            $item_price = $row_item['Price'];
                            $remaining = $row_item['Amount_Remaining'];

                        }
                        $total_price = $item_price * $each_item['quantity'];
                        $cart_total1 = $total_price +($total_price * .115) + $cart_total1;
                        $cart_total = number_format($cart_total1, 2, '.', '');
                        $qty_item = $each_item['quantity'];
                        
                    echo "<tr>
                    <td class='col-sm-8 col-md-6'>
                    <div class='media'>
                        <a class='thumbnail pull-left' href='product.php?item_id=$item_id'> <img class='media-object' src='$item_pic' style='width: 72px; height: 72px;'> </a>
                        <div class='media-body'>
                            <h4 class='media-heading'><a href='product.php?item_id=$item_id'>$item_name</a></h4>
                            <span>Items remaining: </span><span class='text-success'><strong>$remaining</strong></span>
                        </div>
                    </div></td>
                    <form action='cart.php' method='post'>
                    <td class='col-sm-1 col-md-1' style='text-align: center'>
                        <input type='text' name='qty' id='qty' value='$qty_item' size='1'>
                        <button name='adjustBtn'. $item_id .'' type='submit' class='btn btn-warning btn-xs'> Edit </button>
                        <input name='item_to_edit' type='hidden' value='$item_id'/>
                    </form>
                    </td>
                    <td></td>
                    <td class='col-sm-1 col-md-1 text-center'><strong>$item_price</strong></td>
                    <td class='col-sm-1 col-md-1 text-center'><strong>$total_price</strong></td>
                    <td class='col-sm-1 col-md-1'>
                    <form action='cart.php' method='post'>
                    <input type='hidden' name='remove_item' id='remove_item' value='$i'/>
                        <button name='deleteBtn' . $item_id . '' type='submit' class='btn btn-danger'>
                            <span ></span> Remove </button>
                    </form></td>
                    </tr>
                    <tr>
                    
                                   
                    ";
                    $i++;
                       
                    
		                  
    
                    }
                    echo "<tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                       
                                        <td><h3>Total</h3></td>
                                        <td class='text-right'><h3><strong>$ $cart_total </strong></h3></td>
                                    </tr>";
                    
                }
                ?>
                                </tbody>
                                    
                                     <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>
                                        <button type="button" class="btn btn-danger">
                                        <a style="text-decoration:none;color:white;" href="cart.php?cmd=emptycart">
                                             Empty Cart</a>
                                        </button></td>
                                        <td>
                                        <button type="button" class="btn btn-info">
                                        <a style="text-decoration:none;color:white;" href="products.php">
                                            Continue Shopping </a>
                                        </button></td>
                                        <td>
                                            <div span 4><center><button style="text-decoration:none;color:white;" type="submit" class="btn btn-info" name="Checkout" value="Checkout">Checkout</button></center></div></td>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
							<div class="pull-right">
                                
								
                               
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
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
							<a class="logo" href="index.php">
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

