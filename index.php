<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>

<script>

	function send_to_cart(pid,purchase_func = null){
		exists(pid)
		$.ajax({
			type:"post",
			url : "cart_session.php",
			data: {"CART_INFO":Array($(pid).attr("id"))},
			dataType : "json",
			success: function(session_cart){
				$("#_cart_number").html(session_cart.length + "<i class='material-icons' style='font-size:20px'>shopping_cart</i>");
				if(purchase_func != null)
					purchase_func();
			},
			error : function(){alert("error in sending cart inforamtion to the session");} });	
	}
	function exists(pid) {
	$.ajax({
			type:"post",
			url : "cart_session.php",
			data : {"PRODUCT_EXISTS":$(pid).attr("id")},
			success : function(n){ 
			},
			error : function(){alert("Error in checking product availibility");}
		});	
	}
	function purchase() {
			$.ajax({
			type:"post",
			url : "purchase.php",
			success : function(data){ 
				if(data.status == "Failed"){
					alert("failed");
				}
				else
					$(location).attr('href','payment.php');	
			},
			error : function(){alert("Error in receiving data from session");}
		});
	}

	$(document).ready(function(){
	$.ajax({
			type:"get",
			url : "cart_session.php",
			data : "N",
			success : function(n){ $("#_cart_number").html(n + "<i class='material-icons' style='font-size:20px'>shopping_cart</i>");},
			error : function(){alert("Error in receiving data from session");}
		});
		$("button").click( function(){
			switch ($(this).attr("value")) {
						case 'buy': send_to_cart(this,purchase); break;
						case 'add': send_to_cart(this); break; 
						default:;
			}	
		});
	
	});
</script>


<?php
session_start();
include 'dbconnection.php';

?>

<html lang="en">
<title>PC Builder</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">



<body>

<!-- Navbar -->

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large w3-animate-zoom">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
	<!-- Cart -->
	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="_cart_number">0
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
  	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
	<?php if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
    <a href='changePassword.php' class='w3-bar-item w3-button'>Change Password</a>
    <a href='profile.php' class='w3-bar-item w3-button'>Update Profile</a>
    <a href='logout.php' class='w3-bar-item w3-button'>Logout</a>
  </div>

  </div>
</div>";} ?>
  </div>
</div>

<!-- Header -->
<div >
<header class="w3-container w3-red w3-center" style="padding:128px 16px">

  <h1 class="w3-margin w3-jumbo" >PC Builder</h1>
  
  <button class="w3-black w3-padding-large w3-large w3-margin-top btn btn-primary">Get Started</button>
 
</header>
</div>

<?php
	$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
	$sql = "select count(*) from product;";
	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
	$n_products = mysqli_fetch_row($result)[0];
	$upper = rand(7, $n_products);
	$lower = $upper - 7;

	$html ='	<div class="section">
		<div class="container">
			<div class="w3-margin-top">
				<div class="text-center heading">
					<h2><center>Most Popular Components</center></h2>
					<p><h4><center>Our most purchased components by our customers.</center></h4><p>
				</div>
			</div>
			<div >

			
			';

	for(;$lower != $upper; $lower++){
		$sql = "select * from product where pid = $lower;";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		$row = mysqli_fetch_row($result);
		$html .= '	<div class="col-lg-4" >
					<div class="card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/'.$row[0].'.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="text">
							<h2>'.$row[1].'</h2>
							
							<strong style="font-size:18px">$'.$row[2].'</strong>
							<p>'.$row[4].'</p>
								<button value=buy id='.$row[0].' class="btn btn-primary">Purchase</button>
							<a ><button value=add id='.$row[0].' class="btn btn-primary">Add to cart</button></a>
							
						</div>
					
					
					</div>
				</div>';
	}


	
	$html .= "</div> </div> </div>";
	echo $html;
	
?>



			
				
	

			
		

<!-- First Grid -->
<div class="w3-row-padding w3-padding-32 w3-container w3-red">
  <div class="w3-content">
    <div>
      <h1 class="w3-xxxlarge"><center>About us</center></h1>
      <h3 class="w3-padding-32"><center>The future of building your PC starts here.</center></h3>

      <p class="w3-text-white"><center>Built by experts from the ground up to power everything you need. our site provides a custom, turn-key solution for hassle-free PC gaming and Creative computer and multipropse computer. 
						Upgrade and tweak for max performance as much as you’d like: pay the same flat build fee.</center></p>
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
 <div>
 <p>Powered by <a class="copyright" href="https://www.hct.edu.om" target="_blank">Higher College of Technology</a></p>
 <small class="block">&copy; 2019 Higher College of Technology. All Rights Reserved.</small> 
 </div>
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
