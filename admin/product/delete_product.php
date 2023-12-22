<?php
$prd_id = $_GET['prd_id'];
mysqli_query($connect, "DELETE FROM product WHERE prd_id = $prd_id");
header('location: index.php?pagelayout=product');
?>