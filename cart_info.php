<?php session_start();
	if( isset($_GET['COMPON_DATA'])){
			// query the user for the component page 

				// see how many unique values in tage
				$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
				$sql = "select tag from product group by tag;";
				$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
				$row = mysqli_fetch_all($result);	
				$total_tags = count($row);

				$compo_data = [];

				for($i = 0; $i != $total_tags; $i++){ 
					$sql2 = "select * from product where tag = '".$row[$i][0]."' limit 3;";
					$result2 = mysqli_query($connection, $sql2) or die("Error in Selecting " . mysqli_error($connection));
					$row2 = mysqli_fetch_all($result2);
					foreach($row2 as $prod){
						if( strlen($prod[1]) > 25 ){
							$prod[1] = substr($prod[1],0,25);	
							$prod[1][22] = '.'; $prod[1][23] = '.'; $prod[1][24] = '.';
						}
						if( strlen($prod[4]) > 75 ){
							$prod[4] = substr($prod[4],0,75);	
							$prod[4][72] = '.'; $prod[4][73] = '.'; $prod[4][74] = '.';
						}
						array_push($compo_data,$prod);
					}
				}
				echo json_encode($compo_data);
	
	}
	if( isset($_GET['ORDER_PRODUCT_TOTAL']) ){
		if(isset($_SESSION['total']))
			echo $_SESSION['total'];
		else {
			echo 0;
		}
	}
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
