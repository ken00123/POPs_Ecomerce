<!DOCTYPE html>

  <?php
    include '../conection.php';
    include 'sessionAdmin.php';
    if(isset($_GET['editProduct']))
    {
      $get_id = $_GET['editProduct'];
      $get_product = "select * from pop_products where Item_Id =$get_id";

			$run_product = mysqli_query($con, $get_product);
      $row_product = mysqli_fetch_array($run_product);
      		
			$product_id = $row_product['Item_Id'];
      $item_name = $row_product['Item_Name'];
			$item_image = $row_product['Item_Image'];
			$amount_remaining = $row_product['Amount_Remaining'];
			$price = $row_product['Price'];
			$description = $row_product['Description'];
      $item_category = $row_product['Item_Category'];
			$item_subcategory = $row_product['Item_Subcategory'];
			$distributor_price =  $row_product['Distributor_price'];
      $date_added = $row_product['Date_Added'];
      $item_status = $row_product['Active'];
      

    }
    
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
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

<form action = "" method = "post" enctype="multipart/form-data">
  <div class="main">
    <h1>Edit Product</h1>
    <hr>
    
    <label for="name"><b>Item Name</b></label>
    <input type="text" value="<?php echo $item_name; ?>" name="name" id = "name" required>
  
    <label for="image"><b>Item Image</b></label>
    <input type="text" value="<?php echo $item_image; ?>" name="image" required>
    
    <label for="amount"><b>Item Amount</b></label>
    <input type="text" value="<?php echo $amount_remaining; ?>" name="amount" required>
    
    <label for="price"><b>Item Price</b></label>
    <input type="text" value="<?php echo $price; ?>" name="price" required>

    <label for="description"><b>Item Description</b></label>
    <input type="text" value="<?php echo $description; ?>" name="description" required>

    <label for="category"><b>Item Category</b></label>
    <input type="text" value="<?php echo $item_category; ?>" name="category" required>

    <label for="subcategory"><b>Item Subcategory</b></label>
    <input type="text" value="<?php echo $item_subcategory; ?>" name="subcategory" required>
    
    <label for="price"><b>Distributor Price</b></label>
    <input type="text" value="<?php echo $distributor_price; ?>" name="dis_price" required>
    
    <?php if($item_status)
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
    
    <button type="submit" class="registerbtn" name = "saveChanges" value = "saveChanges">Save Changes</button>
  </div>

  
</form>	
</body>
</html>
   
<?php
  if(isset($_POST['saveChanges']))
	{
		$product_name = $_POST['name'];
    $product_image = $_POST['image'];
		$product_amount = $_POST['amount'];
		$product_price = $_POST['price'];
		$product_description = $_POST['description'];
    $product_category = $_POST['category'];
		$product_subcategory = $_POST['subcategory'];
    $product_distributorPrice = $_POST['dis_price'];
    $product_status = $_POST['status'];

		$update_product = "update pop_products set Item_Name = '$product_name', Item_Image = '$product_image', Amount_Remaining = '$product_amount',
                       Price = '$product_price', Description = '$product_description', Item_Category = '$product_category', Item_Subcategory = '$product_subcategory',
                       Distributor_price = '$product_distributorPrice', Active = '$product_status'  where Item_Id = '$product_id'";

		  $run_update_product = mysqli_query($con, $update_product); 

    if($run_update_product)
    {
			echo "<script>alert('The item has been updated!')</script>";
			echo "<script>window.open('viewProducts.php','_self')</script>";
		}
	}
?>