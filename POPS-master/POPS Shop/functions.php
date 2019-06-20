<?php
include 'conection.php';
session_start();


#hostname,username,password,dbname

    function getAllItems(){

        global $con;
        if (isset($_GET['item_subcat'])){
            $cat_name = $_GET['item_subcat'];
			$get_items = "select * from pop_products WHERE Item_Subcategory = '$cat_name' and Active = 1";
			
        }
        else if(isset($_GET['item_cat'])){
            $cat_name = $_GET['item_cat'];
			$get_items = "select * from pop_products WHERE Item_Category = '$cat_name' and Active = 1";
			

        }
        else{
            $get_items = "select * from pop_products Where Active = 1";
        }

        
        
        #database connection, query
           
        $run_items = mysqli_query($con, $get_items);
    
        while($row_items=mysqli_fetch_array($run_items)){
    
            $item_id = $row_items['Item_Id'];
            $item_name = $row_items['Item_Name'];
            $item_pic = $row_items['Item_Image'];
            $item_remain = $row_items['Amount_Remaining'];
            $item_price = $row_items['Price'];
            $item_description = $row_items['Description'];
            $item_cat = $row_items['Item_Category'];
            $item_subcat = $row_items['Item_Subcategory'];
            $item_date = $row_items['Date_Added'];
    if($item_remain < 1){
		
            echo "
                    <div class='col-md-4 col-sm-6 col-xs-6'>
								<div class='product product-single'>
									<div class='product-thumb'>
										
										
										<img width='50%' height='200px' src='$item_pic' alt=''>
									</div>
									<div class='product-body'>
										<h3 class='product-price'>Price: $$item_price</h3>
										<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
										<div class='product-btns'>
											<form action='product.php?item_id=$item_id' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-danger'><i class='fa fa-shopping-cart'></i> Out of Stock</button>
                </form>
										</div>
									</div>
								</div>
							</div>
                    
                ";}
            else {echo "
                    <div class='col-md-4 col-sm-6 col-xs-6'>
								<div class='product product-single'>
									<div class='product-thumb'>
								
										
										<img width='50%' height='200px' src='$item_pic' alt=''>
									</div>
									<div class='product-body'>
										<h3 class='product-price'>Price: $$item_price</h3>
										<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
										<div class='product-btns'>
											<form action='cart.php' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</button>
                </form>
										</div>
									</div>
								</div>
							</div>
                    
                ";
                
            }
                
    }
}
//////////////
function getAllsortedDesc()
{

	global $con;

	$get_items = "select * from pop_products Where Active = 1 ORDER BY Price DESC";
	$run_items = mysqli_query($con, $get_items);

	while($row_items=mysqli_fetch_array($run_items)){

		$item_id = $row_items['Item_Id'];
		$item_name = $row_items['Item_Name'];
		$item_pic = $row_items['Item_Image'];
		$item_remain = $row_items['Amount_Remaining'];
		$item_price = $row_items['Price'];
		$item_description = $row_items['Description'];
		$item_cat = $row_items['Item_Category'];
		$item_subcat = $row_items['Item_Subcategory'];
		$item_date = $row_items['Date_Added'];
if($item_remain < 1){

		echo "
				<div class='col-md-4 col-sm-6 col-xs-6'>
							<div class='product product-single'>
								<div class='product-thumb'>
									
									
									<img width='50%' height='200px' src='$item_pic' alt=''>
								</div>
								<div class='product-body'>
									<h3 class='product-price'>Price: $$item_price</h3>
									<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
									<div class='product-btns'>
										<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
										<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
										<form action='product.php?item_id=$item_id' method='post'>
			<input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
			<button type='submit' class='btn btn-danger'><i class='fa fa-shopping-cart'></i> Out of Stock</button>
			</form>
									</div>
								</div>
							</div>
						</div>
				
			";}
		else {echo "
				<div class='col-md-4 col-sm-6 col-xs-6'>
							<div class='product product-single'>
								<div class='product-thumb'>
							
									
									<img width='50%' height='200px' src='$item_pic' alt=''>
								</div>
								<div class='product-body'>
									<h3 class='product-price'>Price: $$item_price</h3>
									<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
									<div class='product-btns'>
										<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
										<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
										<form action='cart.php' method='post'>
			<input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
			<button type='submit' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</button>
			</form>
									</div>
								</div>
							</div>
						</div>
				
			";
			
		}
			
}
}

//////////////
function getAllsortedAsc()
{

	global $con;

	$get_items = "select * from pop_products Where Active = 1 ORDER BY Price ASC";
	$run_items = mysqli_query($con, $get_items);

	while($row_items=mysqli_fetch_array($run_items)){

		$item_id = $row_items['Item_Id'];
		$item_name = $row_items['Item_Name'];
		$item_pic = $row_items['Item_Image'];
		$item_remain = $row_items['Amount_Remaining'];
		$item_price = $row_items['Price'];
		$item_description = $row_items['Description'];
		$item_cat = $row_items['Item_Category'];
		$item_subcat = $row_items['Item_Subcategory'];
		$item_date = $row_items['Date_Added'];
if($item_remain < 1){

		echo "
				<div class='col-md-4 col-sm-6 col-xs-6'>
							<div class='product product-single'>
								<div class='product-thumb'>
									
									
									<img width='50%' height='200px' src='$item_pic' alt=''>
								</div>
								<div class='product-body'>
									<h3 class='product-price'>Price: $$item_price</h3>
									<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
									<div class='product-btns'>
										<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
										<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
										<form action='product.php?item_id=$item_id' method='post'>
			<input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
			<button type='submit' class='btn btn-danger'><i class='fa fa-shopping-cart'></i> Out of Stock</button>
			</form>
									</div>
								</div>
							</div>
						</div>
				
			";}
		else {echo "
				<div class='col-md-4 col-sm-6 col-xs-6'>
							<div class='product product-single'>
								<div class='product-thumb'>
							
									
									<img width='50%' height='200px' src='$item_pic' alt=''>
								</div>
								<div class='product-body'>
									<h3 class='product-price'>Price: $$item_price</h3>
									<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
									<div class='product-btns'>
										<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
										<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
										<form action='cart.php' method='post'>
			<input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
			<button type='submit' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</button>
			</form>
									</div>
								</div>
							</div>
						</div>
				
			";
			
		}
			
}
}

//////////////

function getCategories(){
    echo "
    <form>
							<input class='input search-input' type='text' placeholder='Enter your keyword'>
							<select class='input search-categories'>
								<option value='all'>All Categories</option>
								<option value='Video Games'>Video Games</option>
								<option value='Series'>Series</option>
                                <option value='Sports'>Sports</option>
							</select>
							<button class='search-btn' value='search' name='search'><i class='fa fa-search'></i></button>
						</form>
    ";
}
function getItem(){
     global $con;
        if (isset($_GET['item_id'])){
            $items_ID = $_GET['item_id'];
            $get_items = "select * from pop_products WHERE Item_Id = '$items_ID'";
        
        #database connection, query
           
        $run_items = mysqli_query($con, $get_items);
    
        while($row_items=mysqli_fetch_array($run_items)){
    
            $item_id = $row_items['Item_Id'];
            $item_name = $row_items['Item_Name'];
            $item_pic = $row_items['Item_Image'];
            $item_remain = $row_items['Amount_Remaining'];
            $item_price = $row_items['Price'];
            $item_description = $row_items['Description'];
            $item_cat = $row_items['Item_Category'];
            $item_subcat = $row_items['Item_Subcategory'];
            $item_date = $row_items['Date_Added'];
    if($item_remain < 1){
    echo "
    <div id='breadcrumb'>
		<div class='container'>
			<ul class='breadcrumb'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='products.php?item_subcat=$item_subcat'>$item_subcat Products</a></li>
				<li class='active'>$item_name</li>
                <br>
                <br><br>
                <br>
			</ul>
		</div>
	</div>
	<div class='section'>
		<!-- container -->
		<div class='container'>
			<!-- row -->
			<div class='row'>
				<!--  Product Details -->
				<div class='product product-details clearfix'>
					<div class='col-md-6'>
						<div id='product-main-view'>
							<div class='product-view'>
								<img src='$item_pic' alt=''>
							</div>
						</div>
						<div id='product-view'>
							<div class='product-view'>
								<img src='$item_pic' alt=''>
							</div>
						</div>
					</div>
					<div class='col-md-6'>
						<div class='product-body'>
							
							<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
							<h3 class='product-price'><p>Price: $$item_price<p></h3>
							
							<p><strong>$item_remain</strong> In Stock</p>
							<p><strong>Brand:</strong> Funko POPS</p>
							<p>$item_description</p>
							
							<div class='product-btns'>
								<div class='qty-input'>
								<div class='btn-group cart'>
						<form action='product.php?item_id=$item_id' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-danger'><i class='fa fa-shopping-cart'></i> Out of Stock</button>
                </form>
					</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    ";}
        else{
            echo "
    <div id='breadcrumb'>
		<div class='container'>
			<ul class='breadcrumb'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='products.php?item_subcat=$item_subcat'>$item_subcat Products</a></li>
				<li class='active'>$item_name</li>
                <br>
                <br>
                <br>
                <br>
			</ul>
		</div>
	</div>
	<div class='section'>
		<!-- container -->
		<div class='container'>
			<!-- row -->
			<div class='row'>
				<!--  Product Details -->
				<div class='product product-details clearfix'>
					<div class='col-md-6'>
						<div id='product-main-view'>
							<div class='product-view'>
								<img src='$item_pic' alt=''>
							</div>
						</div>
						<div id='product-view'>
							<div class='product-view'>
								<img src='$item_pic' alt=''>
							</div>
						</div>
					</div>
					<div class='col-md-6'>
						<div class='product-body'>
							
							<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
							<h3 class='product-price'><p>Price: $$item_price<p></h3>
							
							<p><strong>$item_remain</strong> In Stock</p>
							<p><strong>Brand:</strong> Funko POPS</p>
							<p>$item_description</p>
							
							<div class='product-btns'>
								<div class='qty-input'>
								<div class='btn-group cart'>
						<form action='cart.php' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</button>
                </form>
					</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    ";}
        }    
        }
}
function getSearchResults(){

    global $con;

    if(isset($_GET['search'])){
    
    $search = $_GET['search'];

    $get_items = "select * from pop_products where Item_Name like '%$search%'";
       
       
        $run_items = mysqli_query($con, $get_items);
    
        while($row_items=mysqli_fetch_array($run_items)){
    
            $item_id = $row_items['Item_Id'];
            $item_name = $row_items['Item_Name'];
            $item_pic = $row_items['Item_Image'];
            $item_remain = $row_items['Amount_Remaining'];
            $item_price = $row_items['Price'];
            $item_description = $row_items['Description'];
            $item_cat = $row_items['Item_Category'];
            $item_subcat = $row_items['Item_Subcategory'];
            $item_date = $row_items['Date_Added'];
    if($item_remain < 1){
    
            echo "
                    <div class='col-md-4 col-sm-6 col-xs-6'>
								<div class='product product-single'>
									<div class='product-thumb'>
										
										
										<img width='50%' height='200px' src='$item_pic' alt=''>
									</div>
									<div class='product-body'>
										<h3 class='product-price'>Price: $$item_price</h3>
										<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
										<div class='product-btns'>
											<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
											<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
											<form action='product.php?item_id=$item_id' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-danger'><i class='fa fa-shopping-cart'></i> Out of Stock</button>
                </form>
										</div>
									</div>
								</div>
							</div>
                    
                ";}
            else {echo "
                    <div class='col-md-4 col-sm-6 col-xs-6'>
								<div class='product product-single'>
									<div class='product-thumb'>
								
										
										<img width='50%' height='200px' src='$item_pic' alt=''>
									</div>
									<div class='product-body'>
										<h3 class='product-price'>Price: $$item_price</h3>
										<h2 class='product-name'><a href='product.php?item_id=$item_id'>$item_name</a></h2>
										<div class='product-btns'>
											<button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
											<button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
											<form action='cart.php' method='post'>
                <input type='hidden' name='cart_pid' id='cart_pid' value='$item_id'/>
                <button type='submit' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</button>
                </form>
										</div>
									</div>
								</div>
							</div>
                    
                ";
                
            }
                
    }
}}
?>