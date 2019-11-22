<?php session_start();
	if( isset($_POST['CART_INFO']) ){
		if(isset($_SESSION['cart'])){
			$_SESSION['cart'] = array_unique(array_merge($_SESSION['cart'],$_POST['CART_INFO']));
		}
		else
			$_SESSION['cart'] = array_unique($_POST['CART_INFO']);

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
		
	if( isset($_POST['PRODUCT_CHECK']) )
		if(isset($_SESSION['cart']) ){
				print in_array($_POST['PRODUCT_CHECK'],$_SESSION['cart']);
			}
		else
			echo 0;
			

	if( isset($_GET['GET_DATA']) ){
			if( isset($_SESSION['ROWS']) )
				echo json_encode($_SESSION['ROWS']);
			else {
				echo 0;
			}
	}
	if( isset($_GET['GET_N']) )
		if(isset($_SESSION['cart']))
			echo count($_SESSION['cart']);
		else 
			echo 0;

		
?>
