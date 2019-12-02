<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>



<script>

	$(document).ready(function(){
		$("input").mouseenter(function(){
			$(this).attr("style","text-align:left;text-decoration:underline;text-decoration-color:black;");
		});
		$("input").mouseleave(function(){
			$(this).attr("style","text-align:left;");
		});
	});
</script>


<?php
session_start();

?>

<html lang="en">
<title>Forum</title>
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
  <div class="w3-bar w3-red w3-card w3-left-align w3-large w3-animate-zoom">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
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
  	<?php  if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>Login</a>";}?>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
	<?php if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
    <a href='../changePassword.php' class='w3-bar-item w3-button'>Change Password</a>
    <a href='../profile.php' class='w3-bar-item w3-button'>Update Profile</a>
    <a href='../logout.php' class='w3-bar-item w3-button'>Logout</a>
  </div>

  </div>
</div>";} ?>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
<div >
  <h1 class="w3-margin w3-jumbo" >Forum</h1>
</div>
</header>

			
	

<div class='section'> 
		     <div class='w3-margin-top'> 
		     	    <div class='text-center heading'> 
		     		    <h2 id="title"><center> The PC Builder community </center></h2> 
		     		    <h4 id="subtitle"><center>Participate and be part of it</center></h4> 
		     	    </div> 
		         </div>  

		<!-- forum goes here -->

		<?php 
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql = "select * from forum;";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));	
			$n = mysqli_num_rows($result);

			$table = "";
			$table .='<center><table class=table-style-two style="font-family:Times New Roman;"> <thead style="color:#800000;font-size:30px;">
						<tr ><th></th><th style="width:500px;text-align:left;"> forum </th> <th>Posts</th></tr> </thead>
						<tbody style="color:#8B0000;font-style:italic;font-size:25px;">
						';

			for($i = 0; $i < $n; $i++){
				$row = mysqli_fetch_assoc($result);
				$table .= "<tr>";
				$table .='<form method="post" action="posts.php?current_forum='.$row['forum_id'].'">';

				if($row['icon_path'] != null){
					$table .="<td><image src='images/$row[icon_path]' height=32 width=32/></td>";
				}
				else 
					$table .='<td></td>';


				$table .='<td  style="text-align:left;"><li><input class="w3-button" type="submit" value="'.$row['title'].'"</li>';
				$table .='<h6>'.$row['subtitle'].'</h6></td>';
				$total_posts = 0;
					if($row['posts_ids'] != null){
						$posts = json_decode($row['posts_ids']);
						foreach($posts as $post)
							$total_posts++; 
				}

				$table .='<td>'.$total_posts.'</td></tr>';
				$table .='</form>';
				$table .= "</tr>";
			}
			$table .= '</tbody> </center></table>';
			echo $table;
			
		?>


<?php for($i=0;$i<25;$i++) echo"<br>";?>

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
