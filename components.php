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
	<link rel="stylesheet" href="css/mstyles.css">

	
<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Components</a>
<?php session_start();  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
		<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
	<!-- Cart -->
	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="_cart">
	<?php 
		if( isset($_SESSION['cart']) ) 
			echo count($_SESSION['cart']);
		else
			echo "0";
	?>
	<i class="material-icons" style="font-size:30px">shopping_cart</i>
			
	</a>
				<?php if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
    <a href='changePassword.php' class='w3-bar-item w3-button'>Change Password</a>
    <a href='profile.php' class='w3-bar-item w3-button'>Update Profile</a>
    <a href='logout.php' class='w3-bar-item w3-button'>Logout</a>
  </div>

  </div>
</div>";} ?>
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

  <h1 class="w3-margin w3-jumbo">All Components</h1>
  
 
 
</header>


	
	
<div class="section">
		<div class="container">
			<div class="row">
				<div class="heading">
					<h2><center>Our finest Collection of hardware Components</center></h2>
					<p><h3><center>The best Prices you can find for our Components</center></h3></p>
				</div>
			</div>
			<div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Intel i9 9900k</h2>
							<strong style="font-size:18px">$150</strong>
							<p>high-end CPU with 8 cores for elite gamers</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>NVIDIA® GeForce® RTX 2080TI</h2>
							<strong style="font-size:18px">$1100</strong>
							<p>The world’s most advanced GPU architecture for gamers and creators.</p>
						 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Ryzen™ 9 3900X</h2>
							<strong style="font-size:18px">$499</strong>
							<p>The world's most advanced processor with 12 cores for the world's elite gamers.</p>
								 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_4.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Samsung SSD 970 PRO 512GB-NVMe</h2>
							<strong style="font-size:18px">$150</strong>
							<p>Ideal for tech enthusiasts,high-end gamers,and 4K & 3D content designers</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_5.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Ryzen™ 5 3600</h2>
							<strong style="font-size:18px">$199</strong>
							<p>The world's most advanced processor with 6 Cores for everyday tasks</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_6.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>The NVIDIA® GeForce® RTX 2060 SUPER</h2>
							<strong style="font-size:18px">$399</strong>
							<p>Mid tier GPU architecture for gamers for a decent price.</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Redaon 5700XT</h2>
							<strong style="font-size:18px">$400</strong>
							<p>mmmm</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Core i7 9700k</h2>
							<strong style="font-size:18px">$370</strong>
							<p>mmmmm</p>
						 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>G.SKILL 32GB RAM</h2>
							<strong style="font-size:18px">$140</strong>
							<p>mmmm</p>
						 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_4.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Razor Mechanical Keyboard</h2>
							<strong style="font-size:18px">$95</strong>
							<p>MMMMM</p>
							 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_5.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Steelseries Gaming Mouse</h2>
							<strong style="font-size:18px">$69</strong>
							<p>MMMM</p>
						 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/img_6.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Corsair Gaming Headset</h2>
							<strong style="font-size:18px">$110</strong>
							<p>mmmmmm</p>
						 <button class="btn btn-primary"><a href="payment.php">Purchase</a></button>
							 <button class="btn btn-primary"><a href="cart.php">Add to cart</a></button>
						</div>
					</div>
				</div>

			</div>
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