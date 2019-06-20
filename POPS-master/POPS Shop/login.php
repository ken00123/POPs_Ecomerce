<!DOCTYPE html>
<?php
include 'conection.php';
session_start();

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #F8694A;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #F8694A;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}
</style>
</head>
    
<body>
<div class="header-logo">
						<a class="logo" href="index.php">
				        <img style="width: 50px" src="./img/Pop-logo.png" alt="">
						</a>
					</div>
<center><div class="container">
  <form method="post" action="">
    <div class="row">

    
        <div class="hide-md-lg">
          <p>Sign In!</p>
        </div>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <center><input type="submit" name="login" value="login"></center>
       <!--<input type="submit" value="Login"> -->
      
      
    </div>
  </form>
</div></center>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="Signup.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="forgot_pass.php" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>
<?php
if(isset($_POST['login'])){

	$c_email = $_POST['email'];
	$c_pass = $_POST['password'];


	$get_cust = "select * from Customer where Email='$c_email' AND Password='$c_pass' AND Active='1'";

	$run_cust = mysqli_query($con, $get_cust);

	$check_cust = mysqli_num_rows($run_cust);

	if($check_cust==0){
		echo "<script>alert('Password or email is incorrect!')</script>";
		exit();
	}
	else{
		$_SESSION['email']=$c_email;

		echo "<script>alert('Log-in successful!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}


}
?>
