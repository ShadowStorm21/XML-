<?php
session_start();
include 'dbconnection.php';
header("Access-Control-Allow-Origin: *");
$cpu = intval($_GET['cpu']);
$ram = intval($_GET['ram']);
$gpu = intval($_GET['gpu']);
$storage = intval($_GET['sto']);
if($cpu != 0.0 && $ram != 0.0 && $gpu != 0.0 && $storage != 0.0)
{
$pids = array("$cpu","$ram","$gpu","$storage");
$sql="INSERT INTO orders (pids,total_price,uid) VALUES (:pi,:pr,:ui)";
$stmt = $conn-> prepare($sql);
$stmt-> execute(array(
':pi' => json_encode($pids),
':pr' => intval($_GET['tot']),
':ui' => $_SESSION['uid']
));
unset($_SESSION['total_price']);
}
	
	
?>

