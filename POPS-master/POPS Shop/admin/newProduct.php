<!DOCTYPE html>
<?php
include '../conection.php';
include 'sessionAdmin.php';
session_start();

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
.newProductbtn {
  background-color: #F8694A;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.newProductbtn:hover {
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

<form action = "newProduct.php" method = "post" enctype="multipart/form-data">
  <div class="main">
    <h1>New Product</h1>
    <p>Fill in new product information</p>
    <hr>
    
    <label for="item name"><b>Item Name</b></label>
    <input type="text" placeholder="Enter Item Name" name="name" required>
    
    <label for="item image"><b>Item Image</b></label><br>
    <input type="file" name="image"><br><br>
    
    <label for="item amount"><b>Item Amount</b></label>
    <input type="text" placeholder="Enter Item Amount" name="amount" required>
    
    <label for="item price"><b>Item Price</b></label>
    <input type="text" placeholder="Enter Item Price" name="price" required>

    <label for="item description"><b>Item Description</b></label>
    <input type="text" placeholder="Enter Item Description" name="description" required>

    <label for="price"><b>Distributor Price</b></label>
    <input type="text" placeholder="Enter Distributor Item Price" name="dis_price" required>
    
    <p><strong>Item Category</strong></p> <select name="subcategory">
    <optgroup label="Video Games">
    <option value="RPG">RPG</option>
    <option value="MOBA">MOBA</option>
    <option value="Shooter">Shooter</option>
    </optgroup>
    
    <optgroup label="Series">
    <option value="Heroes">Heroes</option>
    <option value="Animation">Animation</option>
    <option value="ScienceFiction">Science Fiction</option>
    </optgroup>

    <optgroup label="Sports">
    <option value="Baseball">Baseball</option>
    <option value="Basketball">Basketball</option>
    <option value="Wrestling">Wrestling</option>
    </optgroup> 
    <br>
    <input type="radio" name="status" value="1" checked> Active 
    <input type="radio" name="status" value="0"> Inactive<br>
    
    <button type="submit" class="newProductbtn" name = "addProduct" value = "addProduct">Add Product</button>
  </div>
  </form>
  
</body>
</html>

<?php
  $selected = $_POST['subcategory'];

  if ($selected == 'Baseball' || $selected == "Basketball" || $selected == "Wrestling")
  {
    $product_category = "Sports";
  }
  else if($selected == 'Heroes' || $selected == "Animation" || $selected == "ScienceFiction")
  {
   $product_category = "Series";
  }
  else if($selected == 'RPG' || $selected == "MOBA" || $selected == "Shooter")
  {
   $product_category = "Video Games";
  }

  if(isset($_POST['addProduct']))
	{    
		$uploads_dir = '/img';
    $product_name = $_POST['name'];
    $product_image = $_FILES["image"]["name"];
    $imagetmp = $_FILES['image']['tmp_name'];
		$product_amount = $_POST['amount'];
		$product_price = $_POST['price'];
		$product_description = $_POST['description'];
		$product_subcategory = $_POST['subcategory'];
    $product_distributorPrice = $_POST['dis_price'];
    $product_status = $_POST['status'];
    
    move_uploaded_file($imagetmp, "$uploads_dir/$product_image");
    
    $insert_product = "insert into pop_products (Item_Name,Item_Image,Amount_Remaining,Price,Description,Item_Category,Item_Subcategory,Active, Distributor_price) values ('$product_name','img/$product_image','$product_amount','$product_price','$product_description','$product_category','$product_subcategory','$product_status', '$product_distributorPrice')";
    
    $run_insert_product = mysqli_query($con, $insert_product); 
    
    if($run_insert_product)
    {
			echo "<script>alert('The item has been Added!')</script>";
			echo "<script>window.open('viewProducts.php','_self')</script>";
		}
    else 
    {
      echo "<script>alert('The item could not be added!')</script>";
			echo "<script>window.open('newProduct.php','_self')</script>";
    }
	}
?>