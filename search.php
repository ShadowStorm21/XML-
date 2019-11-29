<?php session_start(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script>
	function search_products(){
		$.ajax({
			type:"get",
			url : "cart_info.php",
			dataType:"json",
			data : {"PRODUCT_NAME": $("#product_text_field").val() },
			success : function(products){
				if(products.status == "Failed") {
					$("#title").html("<center> No Records Were Found for  <i><b>'"+ $('#product_text_field').val() +"' </i></b>  </center>");
					$("#subtitle").html("<p><h4><center><i><b>Try with Matching case</i></b></center></h4><p> ");
					$("#product_list").html("");
					$("#product_page").html("");
				}
				else {
					$("#title").html("<h2><center> " + products.length + " Records Found !</center></h2>");
					$("#subtitle").html("<p><h4><center>Our most purchased components by our customers.</center></h4><p> ");
		
				// generate pages number
				var n_pages = products.length;
				// number of products per page
				var n_p_p = 6;
				var cur_page = 0;
				var button_page = "<div id='btn_page'><center> Pages: ";
				for(index = 0; index < products.length/n_p_p; ++index)
					button_page += "<button class='w3-button w3-hover-cyan w3-circle' id='" + index + "'>" + (index + 1) + "</button>";
				button_page += "</center></div>";
				$("#product_page").html(button_page);

				display_products(0,products,n_p_p);

				var previous_btn = $('button[id=0]')
				previous_btn.attr("class","w3-button w3-circle w3-red");
				//$("#next_page_btn").html("<button class='btn btn-primary w3-animate-zoom w3-xlarge' id='"+cur_page+"'>NEXT</button>");
			
				$('#btn_page  button').click(function(){
					display_products( $(this).attr("id"), products,n_p_p);

					previous_btn.attr("class","w3-button w3-hover-cyan w3-circle");
					previous_btn = $(this);
					$(this).attr("class","w3-button w3-circle w3-red");

					$("button").click( function() {
						switch ($(this).attr("value")) {
							case 'buy': add_product(this,purchase);break;
							case 'add': exists(this);add_product(this); break; 
						default:;
					}

				} );

				});
				}
				$("button").click( function() {
					switch ($(this).attr("value")) {
						case 'buy': add_product(this,purchase); break;
						case 'add': exists(this); add_product(this); break; 
						default:;
					}

				} );

							
			},
			error : function(){ alert("Something went wrong when sending request for product name"); }

		});
	}

function exists(pid) {
	$.ajax({
			type:"post",
			url : "cart_session.php",
			data : {"PRODUCT_EXISTS":$(pid).attr("id")},
			success : function(n){ 
				if( n == true  )
					alert("This Product is Already in the Cart!");
			},
			error : function(){alert("Error in checking product availibility");}
		});	
	}

	function display_products(page,products,product_per_page) {
			product_table = "<div class='container'> ";
			for(start = page * product_per_page,end = start + product_per_page; start != end && start < products.length; ++start){
				product_table += " <div class='col-lg-4'> <div class='card-item'> <figure> <div class='overlay'><i class='ti-plus'></i></div>";
				product_table += "<img src='images/"+ products[start]['pid'] +".jpg' alt='Image' class='img-responsive'> </figure> <div class='text'>";
				product_table += "<h2>" + products[start]['pname'] + "</h2> <strong style='font-size:18px'>$" + products[start]['price'] + "";
				product_table += "</strong> <br> <p> " + products[start]['description'] + "</p>";
				product_table += "<button value='buy' id='" + products[start]['pid'] + "' class='btn btn-primary'> <a href='payment.php'>Purchase</a></button>";
				product_table += "<button value='add' id='" + products[start]['pid'] + "' class='btn btn-primary'>Add to cart</button> </div> </div> </div> "; 
				}
				product_table += "</div></div>";
			$("#product_list").html(product_table);
	}
	function add_product(pid,purchase_func = null){
		// store the cart in the session
		cart.push($(pid).attr("id"));
			$.ajax({
			type:"post",
			url : "cart_session.php",
			data: {"CART_INFO":cart},
			dataType : "json",
			success: function(session_cart){
				$("#_cart_number").html(session_cart.length + "<i class='material-icons' style='font-size:20px'>shopping_cart</i>");
				if(purchase_func != null)
					purchase_func();
			},
			error : function(){alert("error in sending cart inforamtion to the session");} });
		
	}
	function purchase() {
			$.ajax({
			type:"post",
			url : "purchase.php",
			success : function(data){ 
				if(data.status == "Failed")
					alert("failed");
				else
					$(location).attr('href','payment.php');	
			},
			error : function(){alert("Error in receiving data from session");}
		});
	}
	function READY() {
		cart = new Array();
		$.ajax({
			type:"get",
			url : "cart_session.php",
			data : "N",
			success : function(n){ $("#_cart_number").html(n + "<i class='material-icons' style='font-size:20px'>shopping_cart</i>");},
			error : function(){alert("Error in receiving data from session");}
		});
		$("#search_btn").click( search_products );
			}
	$(document).ready(READY);
</script>
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
	<link rel="stylesheet" href="css/style.css">



<body>

<!-- Navbar -->

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>

  
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>

    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>

	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-white"><i class="fa fa-search" style="font-size:30px"></i></a>

	<!-- Cart ------------------------------------------------------------------------------------------------- -->
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

    <input type="text" name="searched_product" id="product_text_field" placeholder="Search a product!" class="w3-padding-large w3-large w3-margin-top btn btn-primary"/>
    <input class="btn btn-primary btn-block" type="submit" id="search_btn" name="submit" value="Search"/>
 
</header>

<div class='section'> 
		     <div class='w3-margin-top'> 
		     	    <div class='text-center heading'> 
		     		    <h2 id="title"><center> We have Got everthing you Want </center></h2> 
		     		    <h4 id="subtitle"><center>Just type and HIT Search </center></h4> 
		     	    </div> 
		         </div>  

	<p id="product_page"> </p> 
	<p id="product_list"> </p> 
	<p id="next_page_btn"> </p> 
	<?php for($i = 0; $i < 20; $i++) echo "<br>"; ?>

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

