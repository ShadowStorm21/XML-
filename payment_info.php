<?php
session_start();
if( isset($_POST['paid'])){
		
header("Access-Control-Allow-Origin: *");
try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			if($_SESSION['total'] != 0.0)
			{
				$sql = "INSERT INTO payment(uid,oid,total_price) VALUES ($_SESSION[uid],$_SESSION[order_id],$_SESSION[total])";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
			else {
				$myObj->status="Paid";
			}
			
			echo $json_encode($myObj);
			mysqli_close($connection);
			}
			else
			{
			$sql = "INSERT INTO payment(uid,oid,total_price) VALUES ($_SESSION[uid],$_SESSION[order_id],$_SESSION[total_plans])";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
			else {
				$myObj->status="Paid";
			}
			
			echo $json_encode($myObj);
			mysqli_close($connection);
			}

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
}

	
	
?>


	
	