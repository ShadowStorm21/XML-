<?php session_start();
include 'dbconnection.php';

    $n = null;
    if(isset($_GET['submit'])){
        $pname = $_GET['searched_product'];
    	$sql = "select * from product where pname like '%".$pname .'%\'';
    	$stmt = $conn->query($sql);
    	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$n = $stmt-> rowCount();
    }

?>

<html lang="en">
<title>Search a product </title>
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
	<link rel="stylesheet" href="css/mstyles.css">



<body>

<!-- Navbar -->

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-spin w3-padding-large w3-hover-white"><i class="material-icons" style="font-size:30px">shopping_cart</i></a>
	<?php if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
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

<header class="w3-container w3-red w3-center" style="padding:128px 16px">
<div class="overlay"></div>
  <h1 class="w3-margin w3-jumbo">Search products</h1>
  
  <!-- <button class="w3-black w3-padding-large w3-large w3-margin-top btn btn-primary">Get Started</button> -->

    <form method="get">
    <input type="text" name="searched_product" placeholder="Search a product!" class="w3-padding-large w3-large w3-margin-top btn btn-primary"/>
    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Search"/>
  </form>
 
</header>

    <?php 

        // if the user did not yet search
        if(!isset($_GET['searched_product'])) {
                echo" <div class='section'>";
		    echo" <div class='container'>";
		    echo"<div class='w3-margin-top'>";
		    echo"	    <div class='text-center heading'>";
		    echo"		    <h2><center> We have Got everthing you Want </center></h2>";
		    echo"		    <p><h4><center>Just type and HIT Search </center></h4><p>";
		    echo"	    </div>";
		    echo"    </div>"; 
            return;
        }
        
        $no_products = false;
        if( $n == 0)
            $no_products = true;

        echo" <div class='section'>";
		echo" <div class='container'>";
		echo"<div class='w3-margin-top'>";
		echo"	    <div class='text-center heading'>";
              if($no_products ){
		        echo"<h2><center> No Records Were Found for <i><b>'$_GET[searched_product]' </i></b> </center></h2>";
		        echo"<p><h4><center><i><b>Try with Matching case</i></b></center></h4><p>";
                    for($i = 0; $i < 10; $i += 1) echo "<br>";
                }
              else {
		echo"		    <h2><center> $n Records Found !</center></h2>";
		echo"		    <p><h4><center>Our most purchased components by our customers.</center></h4><p>";
                    }   
		echo"	    </div>";
		echo"    </div>";

  	 

        // display products
        foreach($rows as $row ) {
            echo"  	<div class='col-lg-4'>";
			echo"   <div class='card-item'>";
			echo"   	<figure>";
			echo"   		<div class='overlay'><i class='ti-plus'></i></div>";
			echo"   		<img src='images/$row[pid].jpg' alt='Image' class='img-responsive'>";
			echo"   	</figure>";
			echo"   	<div class='text'>";
			echo"   		<h2>$row[pname]</h2>";

                            //  description might be added later

			echo"   		<strong style='font-size:18px'>$$row[price]</strong><br>";
			echo"   		<p>$row[description]</p>";
			echo"   		 <button class='btn btn-primary'><a href='payment.php'>Purchase</a></button>";
			echo"   		 <button class='btn btn-primary'><a href='cart.php'>Add to cart</a></button>";
			echo"   	</div>";
			echo"   </div>";
			echo"   </div>";

        }
		echo"    </div >";
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
 </div>
 <div>
 <p>Powered by <a class="copyright" href="https://www.hct.edu.om" target="_blank">Higher College of Technology</a></p>
 <small class="block">&copy; 2019 Higher College of Technology. All Rights Reserved.</small> 
 </div>
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
