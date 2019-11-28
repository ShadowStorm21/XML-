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
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
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

  <h1 class="w3-margin w3-jumbo">Plans for Everyone</h1>
  
 
 
</header>

<div class="section border-bottom">
		<div class="container">
			<div>
				<div class="text-center heading w3-margin w3-padding-64">
					<h2><center>Choose The Best Plan For You<center></h2>
					
				</div>
			</div>
			<div>
				<div>
					<div class="price-box">
						<h2 class="pricing-plan">Starter</h2>
						<div class="price"><sup class="currency">$</sup>499<small></small></div>
						<p>Basic plan for everyday tasks</p>
						<hr>
						<ul class="pricing-info">
						<li>CPU : up to Core i3/ Ryzen 3</li>
							<li>RAM : up to 8 GB</li>
							<li>GPU : up to GTX 1650 </li>
							<li>SDD : up to Samsung SSD 128GB</li>
						</ul>
						<a href="starterplan.php" class="btn btn-default">Get started</a>
					</div>
				</div>
				<div>
					<div class="price-box popular">
					<div class="popular-text">Elite</div>
						<h2 class="pricing-plan">Regular</h2>
						<div class="price"><sup class="currency">$</sup>999+<small></small></div>
						<p>The best plan for elite gamers</p>
						<hr>
						<ul class="pricing-info">
							<li>CPU : up to Core i5/ Ryzen 5</li>
							<li>RAM : up to 16 GB</li>
							<li>GPU : up to RTX 2060 SUPER</li>
							<li>SDD : up Samsung SSD 500GB</li>
						</ul>
						<a href="regularplan.php" class="btn btn-primary">Get started</a>
					</div>
				</div>
				<div>
					<div class="price-box">
						
						<h2 class="pricing-plan">Plus</h2>
						<div class="price"><sup class="currency">$</sup>1500+<small></small></div>
						<p>The best plan for creators and proffisonals</p>
						<hr>
						<ul class="pricing-info">
							<li>CPU : up to Core i7 or Core i9/ Ryzen 7 or Ryzen 9</li>
							<li>RAM : up to 64 GB</li>
							<li>GPU : up to RTX Titan</li>
							<li>SDD : up to Samsung NVME SSD 2TB</li>
						</ul>
						<a href="plusplan.php" class="btn btn-default">Get started</a>
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