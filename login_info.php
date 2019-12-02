<?php 

session_start();

		
header("Access-Control-Allow-Origin: *");
try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			if(isset($_POST['email']) && isset($_POST['pass'])){
		
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$decryptpass = ($pass);
			
			
			
			$sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			$row = mysqli_fetch_array($result);
			if($email == $row['email'] && $pass ==$row['pass'])
			{
			
					echo 1;
	
			}			
			else
			{	
				
				echo 0;
				
				
				
			}
				
				
			
		
				
			mysqli_close($connection);
			}
			
			
			
			

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
	

   

?>