<?php
session_start();
include 'dbconnection.php';
$sql="INSERT INTO orders (pids,total_price,uid) VALUES (:pi,:pr,:ui)";
$stmt = $conn-> prepare($sql);
$stmt-> execute(array(
':pi' => intval($_GET['id']),
':pr' => intval($_GET['tot']),
':ui' => $_SESSION['uid']
));
?>