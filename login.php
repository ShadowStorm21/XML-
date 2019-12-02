<?php session_start();
include 'dbconnection.php';

if (isset( $_SESSION['confirm'])){
$error =  $_SESSION['confirm'];
}

	if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['login'])){
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$sql = "SELECT * FROM users WHERE email = :em";
			$stmt = $conn-> prepare($sql);
			$stmt-> execute(array(
			':em' => $_POST['email']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$n = $stmt-> rowCount();
			
				if (($n == 1) && (decrypt($row['pass']) == $_POST['pass'])){
				
				
					$_SESSION['uid']= $row['uid'];
					$_SESSION['uname']= $row['uname'];
					$_SESSION['email']= $row['email'];
						
					header("Location:profile.php");
					return;
                 } else {$error = "Invalid Username / password";}
        }else {$error = "invalid Email Format used";}
    }
    if(empty($_POST['email']) && empty($_POST['pass']) && isset($_POST['login'])) {
      $error = "Username / Password required";
    }
   

?>

<html lang="en">
<title>PC Builder</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	


<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Login</a>
		<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
	<!-- Cart -->
	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="_cart">
	<?php 
		if( isset($_SESSION['cart']) ) 
			echo count($_SESSION['cart']);
		else
			echo "0";
	?>
	<i class="material-icons" style="font-size:20px">shopping_cart</i>
	
	
  </div>

  <!-- Navbar on small screens -->
 <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="pricing.php" class="w3-bar-item w3-button w3-padding-large">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-padding-large">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
<a href="forum.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Forum</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
  </div>
</div>

<!-- Header -->

<header class="w3-container w3-red w3-center" style="padding:128px 16px">

  <h1 class="w3-margin w3-jumbo">Login to Enjoy all of our services</h1>
   
 
</header>

<div class="w3-row-padding w3-padding-32 w3-center">
  <div class="w3-content form-group" style="margin-right:200px">
    
  <form method="post" style="width:50%">
 
  <div class="form-group w3-red">
    <i class="fa fa-envelope icon"></i>
    <input class="form-control" type="text" placeholder="Email" name="email" value="<?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];} ?>">
  </div>
  <div class="form-group w3-red">
    <i class="fa fa-key icon"></i>
    <input class="form-control" type="password" placeholder="Password" name="pass">
  </div>
  <div class="form-group">
	<div>
	<input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
	<div>
	<?php if(isset($error)){echo $error;} ?>
	</div>
	</div>
	</div>
 
  <div class="text-center w3-light-grey">
    <p>Don't have an account? <a href="signup.php" class="copyright" >Sign up</a>.</p>
  </div>
</form>
    </div>

</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center">  
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


	
</body>
</html>
