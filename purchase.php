<?php session_start();
header("Access-Control-Allow-Origin: *");
try
{   

 	$connection = mysqli_connect("localhost","root","","pc") or die("Error " . mysqli_error($connection));
    
    $total = 0;
	$myObj = new stdClass();
	foreach( $_SESSION['cart'] as $i => $pi ){
			$sql = "select price from product where pid=$pi";
			$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
	        $total += mysqli_fetch_assoc($result)['price'];
	    }
	$_SESSION['total'] = $total;
	echo $total;
	mysqli_close($connection);
}
catch(Exception $ex)
{

  die($ex->getMessage());
}

?>