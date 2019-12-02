<?php session_start();
	if( isset($_GET['IS_LOGGED']) ) {
		$myObject = new stdClass();	
		if( !isset($_SESSION['uid']) && !isset($_SESSION['uname']) ){
			$myObject->status = "not_logged";
			echo json_encode($myObject);
			return;
		}
		$userData = [];
		array_push($userData,$_SESSION['uid'],$_SESSION['uname']);
		echo json_encode($userData);
	}
?>
