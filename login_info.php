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
			
			
			
			$sql = "SELECT count(*) as currentUser FROM users WHERE email = '$email' AND pass = '$pass'";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			$row = mysqli_fetch_array($result);

			$count = $row['currentUser'];

			if($count > 0)
			{
				
					echo 1;
				
					
					
			}			
			else
			{	
				
				echo 0;
				$notlogged = 0;
				echo $name;
				
			}
				
				
			}
		
			
			mysqli_close($connection);
			}
			
			
			
			

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
	

   

?>