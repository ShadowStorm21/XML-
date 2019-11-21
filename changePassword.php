
<?php session_start();
include 'dbconnection.php'; 
if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){
 
$uid = $_SESSION['uid'];


echo "<!DOCTYPE html>";
echo "<html>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "<head>";
echo "<title>Change Password</title>";
echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>"; 
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'>"; 
echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>"; 
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>"; 
echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>";
echo "<link rel='stylesheet' href='css/bootstrap.css'>"; 
echo "<link rel='stylesheet' href='css/mstyles.css'>";  
echo "</head>";
echo "<body>";
echo "<div class='w3-top'>";
echo "<div class='w3-bar w3-red w3-card w3-left-align w3-large'>";
echo "<a class='w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red'><i class='fa fa-bars'></i></a>";
echo "<a href='index.php' class='w3-bar-item w3-button w3-padding-large w3-hover-white'>Home</a>";
echo "<a href='pricing.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Pricing</a>";
echo "<a href='components.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Components</a>";
 if(!isset($_SESSION['uid'])) {echo "<a href='signup.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Sign up</a>
	<a href='login.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Login</a>";}
echo "<a href='contactus.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'>Contact us</a>";
echo "<a href='search.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white'><i class='fa fa-search' style='font-size:30px'></i></a>";
echo "<a href='cart.php' class='w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white' id='_cart'>";

	
	
		if( isset($_SESSION['cart']) ) 
			echo count($_SESSION['cart']);
		else
			echo "0";

	echo "<i class='material-icons' style='font-size:30px'>shopping_cart</i>";
	echo "</a>";

if(isset($_SESSION['uname']) && isset($_SESSION['uid'])){echo "<div class='w3-dropdown-hover w3-right w3-bar-item w3-padding-large w3-hover-white'><i class='material-icons' style='font-size:30px'>person</i>
  <div class='w3-dropdown-content w3-animate-zoom w3-border' style='right:0'>
    <a href='changePassword.php' class='w3-bar-item w3-button'>Change Password</a>
    <a href='profile.php' class='w3-bar-item w3-button'>Update Profile</a>
<a href='logout.php' class='w3-bar-item w3-button'>Logout</a>  </div></div></div>";} 
 echo "</div>";
 echo "<div id='navDemo' class='w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large'>";

echo "<a href='pricing.php' class='w3-bar-item w3-button w3-padding-large'>Pricing</a>";
echo "<a href='components.php' class='w3-bar-item w3-button w3-padding-large'>Components</a>";
echo "<a href='signup.php' class='w3-bar-item w3-button w3-padding-large'>Sign up</a>";
echo "<a href='login.php' class='w3-bar-item w3-button w3-padding-large'>Login</a>";
echo "<a href='contactus.php' class='w3-bar-item w3-button w3-padding-large'>Contact us</a>";
 
  echo "</div>";
  
  echo "</div>";
  
echo "<header class='w3-container w3-red w3-center' style='padding:128px 16px'>";
echo "<h1 class='w3-margin w3-jumbo'>Change Your Password</h1>";
echo "</header>";
echo "<div class='w3-row-padding w3-padding-32 w3-center'>";
echo "<div class='w3-content form-group'>";
echo "<form method='POST'>";


echo "<div class='form-group w3-red'>";
echo "<i class='fa fa-key icon' style='font-size:30px'></i>";
echo "<input class='form-control' type='text' placeholder='Current Password' name='currentpass'> </div>";


echo "<div class='form-group w3-red'>";
echo "<i class='fa fa-key icon' style='font-size:30px'></i>";
echo "<input class='form-control' type='text' placeholder='New Password' name='pass'> </div>";

echo "<div class='form-group w3-red'>";
echo "<i class='fa fa-key icon' style='font-size:30px'></i>";
echo "<input class='form-control' type='text' placeholder='Confirm New Password' name='cpass'> </div>";

echo "<div class='form-group'>";
echo "<input type='submit' class='btn btn-primary btn-block' name='change' value='Change Password'></input>";
	
echo "</div>";
echo "</form>";
if (isset($_POST['currentpass']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['change'])){
		
		$currentpass = $_POST['currentpass'];
		$newpass = $_POST['pass'];
		$confirmpass = $_POST['cpass'];



		$stmt = $conn->query("select * from users where uid='$uid'");
		$stmt-> execute(); 
		$row = $stmt-> fetch(PDO::FETCH_ASSOC);
		$n = $stmt-> rowCount();

			
				if ($n == 1){
					$storedpass = decrypt($row['pass']);
					
					
						if($storedpass == $currentpass){
						
							if($newpass == $confirmpass){
							
								
								
								$sql = "update users set pass = :np where uid = '$uid'";
								
								$stmt1 = $conn-> prepare($sql);
								$stmt1-> execute(array(
								':np' => encrypt($_POST['pass'])));

								header("Location:index.php");
							return;}
							else { echo "new password does not match with confirm password";}
         				}
		 				else {echo "<p>current password is wrong</p>";}
				} else {echo "<p>'Current / New / Confirm password all required</p>";}
	}
}
else {header("Location:index.php");}
echo "<footer class='w3-container w3-padding-64 w3-center w3-opacity'>";
echo "<div class='w3-xlarge w3-padding-32'>";
echo "<i class='fa fa-facebook-official w3-hover-opacity'></i>";
echo "<i class='fa fa-instagram w3-hover-opacity'></i>";
echo "<i class='fa fa-snapchat w3-hover-opacity'></i>";
echo "<i class='fa fa-pinterest-p w3-hover-opacity'></i>";
echo "<i class='fa fa-twitter w3-hover-opacity'></i>";
echo "<i class='fa fa-linkedin w3-hover-opacity'></i>";
echo "</div>";
echo "<p>Powered by <a class='copyright' href='https://www.hct.edu.om' target='_blank'>Higher College of Technology</a></p>";
echo "<small class='block'>&copy; 2019 Higher College of Technology. All Rights Reserved.</small> ";
echo "</footer>";
echo "</body>";
echo "</html>";
	
?>
