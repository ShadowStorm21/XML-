
<?php

include 'dbconnection.php';
$q = intval($_GET['q']);
$stmt = $conn-> query("SELECT price FROM product WHERE pid = '".$q."'");
$stmt-> execute(); 
$row = $stmt-> fetch(PDO::FETCH_ASSOC);
$price = $row['price'];

echo $price ;



?>
</body>
</html>