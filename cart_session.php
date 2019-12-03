<?php session_start();
	
	if(isset($_POST['CART_INFO'])) {
		if(isset($_SESSION['cart'])){
				echo json_encode(array_values($_SESSION['cart'] = array_unique(array_merge($_SESSION['cart'],$_POST['CART_INFO']))));
			}
		else { 
				echo json_encode(array_values($_SESSION['cart'] = array_unique($_POST['CART_INFO'])));
		}
	}
	else if ( isset($_GET['INDEX_DATA']) ) {
		$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
		$sql = "select count(*) from product;";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		$n_products = mysqli_fetch_row($result)[0];
		$upper = rand(8, $n_products);
		$lower = $upper - 7;
		$data = [];
			for(;$lower != $upper; $lower++){
				$sql = "select * from product where pid = $lower;";
				$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
				$row = mysqli_fetch_row($result);
				
				if( strlen($row[1]) > 25 ){
							$row[1] = substr($row[1],0,25);	
							$row[1][22] = '.'; $row[1][23] = '.'; $row[1][24] = '.';
						}
				if( strlen($row[4]) > 74 ){
							$row[4] = substr($row[4],0,74);	
							$row[4][71] = '.'; $row[4][72] = '.'; $row[4][73] = '.';
					}
					array_push($data,$row);
			}
			echo json_encode($data);
	}
	else if (isset($_POST['ROWS'])) {
		include 'dbconnection.php';
		$rows = [];
		if( isset($_SESSION['cart'])){
		foreach( $_SESSION['cart'] as $i => $pi ){
				$stmt = $conn-> query("SELECT * FROM product WHERE pid='$pi'");
				$stmt-> execute(); 
				$row = $stmt-> fetch(PDO::FETCH_ASSOC);
				$rows[$i] = $row;
			}
		$_SESSION['ROWS'] = array_values($rows);
		}
	}
	else if( isset($_POST['PRODUCT_EXISTS']) && isset($_SESSION['cart']) ) {
		if(in_array( $_POST['PRODUCT_EXISTS'] , $_SESSION['cart'] ) == true)
			echo true;
		else
			echo false;
	}
	else {
		if(isset($_GET['N']) && isset($_SESSION['cart']))
			echo count($_SESSION['cart']);
		else
			echo 0;
	}
?>
