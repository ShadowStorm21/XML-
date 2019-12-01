<?php
session_start();
include 'dbconnection.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script >

	function field_warn(warning_str,color = "red"){
		$("#pay_warn").text(warning_str);
		$("#pay_warn").attr("style","color:" + color);			
	}	

	$(document).ready(function(){
		field_warn("All fields required!");
		$("#order").click( function(){
				if( check_name() && check_cart_number() && check_cvv() && check_address())
					$.ajax({
						type:"post",
						url :"order_info.php",
						data: "PAID_ORDER",
						success : function(data){
							if(data.status == "Failed")
								alert("Failed to order!");
							else{
								alert("Congratulations!,Your order has been sent");
								$(location).attr('href', 'orders.php');
							}
						},
						error : function(){alert("Error in sending order information!");}
					});
		});	
		// 
		function check_name(){
			if(!/^[a-zA-Z]+$/.test($("#ch").val())){	
				field_warn("Name should contain only characters and no space/numbers nor special characters");
				return false;
			}
			else if($("#ch").val().length < 4){
				field_warn("Name should at least have 3 characters!");
				return false;
			}
			else{
				field_warn("GOOD","green");
				return true;
				}
		}
		function check_cart_number(){
				if($("#cardnumber").val().length != 16){
					field_warn("Credit Cart Number Should be 16 Number!");
					return false;
				}
				else {
					field_warn("GOOD","green");
					return true;
				}	
		}
		function check_cvv(){
			if($("#cvv").val().length != 3){
				field_warn("CVV number Should be 3!");
				return false;
			}
			else {
				field_warn("GOOD","green");
				return true;
			}	
		}
		function check_address(){
			if($("#ba").val().length < 5 || $("#city").val().length < 5){
				field_warn("Billing-Address/City should at least contain 5 characters");
				return false;
			}
			else {
				field_warn("GOOD","green");
				return true;
			}	
		}
		$("#ch").keyup( check_name);
		$("#cardnumber").keyup(check_cart_number);
		$("#cvv").keyup(check_cvv);
		$("#ba").keyup(check_address);
		$("#city").keyup(check_address);
	});
</script>



<html lang="en">
<title>Order</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
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
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large ">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
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

  <h1 class="w3-margin w3-jumbo">Order Product(s)</h1>
 
  <i class="fa fa-credit-card-alt" style="font-size:72px;color:white"></i>
  

 
</header>



<?php 
if(!isset($_SESSION['uname']) && !isset($_SESSION['uid'])) {
		    echo"	    <div class='text-center heading'>";
		    echo"		    <h2><center> Please, "."<a href='login.php' style='background-color:red'>Sign in</a>"."First to pay! </center></h2>";
		    echo"	    </div>";
		   
            return;
  }
  ?>

 
	<!-- payment -->
<div class="w3-content w3-center">
  <div class="form-group">
    
  <div class="heading">
  <h2>Payment Information</h2>
  </div>
  <div class="form-group w3-red ">
    <i class="material-icons" style="font-size:20px;color:white">account_box</i>
    <input class="form-control " type="text" placeholder="Card Holder" id="ch" value="<?php echo $_SESSION['uname'];?>">
  </div>

  <div class="form-group w3-red">
     <i class="material-icons" style="font-size:20px;color:white">payment</i>
    <input class="form-control" type="Number" maxlength="16" minlength="16" placeholder="Card Number" id="cardnumber">
  </div>
  <div class="form-group w3-red">
     <i class="fa fa-key icon"></i>
    <input class="form-control" type="number" placeholder="CVV" id="cvv">
  </div>
  
  <div class="form-group w3-red">
   <i class="material-icons" style="font-size:20px;color:white">place</i>
    <input class="form-control" type="text" placeholder="Billing Address" id="ba">
  </div>
  <div class="form-group w3-red">
    <i class="material-icons" style="font-size:20px;color:white">location_city</i>
    <input class="form-control" type="text" placeholder="City" id="city">
  </div>
	<p> <li id="pay_warn" style=""> All fields required! </li> </p>


 <?php 
	
        if(!isset($_SESSION['uname']) && !isset($_SESSION['uid'])) {
               
		   
		    echo"	    <div class='text-center heading'>";
		    echo"		    <h2><center> Please, "."<a href='login.php' style='background-color:red'>Sign in</a>"."First to pay! </center></h2>";
		    echo"	    </div>";
		   
            return;
        }
      
		   
		    echo"	    <div class='text-center heading'>";
			if(isset($_SESSION['total']))
			{
				
		    echo"		    <h2><center> Total payment : $$_SESSION[total]</center></h2>";
			}
			else
			{
				 echo"		    <h2><center> Total payment : $$_SESSION[total_plans]</center></h2>";
			}
		    echo"		    <p><h4><center><button id='order' class='btn-1'> ORDER NOW </button></center></h4><p>";
		    echo"	    </div>";
		
	?>



	<?php for($i = 0; $i < 20; $i++) echo "<br>";?>

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


</body>
</html>
