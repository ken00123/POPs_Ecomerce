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

.radio2 {
  margin: 0 5px 0 20px;
}

.nativeDatePicker1 {
  margin: 0 40px 0 40px;

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

<form action = "report.php" method = "post" enctype="multipart/form-data">
  <div class="main">
    <h1>Create Report</h1>
    <p>Please select the type of report you would like to create.</p>
    <hr>

    <input type="radio" name="report" value="allSales"> Report of total sales by day, week and month<br>
    <br>

    <input type="radio" name="report" value="allRevenue"> Report of total revenue by day, week and month<br>
    <br>
  
    <input type="radio" name="report" value="groupBySale"> Report of total sales grouped by product<br>
    <input class = "radio2" type="radio" name="date" value="daySale">  Day<br>
    <div class="nativeDatePicker1">
    <label for="daySale"></label>
    <input type="date" id="daySale" name="daySale">
    <span class="validity"></span>
    </div>
<br>
    <input class = "radio2" type="radio" name="date" value="weekSale"> Week<br>
    <div class="nativeDatePicker1">
    <label for="weekStartSale">start</label>
    <input type="date" id="weekStartSale" name="weekStartSale">
    <span class="validity"></span>
    </div>

    <div class="nativeDatePicker1">
    <label for="weekEndSale">end</label>
    <input type="date" id="weekEndSale" name="weekEndSale">
    <span class="validity"></span>
    </div><br>

    <input class = "radio2" type="radio" name="date" value="monthSale"> Month<br>
    <div class="nativeDatePicker1">
    <label for="monthSale"></label>
    <input type="month" id="monthSale" name="monthSale">
    <span class="validity"></span>
    <br><br>
    </div>

    <input type="radio" name="report" value="groupByRevenue"> Report of total revenue grouped by product<br>

    <input class = "radio2" type="radio" name="date" value="dayRevenue">  Day<br>
    <div class="nativeDatePicker1">
    <label for="dayRevenue"></label>
    <input type="date" id="dayRevenue" name="dayRevenue">
    <span class="validity"></span>
    </div>
<br>
    <input class = "radio2" type="radio" name="date" value="weekRevenue"> Week<br>
    <div class="nativeDatePicker1">
    <label for="weekStartRevenue">start</label>
    <input type="date" id="weekStartRevenue" name="weekStartRevenue">
    <span class= "validity"> </span>
    </div>

    <div class="nativeDatePicker1">
    <label for="weekEndRevenue">end</label>
    <input type="date" id="weekEndRevenue" name="weekEndRevenue">
    <span class="validity"></span>
    </div><br>

    <input class = "radio2" type="radio" name="date" value="monthRevenue">Month<br>
    <div class="nativeDatePicker1">
    <label for="monthRevenue"></label>
    <input type="month" id="monthRevenue" name="monthRevenue">
    <span class="validity"></span>
    <br><br>
    </div>
    
    <button type="submit" class="newProductbtn" name = "submit" value = "submit">Submit</button>
  </form>


 <?php
  
  if(isset($_POST['submit']))
	{ 
    include("report.php");
  }
 ?>
</body>
</html>