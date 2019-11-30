<?php
session_start();
include 'dbconnection.php';
header("Access-Control-Allow-Origin: *");
$cpu = intval($_GET['cpu']);
$ram = intval($_GET['ram']);
$gpu = intval($_GET['gpu']);
$storage = intval($_GET['sto']);
$pids = array("$cpu","$ram","$gpu","$storage");
$sql="INSERT INTO orders (pids,total_price,uid) VALUES (:pi,:pr,:ui)";
$stmt = $conn-> prepare($sql);
$stmt-> execute(array(
':pi' => json_encode($pids),
':pr' => intval($_GET['tot']),
':ui' => $_SESSION['uid']
));
unset($_SESSION['total']);
	
	
?>

