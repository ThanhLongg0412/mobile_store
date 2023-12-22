<?php
$user_id = $_GET['user_id'];
mysqli_query($connect, "DELETE FROM user WHERE user_id = $user_id");
header('location: index.php?pagelayout=user');
?>