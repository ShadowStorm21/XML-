<?php session_start();
	if( isset($_GET['info']) ) {
		
header("Access-Control-Allow-Origin: *");
try
		{   
			
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql1 = "SELECT uid FROM users ORDER BY regdate DESC";
			$result1 = mysqli_query($connection, $sql1) or die("Error in Selecting " . mysqli_error($connection));
			$row1 = mysqli_fetch_array($result1);
			$uid = $row1['uid'];
			$sql = "SELECT uname,email,contactno FROM users WHERE uid='$uid'";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			$row = mysqli_fetch_array($result);
			
			
			$uname = $row['uname'];
			$contactno = $row['contactno'];
			$email = $row['email'];
			$userData = [];
					array_push($userData,$uname,$email ,$contactno);
					echo json_encode($userData);
		
			mysqli_close($connection);
			
			

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
	}
	
	
		if( isset($_POST['update']) ) {
		
header("Access-Control-Allow-Origin: *");
try
		{   
			$contactno = $_POST['contactno'];
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql = "update users set contactno = '$contactno' where uid = '$uid'";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			
				
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
			else {
				$myObj->status="updated";
			}
			
			echo $json_encode($myObj);
			mysqli_close($connection);
			
			

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
	}
?>