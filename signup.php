<?php session_start();
include 'dbconnection.php';
if(isset($_POST['username']) && isset($_POST['contactno']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['register'])){
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$sql="INSERT INTO users (uname,contactno, email, pass) VALUES (:un,:co,:em,:pa)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array(
		':un' => $_POST['username'],
		':co' => $_POST['contactno'],
		':em' => $_POST['email'],
		':pa' => encrypt($_POST['pass'])));
		$_SESSION['email']=$_POST['email'];
		header("Location:index.php");
	}
	else {$error = "Invalid Email Format Used";}
}


if(empty($_POST['uname']) && empty($_POST['contactno']) && empty($_POST['email']) && empty($_POST['pass']) && empty($_POST['cpass']) && isset($_POST['register'])){

$error = "All Fields required";}

?>
<html lang="en">
<title>PC Builder</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/mstyles.css">
<style>

/* Style the form icons */
.icon {
  padding: 5px;
  
  color: white;
  min-width: 5px;
  
}

</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-spin w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-spin w3-padding-large w3-hover-white"><i class="material-icons" style="font-size:30px">shopping_cart</i></a>
	
  </div>

  <!-- Navbar on small screens -->
 <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="pricing.php" class="w3-bar-item w3-button w3-padding-large">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-padding-large">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Join us today and Enjoy all of our services</h1>
  
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-32 w3-center">
  <div class="w3-content form-group" style="margin-right:205px">
    
  <form method="post" style="width:50%">
  <h2>Registration</h2>
  <div class="form-group w3-red  ">
    <i class="fa fa-user icon"></i>
    <input class="form-control " type="text" placeholder="Username" name="username" >
  </div>

  <div class="form-group w3-red">
    <i class="fa fa-envelope icon"></i>
    <input class="form-control" type="text" placeholder="Email" name="email">
  </div>
  <div class="form-group w3-red">
    <i class="fa fa-envelope icon"></i>
    <input class="form-control" type="number" placeholder="Phone Number" name="contactno">
  </div>

  <div class="form-group w3-red">
    <i class="fa fa-key icon"></i>
    <input class="form-control" type="password" placeholder="Password" name="pass">
  </div>
  <div class="form-group w3-red">
    <i class="fa fa-key icon"></i>
    <input class="form-control" type="password" placeholder="Confirm Password" name="cpass">
  </div>
  <div class="form-group">
	<div>
	<input type="submit" class="btn btn-primary btn-block" name="register" value="Join Now!" ><?php if(isset($error)){echo $error;} ?></input>
	</div>
	</div>
 
  <div class="text-center w3-light-grey">
    <p>Already have an account? <a href="signup.php" class="copyright" >Sign in</a>.</p>
  </div>
</form>
    </div>
 
</div>



<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <p>Powered by <a class="copyright" href="https://www.hct.edu.om" target="_blank">Higher College of Technology</a></p>
 <small class="block">&copy; 2019 Higher College of Technology. All Rights Reserved.</small> 
</footer>

<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>

<script src="js/main.js"></script>

</body>
</html>
