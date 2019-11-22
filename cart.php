<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<script >
	function display_product() {
			var total = 0;
				$.ajax({
				type:"GET",
				url:"cart_info.php",
				data: "GET_DATA",
				dataType: "json",
				success : function( products ) {
					var cart_icon = "<i class='material-icons' style='font-size:30px'>shopping_cart</i>";
					$("#_cart_number").html( (products.length == 0 || products == 0) ? 0 + cart_icon:products.length  + cart_icon);
					table = "<center><table>";
					table +="<tr > <th> N </th> <th>Image </th><th>Product Name</th> <th>Price</th> <th> Part Category </th> <th>  </th></tr> ";
					$(products).each(function(index,item){
						table += "<tr> <td> " + (index + 1)+" </td>  <td> <img src='images/" + item.pid + " ' height='64' width='64'/> </td> <td>" + item.pname + "</td> <td>$"+item.price + "</td> <td>"+ item.tag + "</td>";
						table += "<td><button id="+item.pid+"> Remove </button></td></tr>";
						total += Number(item.price);
					});
					if(total != 0.0){
						table += "<tr><td/><td/><td/>";
						table += "<td>Total: </td><td>$"+ total + "</td>";	
						table += "<td> <input type='button' id='_buy' value='BUY'/></td></tr>";
						table += "</center></table>";
					}
					else {
						table += "<tr><td  colspan='6'>-----------------------------------------------------------------------------------------------------------------------</td>";
						table += "</tr></center></table>";
					}
					$("#result").html(table);
	store_total(total);
					$("#_buy").click(function(){ $(location).attr('href', 'payment.php'); });
					$("button").click(function(){ remove($(this)); });

					},
				error : function() {alert("error");}
				});
						}
	function store_total(money) {
		$.ajax({
				type:"POST",
				url:"cart_info.php",
				data: { 'TOTAL' :money},
				success : function( msg ) { },
				error : function() {alert("error");}
				});	
	}
	function remove(object) {
		alert("called");
		$.ajax({
				type:"POST",
				url:"cart_info.php",
				data: { 'DEL_PROD' : $(object).attr("id")},
				success : function( msg ) { display_product(); },
				error : function() {alert("error");}
				});	
	}


	$(document).ready(display_product);

</script>


<?php session_start();
include 'dbconnection.php';
		$rows = [];
		if( isset($_SESSION['cart'])){
		foreach( $_SESSION['cart'] as $i => $pi ){
				$stmt = $conn-> query("SELECT * FROM product WHERE pid='$pi'");
				$stmt-> execute(); 
				$row = $stmt-> fetch(PDO::FETCH_ASSOC);
				$rows[$i] = $row;
			}
		$_SESSION['ROWS'] = array_values($rows);
		}
?>

<html lang="en">
<title>Search a product </title>
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
	<link rel="stylesheet" href="css/mstyles.css">



<body>

<!-- Navbar -->

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large ">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>

	<!-- Cart----------------------------------------------------------- -->

	<a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="_cart_number">0
		<i class="material-icons" style="font-size:30px">shopping_cart</i>
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
<div class=""></div>
  <h1 class="w3-margin w3-jumbo">Cart</h1>
  

 
</header>
	<br>

	<br><br>
	<p id="result"> </p>
	<?php for($i = 0;$i<20;$i++) echo "<br/>"; ?>

						
		

<!-- First Grid -->
<div class="w3-row-padding w3-padding-32 w3-container w3-red">
  <div class="w3-content">
    <div>
      <h1 class="w3-xxxlarge"><center>About us</center></h1>
      <h3 class="w3-padding-32"><center>The future of building your PC starts here.</center></h3>

      <p class="w3-text-white"><center>Built by experts from the ground up to power everything you need. our site provides a custom, turn-key solution for hassle-free PC gaming and Creative computer and multipropse computer. 
						Upgrade and tweak for max performance as much as you�d like: pay the same flat build fee.</center></p>
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



