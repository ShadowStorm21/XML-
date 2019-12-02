<?php session_start();
	
	if( isset($_POST['PAID_ORDER'])){
			//user paid and ordered and coming  from ordereproduct.php
		header("Access-Control-Allow-Origin: *");
		try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql = "INSERT INTO orders(uid,pids,total_price) VALUES ($_SESSION[uid],'" .json_encode($_SESSION['cart']) ."',$_SESSION[total])";
			$sql2 = "select oid from orders where uid = $_SESSION[uid] ORDER by ordate desc LIMIT 1;";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
				$myObj->status="ordered";
				$result2 = mysqli_query($connection, $sql2) or die("Error in Selecting " . mysqli_error($connection));
				$result2 = mysqli_fetch_assoc($result2);
				$sql3 = "INSERT INTO payment(uid,oid,total_price) VALUES($_SESSION[uid],$result2[oid],$_SESSION[total]);";
				$result2 = mysqli_query($connection, $sql3) or die("Error in Selecting " . mysqli_error($connection));
			
			// unset cart
			unset($_SESSION['cart'],$_SESSION['ROWS'],$_SESSION['total']);
			echo json_encode($myObj);
			mysqli_close($connection);
			return;
		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}

	}
	if(isset($_GET['ORDER_VIEW'])){
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql = "select * from orders where uid = $_SESSION[uid]";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			$result = mysqli_fetch_all($result);
			echo json_encode($result);
	}
	if( isset($_POST['ORDER'])){
			header("Access-Control-Allow-Origin: *");
		try
		{   
			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			$sql = "INSERT INTO orders(uid,pids,total_price) VALUES ($_SESSION[uid],'" .json_encode($_SESSION['cart']) ."',$_SESSION[total])";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			$myObj = new stdClass();
			if( !$result )
			{
				$myObj->status="Failed";
			}
			else {
				$myObj->status="ordered";
			}
			
			// unset cart
			unset($_SESSION['cart'],$_SESSION['ROWS'],$_SESSION['total']);
			echo json_encode($myObj);
			mysqli_close($connection);

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
	}
	if( isset($_POST['order_id']) ) {
		$_SESSION['order_id'] = $_POST['order_id'];
	}
	
?>
