<?php
session_start();

		
header("Access-Control-Allow-Origin: *");
try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$username = $_POST['username'];
			$email = $_POST['email'];
			$contactno = $_POST['contactno'];
			$pass = $_POST['pass'];
			$hashedpass = ($pass);
			
			$sql = "INSERT INTO users(uname,email,contactno,pass) VALUES ('$username','$email','$contactno','$hashedpass')";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
			else {
				$myObj->status="Created";
			}
			
			echo $json_encode($myObj);
			mysqli_close($connection);
			
			

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}


	
	
?>