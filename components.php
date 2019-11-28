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

	
<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">

<body>

<!-- Navbar -->
<div class="w3-top ">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
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
	<i class="material-icons" style="font-size:20px">shopping_cart</i>
			
	</a>
			<?php if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
    <a href='orders.php' class='w3-bar-item w3-button'>Orders</a>
    <a href='changePassword.php' class='w3-bar-item w3-button'>Change Password</a>
    <a href='profile.php' class='w3-bar-item w3-button'>Update Profile</a>
    <a href='logout.php' class='w3-bar-item w3-button'>Logout</a>
  </div>

  </div>
</div>";} ?><!-- Change it later-->
  </div>

  <!-- Navbar on small screens -->
 <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large w3-animate-zoom">
    <a href="pricing.php" class="w3-bar-item w3-button w3-padding-large">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-padding-large">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
  </div>
</div>

<!-- Header -->

<header class="w3-container w3-red w3-center " style="padding:128px 16px ">

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
							<img src="images/1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Intel i9 9900k</h2>
							<strong style="font-size:18px">$150</strong>
							<p>high-end CPU with 8 cores for elite gamers</p>
						<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>NVIDIA® GeForce® RTX 2080TI</h2>
							<strong style="font-size:18px">$1100</strong>
							<p>The world’s most advanced GPU architecture for gamers and creators.</p>
						<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Ryzen™ 9 3900X</h2>
							<strong style="font-size:18px">$499</strong>
							<p>The world's most advanced processor with 12 cores for the world's elite gamers.</p>
								 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/4.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Samsung SSD 970 PRO 512GB-NVMe</h2>
							<strong style="font-size:18px">$150</strong>
							<p>Ideal for tech enthusiasts,high-end gamers,and 4K & 3D content designers</p>
							 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/5.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Ryzen™ 5 3600</h2>
							<strong style="font-size:18px">$199</strong>
							<p>The world's most advanced processor with 6 Cores for everyday tasks</p>
							<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/27.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>The NVIDIA® GeForce® RTX 2060 SUPER</h2>
							<strong style="font-size:18px">$399</strong>
							<p>Mid tier GPU architecture for gamers for a decent price.</p>
							<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/29.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AMD Redaon 5700XT</h2>
							<strong style="font-size:18px">$429</strong>
							<p>mmmm</p>
							<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/17.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Core i7 9700k</h2>
							<strong style="font-size:18px">$370</strong>
							<p>mmmmm</p>
						 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/16.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>G.SKILL 32GB RAM</h2>
							<strong style="font-size:18px">$300</strong>
							<p>mmmm</p>
						<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>


				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/40.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Corsair Mechanical Keyboard</h2>
							<strong style="font-size:18px">$129</strong>
							<p>MMMMM</p>
							 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/42.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Corsair Gaming Mouse</h2>
							<strong style="font-size:18px">$77.85</strong>
							<p>MMMM</p>
						 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/41.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Corsair Gaming Headset</h2>
							<strong style="font-size:18px">$90</strong>
							<p>mmmmmm</p>
						<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>
				<!--New-->
				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/6.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>AeroCool Cylon RGB Mid Tower Black case</h2>
							<strong style="font-size:18px">$129</strong>
							<p>MMMMM</p>
							 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/7.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>EVGA 750 GQ 80+ GOLD 750W</h2>
							<strong style="font-size:18px">$77.85</strong>
							<p>MMMM</p>
						 <a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/35.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>Samsung SSD 970 EVO plus 2TB</h2>
							<strong style="font-size:18px">$399</strong>
							<p>mmmmmm</p>
						<a href="payment.php"><button class="btn btn-primary w3-animate-zoom">Purchase</button></a>
							<a href="cart.php"><button class="btn btn-primary w3-animate-zoom">Add to cart</button></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="container w3-center w3-padding-64">
	<a href="components1.php"><button class="btn btn-primary w3-animate-zoom w3-xlarge">Next</button></a>
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
		<div class="w3-container w3-padding-64 w3-right">
		<button  class="btn btn-primary" onclick="scrollToTop(1000);"><i class="icon-arrow-up" style="font-size:30px; color:white;"></i></button>
	</div>
 </div>
  <p>Powered by <a class="copyright" href="https://www.hct.edu.om" target="_blank">Higher College of Technology</a></p>
 <small class="block">&copy; 2019 Higher College of Technology. All Rights Reserved.</small> 
</footer>
<!--Function to scroll to top with animation-->
	<script>
function scrollToTop(scrollDuration) {
    var cosParameter = window.scrollY / 2,
        scrollCount = 0,
        oldTimestamp = performance.now();
    function step (newTimestamp) {
        scrollCount += Math.PI / (scrollDuration / (newTimestamp - oldTimestamp));
        if (scrollCount >= Math.PI) window.scrollTo(0, 0);
        if (window.scrollY === 0) return;
        window.scrollTo(0, Math.round(cosParameter + cosParameter * Math.cos(scrollCount)));
        oldTimestamp = newTimestamp;
        window.requestAnimationFrame(step);
    }
    window.requestAnimationFrame(step);
}
	</script>

	
</body>
</html>