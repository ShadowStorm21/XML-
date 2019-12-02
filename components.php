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
				if(n)
					alert("This product is already in your cart");
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
					$(location).attr('href','orderproduct.php');	
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
<a href="forum.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Forum</a>
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

				<!-- Begin -->

			<?php 
				// see how many unique values in tage
				$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
				$sql = "select tag from product group by tag;";
				$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
				$row = mysqli_fetch_all($result);	
				$total_tags = count($row);

				// choose three product from each category 
				for($i = 0; $i != $total_tags; $i++){ 
					$sql2 = "select * from product where tag = '".$row[$i][0]."' limit 3;";
					$result2 = mysqli_query($connection, $sql2) or die("Error in Selecting " . mysqli_error($connection));
					$row2 = mysqli_fetch_all($result2);

					$html = "";
					foreach($row2 as $prod){
						$html .= '<div class="col-lg-4" >
								<div class="card-item">
									<figure>
										<div class="overlay"><i class="ti-plus"></i></div>
										<img src="images/'.$prod[0].'.jpg" alt="Image" class="img-responsive">
									</figure>
										<div class="text">
										<h2>';
						// check if the title of the product is too long for item card
						if( strlen($prod[1]) > 25 ){
							$prod[1] = substr($prod[1],0,25);	
							$prod[1][22] = '.'; $prod[1][23] = '.'; $prod[1][24] = '.';
						}
						$html .= $prod[1];
						$html .='		</h2>
										<strong style="font-size:18px">$'.$prod[2].'</strong>
										<p>';
						// check if the description of the product is too long for item card
						if( strlen($prod[4]) > 75 ){
							$prod[4] = substr($prod[4],0,75);	
							$prod[4][72] = '.'; $prod[4][73] = '.'; $prod[4][74] = '.';
						}
						$html .= $prod[4];
						$html .='		</p>
										<button value=buy id='.$prod[0].' class="btn btn-primary">Purchase</button>
										<a >
											<button value=add id='.$prod[0].' class="btn btn-primary">Add to cart</button>
										</a>
								</div>
							</div>
						</div>';
				}
				echo $html;

			}


			?>

				<!-- End -->
				
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
