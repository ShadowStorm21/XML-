<?php
session_start();


header("Access-Control-Allow-Origin: *");
try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$currpass = $_POST['curpass'];
			$newpass = $_POST['npass'];
			
			
			$sql = "select * from users where pass='$currpass'";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			$row = mysqli_fetch_array($result);
			if($currpass == $row['pass'])
			{
				
				$connection1 = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection1));
				$sql1 = "update users set pass = '$newpass' where pass = '$currpass'";
				$result1 = mysqli_query($connection1, $sql1) or die("Error in Selecting " . mysqli_error($connection1));
				
				echo 1;
			
			}
			else
			{
				echo 0;
			}
			
			
		mysqli_close($connection);
		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}


	
	
?>