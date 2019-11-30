<?php session_start();
	if( isset($_POST['DEL_PROD']) ){
		$key = array_search($_POST['DEL_PROD'], $_SESSION['cart']);
		if ( $key !== false) {
			unset($_SESSION['cart'][$key]);
			unset($_SESSION['ROWS'][$key]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
			$_SESSION['ROWS'] = array_values($_SESSION['ROWS']);
		}					
	}	
	if( isset($_POST['TOTAL']) )
		$_SESSION['total'] = $_POST['TOTAL'];

	if( isset($_GET['GET_DATA']) ){
			if( isset($_SESSION['ROWS']) )
				echo json_encode($_SESSION['ROWS']);
			else {
				echo 0;
			}
	}
	if(isset($_GET['PRODUCT_NAME'])) {
			header("Access-Control-Allow-Origin: *");
		try
		{   

			$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
			 
			
			$pname;
			$sql;
			$pname = $_GET['PRODUCT_NAME'];
			$sql = "select * from product where pname like '%".$pname .'%\'';
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		
			if(mysqli_num_rows($result) == 0){
				$sql = "select * from product where description like '%".$pname .'%\' or tag like'.'\''.$pname .'\'';
				$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
			}
		
			
			$userData = array();
			$myObj = new stdClass();

			if(mysqli_num_rows($result) )
			{
				while($row =mysqli_fetch_assoc($result))
				{
						array_push($userData,$row);
				}
				echo json_encode($userData);
			}
			else
			{
				$myObj->status="Failed";
				echo json_encode($myObj);
			}

			mysqli_close($connection);

		}
		catch(Exception $ex)
		{

		  die($ex->getMessage());
		}
			}
?>
