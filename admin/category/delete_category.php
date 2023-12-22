<?php
$cat_id = $_GET['cat_id'];
mysqli_query($connect, "DELETE FROM category WHERE cat_id = $cat_id");
header('location: index.php?pagelayout=category');
?>