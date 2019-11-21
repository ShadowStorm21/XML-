<?php session_start();
	if( isset($_POST['CART_INFO']) ){
		if(isset($_SESSION['cart'])){
			$_SESSION['cart'] = array_unique(array_merge($_SESSION['cart'],$_POST['CART_INFO']));
		}
		else
		$_SESSION['cart'] = array_unique($_POST['CART_INFO']);
	}
	
		
?>