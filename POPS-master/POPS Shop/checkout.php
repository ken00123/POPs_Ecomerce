<?php
include 'conection.php';
session_start();

?>
<?php 

///////////////////////////////
// VERIFY PURHCASE QUANTITY //
/////////////////////////////
foreach ($_SESSION["cart_array"] as $each_item)
{
	$error_output = "";
	$cart_items = $each_item['quantity'];
	$item_id = $each_item["item_id"];

	$get_qty = "select Item_Name,Amount_Remaining from pop_products where Item_ID='$item_id'";
    $run_qty = mysqli_query($con,$get_qty);
	$row_qty = mysqli_fetch_array($run_qty);
	
	$item_table_qty = $row_qty["Amount_Remaining"];
	$item_name = $row_qty["Item_Name"];

	 if (($cart_items > $item_table_qty) and $item_table_qty > 0){
		echo "<script>alert('The amount of pops in the order is not available. Please adjust the quantity of $item_name, which has $item_table_qty pops left')</script>";
		echo "<script>window.open('../cart.php','_self')</script>";
	}

}


//////////////////////////////
/// CUSTOMER SESSION INFO ///
////////////////////////////

$user = $_SESSION['email'];

$get_cust = "select First_Name,Middle_Name,Last_Name,Email,Customer_ID, Street_Name,Apt_Number,City,State,Zip,Address_Type from Customer where Email='$user'";

$run_cust = mysqli_query($con,$get_cust);

$row_cust = mysqli_fetch_array($run_cust);

$cust_id = $row_cust['Customer_ID'];

$cust_first = $row_cust['First_Name'];
$cust_init = $row_cust['Middle_Name'];
$cust_last = $row_cust['Last_Name'];
$cust_email = $row_cust['Email'];




//////////////////////////////
///// CART SESSION INFO /////
////////////////////////////
$total_items = 0;
$cart_items = 0;
foreach ($_SESSION["cart_array"] as $each_item)
{
	$cart_items = $each_item['quantity'];
	$total_items = $total_items + $cart_items;
}
$cart_qty = $total_items;
                

$cust_email = $_SESSION['email'];
$get_cust = "select Customer_ID from Customer where Email='$cust_email'";
$run_cust = mysqli_query($con, $get_cust);
$row_cust = mysqli_fetch_array($run_cust);
$cust_id = $row_cust['Customer_ID'];
///////////////////////////
////Order Information/////
/////////////////////////

$cart_total = 0;
$qty_total = 0;
$order_num = rand(11111111,9999999);
$track_num =  rand(1111111111,getrandmax());
$payment_type = $_POST['payment_type'];
$paypal_mail = $_POST['email'];
$cc_number = $_POST['cc_num'];
$cvv = $_POST['Cvv'];
$cust_street = $_POST['streetname'];
$cust_apt = $_POST['apt'];
$cust_city =  $_POST['city'];
$cust_state = $_POST['state'];
$cust_zip = $_POST['zip'];

foreach($_SESSION["cart_array"]as $each_item) {
    $item_id = $each_item["item_id"];
    $get_item = "select * from pop_products where Item_ID='$item_id'";
    $run_item = mysqli_query($con,$get_item);
    

    while($row_item=mysqli_fetch_array($run_item)){
        $item_name = $row_item['Item_Name'];
        $item_price = $row_item['Price'];
    }
    
    
    
    $total_price = $item_price * $each_item['quantity'];
    $cart_total = $total_price + $cart_total;
    $qty_item = $each_item['quantity'];
    $qty_total += $qty_item;
    
    $insert_data = "insert into Order_Data (Order_Num,Item_ID,Item_Quantity,Price_per_Pop)   values('$order_num','$item_id','$qty_item','$item_price')";
    
    
    $run_insert_data = mysqli_query ($con, $insert_data);
    
}
 $insert_order = "insert into Orders (Order_Num,Customer_ID,Street_Name,Apt_Number,City,State,Zip,Tracking_Num,Status)   values('$order_num','$cust_id','$cust_street','$cust_apt','$cust_city','$cust_state','$cust_zip','$track_num','Processing')";
    
    
$run_insert_order = mysqli_query ($con, $insert_order);
                
    if($run_insert_order){
					echo "<script>alert('Your order has been successfully made, Thanks!')</script>";
					echo "<script>window.open('recibo.php?Order_num=$order_num','_self')</script>";
				}

$cart_total = $cart_total + ($cart_total * .115);
$insert_payment = "insert into Payment_info (Order_Num,Payment_Type,Total,Total_Pops)   values('$order_num','$payment_type','$cart_total','$qty_total')";
$run_insert_payment = mysqli_query ($con, $insert_payment);
           $cart_total = 0;
                                    foreach ($_SESSION["cart_array"] as $each_item) {
                                        $item_id = $each_item["item_id"];
                                        $get_item = "select * from pop_products where Item_ID='$item_id'";
                                        $run_item = mysqli_query($con,$get_item);
                
                                        while($row_item=mysqli_fetch_array($run_item)){
                                            $item_name = $row_item['Item_Name'];
                                            $item_price = $row_item['Price'];
                
                                        }
                                        $total_price = $item_price * $each_item['quantity'];
                                        $cart_total = $total_price + $cart_total;
                                        $qty_item = $each_item['quantity'];   
                                    
                                        echo "<tr>
                                        <td class='col-md-9'><em> $item_name</em></h4></td>
                                        <td class='col-md-1' style='text-align: center'> $qty_item </td>
                                        <td class='col-md-1 text-center'>$item_price</td>
                                        <td class='col-md-1 text-center'>$total_price</td>
                                        </tr>";

                                        $get_qty = "select Amount_Remaining from pop_products where Item_ID='$item_id'";
                                        $run_qty = mysqli_query($con,$get_qty);
                                        $row_qty = mysqli_fetch_array($run_qty);

                                        // echo $row_qty;

                                        $prev_qty = $row_qty["Amount_Remaining"];
                                        //echo $prev_qty;

                                        $updated_qty = $prev_qty - $qty_item;
                                        //echo $updated_qty;

                                        $cap_update =  "update pop_products set Amount_Remaining = '$updated_qty' where Item_ID = '$item_id'";
                                        $run_cap_update = mysqli_query($con,$cap_update);
                                    }
                                        ?>