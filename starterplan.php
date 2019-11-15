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
	<link rel="stylesheet" href="css/mstyles.css">



<body>

<!-- Navbar -->

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large ">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="pricing.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Pricing</a>
    <a href="components.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Components</a>
    <a href="signup.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact us</a>
	<a href="search.php" class="w3-bar-item w3-button w3-hide-small w3-spin w3-padding-large w3-hover-white"><i class="fa fa-search" style="font-size:30px"></i></a>
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
    <a href="signup.php" class="w3-bar-item w3-button w3-padding-large">Sign up</a>
	<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
	<a href="contactus.php" class="w3-bar-item w3-button w3-padding-large">Contact us</a>
  </div>
</div>




	
<div class="w3-row-padding w3-padding-32 w3-center">
  <div class="w3-content form-group">
    <div>
		<div class="text-center heading w3-margin w3-padding-64">
		<h2><center>Starter Plan<center></h2>
					
		</div>
			</div>
  <form method="post">
<div class="row form-group">
<div class="col-md-12">
<label for="CPU">Choose your CPU</label>
<select name="#" id="cpu" class="form-control">
<option value="" disabled selected>CPU</option>
<option value="Toyota">Intel Pentium Gold G5400</option>		
<option value="Lexus">AMD Ryzen 3 3200G</option>
<option value="BMW">AMD Athlon 220GE </option>
<option value="Mercedes">Intel Core i3-9100F</option>
</select>
</div>
</div>

<div class="row form-group">
<div class="col-md-12">
<label for="RAM">Choose your RAM amount</label>
<select name="#" id="ram" class="form-control">
<option value="" disabled selected>RAM</option>
<option value="Toyota">4GB DDR4</option>		
<option value="Lexus">8GB DDR4</option>

</select>
</div>
</div>

<div class="row form-group">
<div class="col-md-12">
<label for="CPU">Choose your GPU</label>
<select name="#" id="gpu" class="form-control">
<option value="" disabled selected>GPU</option>
<option value="Toyota">No GPU</option>
<option value="Toyota">Radeon RX 550 4GB GDDR5</option>
<option value="Lexus">Radeon RX 560 4GB GDDR5</option>
<option value="BMW">Radeon RX 570 4GB GDDR5</option>
<option value="Mercedes">GeForce GTX 1650 4GB</option>
</select>
</div>
</div>

<div class="row form-group">
<div class="col-md-12">
<label for="CPU">Choose your Storage options</label>
<select name="#" id="storage" class="form-control">
<option value="" disabled selected>Storage</option>
<option value="Toyota">1TB Internal Hard Drive HDD</option>
<option value="Lexus">Samsung SSD 860 EVO 128GB SATA III Internal SSD</option>
<option value="BMW">1TB HDD + Samsung SSD 860 EVO 128GB</option>
</select>
</div>
</div>

  <div class="form-group">
	<div>
	<input type="submit" class="btn btn-primary btn-block" name="purchase" value="Purchase" ></input>
	</div>
	</div>
  </div>
		
			</form>
    </div>
 
</div>


<div>

<div class="w3-container w3-center">
<h2>More Information About the Products</h2>
<p>Press On the button to find out more information on how to select your product.</p>
<table>
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-margin">CPU</button>
<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black w3-margin">RAM</button>
<button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black w3-margin">GPU</button>
<button onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-black w3-margin">STORAGE</button>
</table>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-red"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-red w3-xlarge w3-display-topright">&times;</span>
   <h2>Centeral Processing Unit</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openInfoCpu(event, 'G5400')">Intel Pentium Gold G5400</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoCpu(event, '3200G')">AMD Ryzen 3 3200G</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoCpu(event, '220GE')">AMD Athlon 220GE</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoCpu(event, '9100F')">Intel Core i3-9100F</button>
  </div>

  <div id="G5400" class="w3-container parts">
   <h1>Intel Pentium Gold G5400</h1>
   <p> Pentium Gold Dual-core G5400 3.7GHz Desktop Processor Package Type: Retail Product Line: Pentium Processor Socket: Socket H4 LGA-1151 Brand Name: Intel Product Series: Gold Processor Socket: Socket H4 LGA-1151 Brand Name: Intel L3 Cache: 4 MB L2 Cache: 512 KB L3 Cache: 4 MB Width: 1.5 Depth: 1.5 Processor Core: Dual-core (2 Core) Thermal Design Power: 58 W Processor Manufacturer: Intel Graphics Controller Manufacturer: Intel Graphics Controller Model: UHD Graphics 610 Product Family.</p>
  </div>

  <div id="3200G" class="w3-container parts">
   <h1>AMD Ryzen 3 3200G</h1>
   <p>Can deliver smooth high definition performance in the world's most popular games
4 processing cores, bundled with the Quiet AMD Wraith Stealth cooler
4.0 GHz Max Boost, unlocked for overclocking, 6 MB Cache, ddr 2933 support
For the advanced socket AM4 platform. Base Clock 3.6GHz.</p>
  </div>

  <div id="220GE" class="w3-container parts">
   <h1>AMD Athlon 220GE</h1>
   <p>AMD Athlon delivers responsive, reliable computing for everyday users
Includes Radeon Vega 3 Graphics for smooth videos and gaming
2 Cores / 4 Processing Threads, includes near silent cooler
3.2 GHz Clock Frequency, 5MB cache, DDR4 2667 support
Socket AM4, platform upgradable to Ryzen.</p><br>
  </div>
  
  <div id="9100F" class="w3-container parts">
   <h1>Intel Core i3-9100F</h1>
   <p>4 Cores /4 Threads
Up to 4.2 GHz
Discrete graphics required
Compatible with Intel 300 Series chipset based motherboards
Bios update may be required for motherboard compatibility.</p><br>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>
<!--CPU ENDS-->

<div id="id02" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-red"> 
   <span onclick="document.getElementById('id02').style.display='none'" 
   class="w3-button w3-red w3-xlarge w3-display-topright">&times;</span>
   <h2>Random Access Memory</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openInfoRam(event, 'G4')">G.SKILL 4GB Ripjaws V Series DDR4</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoRam(event, 'G8')">G.SKILL 8GB Ripjaws V Series DDR4</button>

  </div>

  <div id="G4" class="w3-container parts">
   <h1>G.SKILL 4GB Ripjaws V Series DDR4</h1>
   <p>Capacity 8GB (1 x 4GB) Type 288-Pin DDR4 SDRAM Speed DDR4 2400 (PC4-19200) Cas Latency 15 Timing 15-15-15-35 Voltage 1.2V ECC No.</p>
  </div>

  <div id="G8" class="w3-container parts">
   <h1>G.SKILL 8GB Ripjaws V Series DDR4</h1>
   <p>Capacity 8GB (2 x 4GB) Type 288-Pin DDR4 SDRAM Speed DDR4 2400 (PC4-19200) Cas Latency 15 Timing 15-15-15-35 Voltage 1.2V ECC No.</p>
  </div>



  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id02').style.display='none'">Close</button>
  </div>
 </div>
</div>

<!-- RAM ENDS-->
<div id="id03" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-red"> 
   <span onclick="document.getElementById('id03').style.display='none'" 
   class="w3-button w3-red w3-xlarge w3-display-topright">&times;</span>
   <h2>Graphical Processing Unit</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openInfoGpu(event, 'nogpu')">No GPU</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoGpu(event, 'RX550')">AMD Radeon RX 550 4GB GDDR5</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoGpu(event, 'RX560')">AMD Radeon RX 560 4GB GDDR5</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoGpu(event, 'RX570')">AMD Radeon RX 570 4GB GDDR5</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoGpu(event, 'GTX1650')">Nvidia GeForce GTX 1650 4GB</button>
  </div>

  <div id="nogpu" class="w3-container parts">
   <h1>No GPU</h1>
   <p>Uses the internal GPU that comes with CPU insted of an external GPU</p>
  </div>

  <div id="RX550" class="w3-container parts">
   <h1>AMD Radeon RX 550 4GB GDDR5</h1>
   <p>Experience the latest premium technologies optimized around the revolutionary FinFET 14 technology that provides extraordinary performance and efficiency. Enjoy cool and quiet gaming, and leverage new possibilities with optimized levels of efficient headroom. Imagine the future upgrade capabilities with HDMI 2.0b and Display Port 1.3/1.4 features that can enable the latest generation of displays to deliver beautiful beyond-HD, HDR, and ultra-smooth FreeSync experiences. Microsoft Windows 10 Support. FinFET 14nm Technology. GCN 4th Generation Architecture. AMD Virtual Super Resolution (VSR). AMD LiquidVR Technology. AMD FreeSync Technology. AMD Frame Rate Target Control (FRTC). AMD Eyefinity multi-display technology. AMD App Acceleration. AMD TrueAudio Technology. AMD XConnect Ready. AMD Radeon Crimson Software.</p>
  </div>

  <div id="RX560" class="w3-container parts">
   <h1>AMD Radeon RX 560 4GB GDDR5</h1>
   <p>Optimized for the most popular resolution on the market, the Radeon RX 560 graphics card powers through the latest AAA titles in 1080p. Featuring 4th generation GCN architecture, the Radeon RX 560 graphics card provides exceptional DirectX12 and Vulkan experiences with native asynchronous shader support.</p><br>
  </div>
  
  <div id="RX570" class="w3-container parts">
   <h1>AMD Radeon RX 570 4GB GDDR5</h1>
   <p>Whether you're new to PC gaming or you're looking to push your existing rig forward, The AMD Radeon RX 570 has everything that a modern Gamer needs. Featuring a range of high performance cards to match your budget and so that you can game The way that you want to without breaking the bank, comes with the performance parts you need for an excellent gaming experience at a price you can afford.</p><br>
  </div>
  
    <div id="GTX1650" class="w3-container parts">
   <h1>Nvidia GeForce GTX 1650 4GB</h1>
   <p>Powered by NVIDIA Turing with 896 CUDA cores and overclocked 4GB GDDR5 memory
Supports up-to 3 monitors with HDMI 2.0B, DisplayPort 1.4, and DVI-D ports.</p><br>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id03').style.display='none'">Close</button>
  </div>
 </div>
</div>

<!--GPU ENDS-->

<div id="id04" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-red"> 
   <span onclick="document.getElementById('id04').style.display='none'" 
   class="w3-button w3-red w3-xlarge w3-display-topright">&times;</span>
   <h2>Storage</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openInfoStr(event, '1tb')">WD 1TB Internal Hard Drive HDD</button>
   <button class="tablink w3-bar-item w3-button" onclick="openInfoStr(event, 'ssd')">Samsung SSD 860 EVO 128GB SATA III Internal SSD</button>
	<button class="tablink w3-bar-item w3-button" onclick="openInfoStr(event, 'sdd_hdd')">1TB HDD + Samsung SSD 860 EVO 128GB</button>
  </div>

  <div id="1tb" class="w3-container parts">
   <h1>Western Digital 1TB Internal Hard Drive HDD</h1>
   <p>Western Digital WD 1TB 3.5-inch PC hard drives deliver solid reliability for office and web applications, and they are perfect for extra storage for desktop PC computing.</p>
  </div>

  <div id="ssd" class="w3-container parts">
   <h1>Samsung SSD 860 EVO 128GB SATA III Internal SSD</h1>
   <p>Powered by Samsung V-NAND Technology, the 860 EVO SSD offers optimized performance for everyday computing as well as rendering large-sized 4K videos and 3D data used by the latest applications,Sequential read and write performance levels of up to 550MB/s and 520MB/s, respectively, Protect data by selecting security options, including AES 256-bit hardware-based encryption compliant with TCG Opal and IEEE 1667.</p>
  </div>
  
  <div id="sdd_hdd" class="w3-container parts">
   <h1>1TB HDD + Samsung SSD 860 EVO 128GB</h1>
   <p>A combination of Western Digital 1TB Internal Hard Drive HDD and Samsung SSD 860 EVO 128GB SATA III Internal SSD.</p>
  </div>


  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id02').style.display='none'">Close</button>
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
 <div>
 <p>Powered by <a class="copyright" href="https://www.hct.edu.om" target="_blank">Higher College of Technology</a></p>
 <small class="block">&copy; 2019 Higher College of Technology. All Rights Reserved.</small> 
 </div>
</footer>
<script>
document.getElementsByClassName("tablink")[0].click();

function openInfoCpu(evt, partName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("parts");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(partName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}

function openInfoRam(evt, partName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("parts");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(partName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}

function openInfoGpu(evt, partName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("parts");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(partName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
function openInfoStr(evt, partName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("parts");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(partName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
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