<?php session_start();
	
	if(isset($_POST['CART_INFO'])) {
		if(isset($_SESSION['cart'])){
				echo json_encode(array_values($_SESSION['cart'] = array_unique(array_merge($_SESSION['cart'],$_POST['CART_INFO']))));
			}
		else { 
				echo json_encode(array_values($_SESSION['cart'] = array_unique($_POST['CART_INFO'])));
		}
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
