<?php session_start();
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
			echo $json_encode($myObj);
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
