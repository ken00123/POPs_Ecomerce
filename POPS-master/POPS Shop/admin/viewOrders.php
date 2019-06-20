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
</style>
</head>
<body>

<form action=""method = post>
  <div class="main">
    <h1>View/Edit Orders</h1>
    
    <!DOCTYPE html>
<html>
<head>
<style>
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

    
    
  <table>
                        
                        
	<?php
	$get_order = "SELECT DISTINCT Order_Num,Customer_ID,Tracking_Num,Street_Name,Order_Date,Total_Pops,Payment_Type,Apt_Number,City,State,Zip,Status,Total,Order_Date FROM Orders NATURAL JOIN Payment_info ORDER BY Order_Date DESC";

	$run_order = mysqli_query($con, $get_order);
                        
	while($row_order = mysqli_fetch_array($run_order))
    {
        $order_id = $row_order['Order_Num'];
        $payment_Type = $row_order['Payment_Type'];	
        $order_street = $row_order['Street_Name'];
        $order_apt = $row_order['Apt_Number'];
        $order_city = $row_order['City'];
        $order_state = $row_order['State'];
        $order_zip = $row_order['Zip'];
        $item_Quantity = $row_order['Total_Pops'];
        $tracking_Num = $row_order['Tracking_Num'];
        $order_Date = $row_order['Order_Date'];
        $order_Status = $row_order['Status'];
        $order_Total = $row_order['Total'];
        	                                
        echo"
			<table class='table table-hover'style='width:1000px;'>
				 <tr>
					<td>Order Number: $order_id
                    <br>Item Quantity: $item_Quantity
                    <br>Payment Type: $payment_Type
                    <br>Address : $order_street, $order_apt, $order_city, $order_state,$order_zip
                    <br>Tracking Number: #$tracking_Num
                            ";
    ?>
    <a href="editOrder.php?editOrder=<?php echo $order_id;?>"><button type="button"style="float: right;" id = $order_id name = editOrder>Edit</button></a>
                        <?php
                        echo"                            
                        <br>Order Date: $order_Date
                        <br>Order Status: $order_Status
                        <br>Order Total: $$order_Total
                            </td>	
                            </tr> ";
             }
                            ?>
                            
						            

                        <?php
                        if(isset($_GET['editOrder']))
                        {
                            include("editOrder.php");
                        }
                        ?>
						


				
					</table>

</body>
</html>
 
    
  </div>
  
 
</form>

</body>
</html>