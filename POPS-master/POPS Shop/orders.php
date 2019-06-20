<!DOCTYPE html>
<?php
include 'conection.php';
session_start();

$user = $_SESSION['email'];

$get_cust = "select First_Name,Middle_Name,Last_Name,Email,Customer_ID from Customer where Email='$user'";

$run_cust = mysqli_query($con,$get_cust);

$row_cust = mysqli_fetch_array($run_cust);

$cust_id = $row_cust['Customer_ID'];
$cust_first = $row_cust['First_Name'];
$cust_middle = $row_cust['Middle_Name'];
$cust_last = $row_cust['Last_Name'];
$cust_email = $row_cust['Email'];


?>
<!DOCTYPE html>
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

<form action="/action_page.php">
  <div class="main">
    <h1>View Orders</h1>
    
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
    <a href="index.php">Go back to Home Page</a>
    <a href="Customer/manageAccount.php">Manage your Account</a>
  </div> 
    <?php
   $get_orders = "SELECT DISTINCT Order_Num,Customer_ID,Tracking_Num,Street_Name,Apt_Number,City,State,Zip,Status,Total FROM Orders NATURAL JOIN Payment_info Where Customer_ID='$cust_id'";
        
           
        $run_orders = mysqli_query($con, $get_orders);
    
        while($row_orders=mysqli_fetch_array($run_orders)){
    
            $order_num = $row_orders['Order_Num'];
            $tracking_num = $row_orders['Tracking_Num'];
            $order_street = $row_orders['Street_Name'];
            $order_apt = $row_orders['Apt_Number'];
            $order_city = $row_orders['City'];
            $order_state = $row_orders['State'];
            $order_zip = $row_orders['Zip'];
            $order_status = $row_orders['Status'];
            $order_total = $row_orders['Total'];
    
            echo"
<table>
  <tr>
    <td>Order #:$order_num<br>Tracking #:$tracking_num<br>Address : $order_street, $order_apt, $order_city, $order_state,$order_zip<br>Order Status: $order_status<br>Order Total: $$order_total</td>  </tr>
  <tr>
</table>";
           
                
    }
?>
</body>
</html>
 
    
    <hr>
    
    <!--button type="submit" class="submitbtn">Submit</button-->
  </div>
  
 
</form>

</body>
</html>